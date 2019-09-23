<?php

namespace App\Controller;

use App\Entity\Linkki;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class LinkkiController extends AbstractController{

/**
 * @Route("/linkki", name="linkki_lista")
 */
   
 public function index(){

    //get all from database
     $linkit = $this->getDoctrine()->getRepository(Linkki::class)->findAll();

     //pyydetään näkymää näyttämään kaikki linkit
      return $this->render('linkki/index.html.twig', [
          'linkit' => $linkit
      ]);
  }

  /**
 * @Route("/linkki/uusi", name="linkki_uusi")
 */

//  public function uusi(Request $request){
//     return $this->render('linkki/uusi.html.twig');
//  }

//   /**
//  * @Route("/linkki/{id}",name= "linkki_nayta")
//  */

// public function nayta($id){
//     return $this->render('linkki/nayta.html.twig');
//  }

//   /**
//  * @Route("/linkki/muokkaa/{id}", name="linkki_muokkaa")
//  */

// public function muokkaa(Request $request, $id){
//     return $this->render('linkki/muokkaa.html.twig');
//  }

//   /**
//  * @Route("/linkki/poista/{id}", name="linkki_poista")
//  */

// public function poista(Request $request, $id){
//     return $this->render('linkki/poista.html.twig');
//  }
 }



?>