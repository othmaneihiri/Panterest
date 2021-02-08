<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Repository\PinRepository;
use App\Entity\Pin;

class PinsController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     * 
     */
    public function index(PinRepository $pinRepository): Response
    {

        $pins = $pinRepository->findBy([], ['createdAt' => 'DESC']);
        
        return $this->render('pins/index.html.twig',compact('pins'));
    }

    /**
     * 
     * @Route("/pins/{id<[0-9]+>}", name="app_pins_show")
     * 
     */

     public function show(Pin $pin): Response
     {

        return $this->render('pins/show.html.twig', compact('pin'));

     }

     /**
     * @Route("/pins/create", name="app_pins_create")
     * 
     */
   /* public function create(): Response
    {

        return $this->render('pins/create.html.twig');
    }*/

     
     

}
