<?php

namespace Rm\BlogBundle\Controller;

use Rm\BlogBundle\Entity\Commentaire;
use Rm\BlogBundle\Form\CommentaireType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BlogController extends Controller
{
    public function indexAction(Request $request, $categorie)
    {
        $em = $this->getDoctrine()->getManager();
        $repoArticle = $em->getRepository('RmBlogBundle:Article');
        $repoCategorie = $em->getRepository('RmBlogBundle:Categorie');

        if($categorie != 'all'){
            $articles = $repoArticle->findByCategorie($categorie);
        }
        else {
            $articles = $repoArticle->findAll();
        }

        $categories = $repoCategorie->findAll();

        return $this->render('RmBlogBundle:Default:articles.html.twig', [
            'articles' => $articles,
            'categories' => $categories
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
}
