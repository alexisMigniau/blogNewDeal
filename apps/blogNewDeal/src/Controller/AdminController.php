<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends AbstractController
{
    /**
     * @Route("/connexion", name="connexion")
     */
    public function connexion(Request $request)
    {
        $login = $request->request->get('login');
        $password = $request->request->get('password');

        $adminLogin = $this->getParameter('adminLogin');
        $adminPassword = $this->getParameter('adminPassword');

        if(strcmp($login , $adminLogin) == 0 && strcmp($password, $adminPassword) == 0)
        {
            $this->get('session')->set('admin', true);
            $this->addFlash('success', 'Connexion au panel admin réussi');
        }
        else {
            $this->addFlash('danger', 'Mauvais identifiant ou mot de passe');
        }

        return $this->redirectToRoute('liste_article');
    }

    /**
     * @Route("/deconnexion", name="deconnexion")
     */
    public function deconnexion()
    {
        $this->get('session')->clear();
        $this->addFlash('success', 'Déconnexion réussie');
        return $this->redirectToRoute('liste_article');
    }
}
