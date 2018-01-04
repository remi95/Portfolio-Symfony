<?php

namespace Rm\BlogBundle\Controller;

use Rm\BlogBundle\Entity\Commentaire;
use Rm\BlogBundle\Form\CommentaireType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BlogController extends Controller
{
    public function indexAction(Request $request, $categorie, $page)
    {
        $em = $this->getDoctrine()->getManager();
        $repoArticle = $em->getRepository('RmBlogBundle:Article');
        $repoCategorie = $em->getRepository('RmBlogBundle:Categorie');

        $nbParPage = 9;

        // Récupère les articles d'une page en fonction du tri par catégorie ou non
        if($categorie != 'all'){
            $articles = $repoArticle->findByCategorie($categorie, $page, $nbParPage);
        }
        else {
            $articles = $repoArticle->findArticles($page, $nbParPage);
        }

        // On compte le nombre total de pages
        $maxPage = ceil(count($articles)/$nbParPage);

        // 404 si page incorrecte
        if($page < 1 || $page > $maxPage){
            throw new NotFoundHttpException('Page "'.$page.'" inexistante.');
        }

        $categories = $repoCategorie->findAll();

        return $this->render('RmBlogBundle:Default:articles.html.twig', [
            'articles' => $articles,
            'categories' => $categories,
            'categorie' => $categorie,
            'page' => $page,
            'maxPage' => $maxPage,
        ]);
    }

    public function articleAction(Request $request, $nom){
        $em = $this->getDoctrine()->getManager();

        // Récupère l'article
        $repoArticle = $em->getRepository('RmBlogBundle:Article');
        $article = $repoArticle->findOneBy([
            'slug' => $nom
        ]);

        if($article === null){
            throw new NotFoundHttpException("L'article ".$nom." n'existe pas...");
        }

        // Laisser un commentaire
        $commentaire = new Commentaire();
        $commentaire->setAuteur($this->getUser())
            ->setArticle($article);

        $form = $this->createForm(CommentaireType::class, $commentaire);
        $form->handleRequest($request);

        // Si on poste un commentaire
        if($form->isSubmitted() && $form->isValid()){
            $commentaireToSave = $form->getData();

            $em->persist($commentaireToSave);
            $em->flush();

            return $this->redirectToRoute("rm_blog_article", ['nom' => $nom]);
        }

        // Si on renvoi la vue de l'article
        return $this->render('RmBlogBundle:Default:article.html.twig', [
            'article' => $article,
            'form' => $form->createView()
        ]);
    }

    public function signalementAction(Request $request, $id){
        $em = $this->getDoctrine()->getManager();
        $repoCommentaire = $em->getRepository('RmBlogBundle:Commentaire');

        $commentaire = $repoCommentaire->find($id);
        $commentaire->setSignalement(true);

        $auteur = $commentaire->getAuteur()->getUsername();
        $articleSlug = $commentaire->getArticle()->getSlug();

        $em->persist($commentaire);
        $em->flush();

        $this->addFlash('info', 'Vous avez bien signalé le commentaire de '.$auteur.'.'.
            ' Il sera traité sous peu par un un membre de l\'administration.');

        return $this->redirectToRoute("rm_blog_article", ['nom' => $articleSlug]);
    }

    public function deleteSignalementAction(Request $request, $id){
        $em = $this->getDoctrine()->getManager();
        $repoCommentaire = $em->getRepository('RmBlogBundle:Commentaire');

        $commentaire = $repoCommentaire->find($id);
        $commentaire->setSignalement(false);

        $auteur = $commentaire->getAuteur()->getUsername();
        $articleSlug = $commentaire->getArticle()->getSlug();

        $em->persist($commentaire);
        $em->flush();

        $this->addFlash('info', 'Le commentaire de '.$auteur.' n\'est plus signalé.');

        return $this->redirectToRoute("rm_blog_article", ['nom' => $articleSlug]);
    }

    public function deleteCommentaireAction(Request $request, $id){
        $em = $this->getDoctrine()->getManager();
        $repoCommentaire = $em->getRepository('RmBlogBundle:Commentaire');

        $commentaire = $repoCommentaire->find($id);

        $auteur = $commentaire->getAuteur()->getUsername();
        $articleSlug = $commentaire->getArticle()->getSlug();

        $em->remove($commentaire);
        $em->flush();

        $this->addFlash('info', 'Le commentaire de '.$auteur.' a bien été supprimé.');

        return $this->redirectToRoute("rm_blog_article", ['nom' => $articleSlug]);
    }

    public function signalCountAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $repoCommentaire = $em->getRepository('RmBlogBundle:Commentaire');

        $commentaires = $repoCommentaire->findBy([
           'signalement' => true
        ]);

        $nbCommentaires = count($commentaires);

        return $this->render('::header.html.twig', [
            'nbCommentaires' => $nbCommentaires,
        ]);
    }
}
