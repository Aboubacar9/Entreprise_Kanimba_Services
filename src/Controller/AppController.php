<?php

namespace App\Controller;

use App\Entity\Employes;
use App\Form\EmployesType;
use App\Repository\EmployesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AppController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(): Response
    {
        return $this->render('app/home.html.twig', [
        'title'=> 'test'
        ]);
    }

    #[Route('/update/{id}', name:"update")]
    #[Route('/formulaire', name:"formulaire")]
    public function formulaire(Request $request, EntityManagerInterface $manager, Employes $objet = null)
    {
        if($objet == null)
        {
        $objet= new Employes();
        }
        
       $form=$this->createForm(EmployesType::class, $objet );

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {

            $manager->persist($objet);
            $manager->flush();
            return $this->redirectToRoute('edit');
        }

        return $this->render('app/form.html.twig', [
            'form'=> $form,
            'editMode'=> $objet->getId() !== null,
        ]);
        }

        #[Route('/edit', name: 'edit')]
        public function editForm(EmployesRepository $repo) : Response
        {
            $objet = $repo->findAll();
            return $this->render('app/edit.html.twig', [
                'objet' => $objet,
            ]);
        }

        #[Route('/delete/{id}', name:'delete')]
        public function delete( Employes  $objet, EntityManagerInterface $manager )
        {
            $manager->remove($objet);
            $manager->flush();
            return $this->redirectToRoute('edit');
        }
        
    
    }