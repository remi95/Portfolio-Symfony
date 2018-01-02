<?php

namespace Rm\PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class PortfolioController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repoCompetence = $em->getRepository('RmPortfolioBundle:Competence');
        $repoDiplome = $em->getRepository('RmPortfolioBundle:Diplome');
        $repoExperience = $em->getRepository('RmPortfolioBundle:Experience');
        $repoProjet = $em->getRepository('RmPortfolioBundle:Projet');

        $competences = $repoCompetence->findAll();
        $diplomes = $repoDiplome->findAll();
        $experiences = $repoExperience->findAll();
        $projets = $repoProjet->findAll();

        return $this->render('RmPortfolioBundle:Default:portfolio.html.twig', [
            'competences' => $competences,
            'diplomes' => $diplomes,
            'experiences' => $experiences,
            'projets' => $projets
        ]);
    }
}
