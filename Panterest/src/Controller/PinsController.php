<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\Form\Exception;
//use OC\PlatformBundle\Form\PinType;


use App\Form\PinType;
use App\Repository\PinRepository;
use App\Entity\Pin;

class PinsController extends AbstractController
{

    /**
     * @Route("/", name="app_home", methods="GET")
     * 
     */
    public function index(PinRepository $pinRepository): Response
    {

        $pins = $pinRepository->findBy([], ['createdAt' => 'DESC']);
        
        return $this->render('pins/index.html.twig',compact('pins'));
    }

    /**
     * @Route("/pins/create", name="app_pins_create", methods={"GET","POST"})
     */
    public function create(Request $request, EntityManagerInterface $em): Response
    {
        $pin = new Pin;

        $form = $this->createForm(PinType::class, $pin);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            
            $em->persist($pin);
            $em->flush();

            $this->addFlash('success','Pin successfully created !');

            return $this->redirectToRoute('app_home');
        }

        return $this->render('pins/create.html.twig',['form' => $form -> createView()]);
    }


    /**
     * 
     * @Route("/pins/{id<[0-9]+>}", name="app_pins_show", methods="GET")
     * 
     */

     public function show(Pin $pin): Response
     {

        return $this->render('pins/show.html.twig', compact('pin'));

     }

     /**
     * 
     * @Route("/pins/{id<[0-9]+>}/edit", name="app_pins_edit", methods={"GET","PUT"})
     * 
     */

    public function edit(Request $request, Pin $pin, EntityManagerInterface $em): Response
    {

        $form = $this->createForm(PinType::class, $pin, [
            'method' => 'PUT'
        ]);

        $form->handleRequest($request);

        
        if($form->isSubmitted() && $form->isValid())
        {
            
            $em->flush();

            $this->addFlash('success','Pin successfully edited !');

            return $this->redirectToRoute('app_home');
        }


       return $this->render('pins/edit.html.twig', [

            'pin' => $pin,
            'form' => $form->createView()
       ]);

    }

     /**
     * 
     * @Route("/pins/{id<[0-9]+>}/delete", name="app_pins_delete", methods={"DELETE"})
     * 
     */

    public function delete(Pin $pin, EntityManagerInterface $em): Response
    {
            $em->remove($pin);
            $em->flush();

            $this->addFlash('success','Pin successfully deleted !');

            return $this->redirectToRoute('app_home');

    }

}
