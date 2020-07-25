<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GestionArticleController extends AbstractController
{
    /**
     * @Route("/", name="liste_article")
     */
    public function index()
    {
        // Récupération de tous les articles
        $entityManager = $this->getDoctrine()->getManager();
        
        $listeArticles = $this->getDoctrine()
            ->getRepository(Article::class)
            ->findAll();

        return $this->render('gestion_article/index.html.twig', [
            'listeArticles' => $listeArticles
        ]);
    }

    /**
     * @Route("/show/{id_article}", name="show_article")
    */
    public function show($id_article)
    {
        // Récupération de tous les articles
        $entityManager = $this->getDoctrine()->getManager();
        
        $article = $this->getDoctrine()
            ->getRepository(Article::class)
            ->findOneById($id_article);

        return $this->render('gestion_article/show.html.twig', [
            'article' => $article
        ]);
    }

    /**
     * @Route("/ajoutArticle", name="page_ajout_article")
     */
    public function pageAjoutArticle()
    {
        $article = new Article();

        $form = $this->createForm(ArticleType::class, $article);

        return $this->render('gestion_article/ajoutArticle.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
