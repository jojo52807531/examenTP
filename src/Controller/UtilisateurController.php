<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Utilisateur;
use App\Form\UtilisateurType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class UtilisateurController extends AbstractController
{

    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
   {
      $this->entityManager = $entityManager;
   }

    /* #[Route('/utilisateur', name: 'app_utilisateur')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/UtilisateurController.php',
        ]);
    } */
    /* 
    public function ajouterUtilisateur(Request $request)
    {
        $utilisateur = new Utilisateur();
        $form = $this->createForm(UtilisateurType::class, $utilisateur);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
           $utilisateur = $form->getData();
            $this->entityManager->persist($utilisateur);
            $this->entityManager->flush();
            return $this->redirectToRoute('utilisateur_list');
        }
    
        return $this->render('utilisateurs/adduser.html.twig', [
            'form' => $form->createView(),
        ]);
    } */
    public function ajouterU(Request $request) {
        $utilisateur = new Utilisateur(); 
        $form = $this->createForm(UtilisateurType::class,$utilisateur); 
        $form->handleRequest($request); if($form->isSubmitted() && $form->isValid()) {
            $article = $form->getData();
            $this->entityManager->persist($utilisateur);
            $this->entityManager->flush();
              return $this->redirectToRoute('utilisateur_list'); } 
       return $this->render('utilisateurs/adduser.html.twig',['form' => $form->createView()]);
     }

       public function listeU()
       {
        $utilisateurs = $this->entityManager->getRepository(Utilisateur::class)->findAll();
        return $this->render('utilisateurs/utilisateur_list.html.twig', ['utilisateurs' => $utilisateurs]);
    }

    public function ajouterP(Request $request) {
        $projet = new Projet(); 
        $form = $this->createForm(UtilisateurType::class,$utilisateur); 
        $form->handleRequest($request); if($form->isSubmitted() && $form->isValid()) {
            $projet = $form->getData();
            $this->entityManager->persist($projet);
            $this->entityManager->flush();
              return $this->redirectToRoute('project_list'); } 
       return $this->render('utilisateurs/addproject.html.twig',['form' => $form->createView()]);
     }
    
     public function listeP()
       {
        $projets = $this->entityManager->getRepository(Utilisateur::class)->findAll();
        return $this->render('utilisateurs/projet_list.html.twig', ['projets' => $projets]);
    }

}
