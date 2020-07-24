<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GestionArticleController extends AbstractController
{
    /**
     * @Route("/", name="gestion_article")
     */
    public function index()
    {
        $entityManager = $this->getDoctrine()->getManager();
        
        $listeArticles = $this->getDoctrine()
            ->getRepository(Article::class)
            ->findAll();


        return $this->render('gestion_article/index.html.twig', [
            'listeArticles' => $listeArticles
        ]);
    }
}
