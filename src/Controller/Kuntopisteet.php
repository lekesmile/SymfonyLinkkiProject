<?php 

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class Kuntopisteet extends AbstractController{


/**
 * @Route("/esimerkki/kunto")
 */

 public function laskekunto($hoikka, $hiito, $kavely){

      $hoikkakilometrista = 4;
      $hoikka * $hoikkakilometrista;

    return $this->render('esimerkki/kunto.html.twig', [
        
        'hoikka' => $hoikka,
        'hiito' => $hiito,
        'kavely' => $kavely
    ]); 
 }



}



?>