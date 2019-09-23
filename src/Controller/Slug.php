<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class Slug extends AbstractController{


/**
 * @Route("/esimerkki/uutiset/{slug}")
 */

 public function nayta($slug){
     $kommentit = [
        
'Muropaketin arvostelun mukaan Control on viiden tähden täysosuma!',
'Apple Arcade toimii iPhoneilla ja iPadeillä sekä Macilla ja Apple TV:llä!',
' PlayStation Blog on jälleen listannut viikon suurimmat PS4-julkaisut!'

     ];

    return $this->render('esimerkki/nayta.html.twig', [
        'otsikko' => $slug,
        'kommentit' =>$kommentit
    ]);
 }
}
?>

