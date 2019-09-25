<?php

namespace App\Controller;

use App\Entity\Linkki;
use App\Form\LinkkiFormType;
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

 public function uusi(Request $request){

    //Luodaan linkki -olio
     $linkki = new Linkki();

     //Luodaan lomake
$form = $this->createForm(
    LinkkiFormType::class,
    $linkki, [
        'action' => $this->generateUrl('linkki_uusi'),
        'attr' => ['class' => 'form-signin']
    ]
);

//käsitellään lomakkeelta tulleet tiedot
$form->handleRequest($request);
if($form->isSubmitted()){
    // Talletetaan lomakettiedot muutujaan
    $linkki = $form->getData();

    // Talletetaan tietokantaan
    $entityManager = $this->getDoctrine()->getManager();
    $entityManager->persist($linkki);
    $entityManager->flush();
}

    // Kutsutaan index-kontrolleria
     return $this->render('linkki/uusi.html.twig', [
         'form1' => $form->createView()
     ]);
 }

  /**
 * @Route("/linkki/{id}", name= "linkki_nayta")
 */

public function nayta($id){
    $linkki = $this->getDoctrine()->getRepository(Linkki::class)->find($id);

    return $this->render('linkki/nayta.html.twig', [
        'linkki' => $linkki,
    ]);
 }

  /**
 * @Route("/linkki/muokkaa/{id}", name="linkki_muokkaa")
 */

public function muokkaa(Request $request, $id){
    $linkki = $this->getDoctrine()->getRepository(Linkki::class)->find($id);
    

 $form = $this->createForm(
    LinkkiFormType::class,
    $linkki, [
        
        'attr' => ['class' => 'form-signin']
    ]
);

//käsitellään lomakkeelta tulleet tiedot
$form->handleRequest($request);
if($form->isSubmitted()){
    // Talletetaan lomakettiedot muutujaan
    $linkki = $form->getData();

    // Talletetaan tietokantaan
    $entityManager = $this->getDoctrine()->getManager();
    $entityManager->flush();

    // Kutsutaan index-kontroller
    return $this->redirectToRoute('linkki_lista');
}

return $this->render('linkki/muokkaa.html.twig', [
    'form1' => $form->createView(),
]);

}

  /**
 * @Route("/linkki/poista/{id}", name="linkki_poista")
 */

public function poista(Request $request, $id){

    $linkki = $this->getDoctrine()->getRepository(Linkki::class)->find($id);
   
    //Poistetaan tietokannaasta
    $entityManager = $this->getDoctrine()->getManager();
    $entityManager->remove($linkki);
    $entityManager->flush();

    // Kutsutaan index-kontroller
    return $this->redirectToRoute('linkki_lista');

    return $this->render('linkki/poista.html.twig');
 }
 }



?>