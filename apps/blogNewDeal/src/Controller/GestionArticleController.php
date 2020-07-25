<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

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
            ->getAllByDate();

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
    public function pageAjoutArticle(Request $request)
    {
        $article = new Article();

        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);


        if($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            
            // Récupération de l'image
            $uploadedImg = $form['pathImg']->getData();
            $destination = $this->getParameter('kernel.project_dir').'/public/uploadImg';
            
            // Génération d'un nouveau nom pour que chaque nom de fichier soit unique
            $fileName = pathinfo($uploadedImg->getClientOriginalName(), PATHINFO_FILENAME);
            $newFileName = $fileName .'-'.uniqid().'.'. $uploadedImg->guessExtension();

            $uploadedImg->move(
                $destination,
                $newFileName
            );

            $article->setPathImg($newFileName);
            $entityManager->persist($article);
            $entityManager->flush();

            return $this->redirectToRoute('liste_article');
        }

        return $this->render('gestion_article/ajoutArticle.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
