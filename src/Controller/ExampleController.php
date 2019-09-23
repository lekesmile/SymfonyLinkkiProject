<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ExampleController extends AbstractController{
    
 
    public function laskePalkka(){
        $nettopalkka = 4500 * 0.7;

        return new Response('<h2>Bruttipalkkasi on 4500 
        ja nettopalkkasi on <strong>' . $nettopalkka . '</strong></h2>');
    }



    public function tarkistaKarkausvuosi( ){
       $year = 2001;
          if($year % 4 == 0){
              return new Response('<h2> The year you enter '. $year. ' is a common year</h2>');
          }elseif (!$year % 100) {
            return new Response('<h2> The year you enter '. $year. ' is a leap year</h2>');
          }elseif (!$year % 400) {
            return new Response('<h2> The year you enter '. $year. ' is a common year</h2>');
          }else {
            return new Response('<h2> The year you enter '. $year. ' is a leap year</h2>');
          }
    }



    public function laskePH(){
        $vesi = 200;
        $laskevesiph = 2.13 * pow(10, -5);
        return new Response('<h2> Kun vesiliuoksen vetyioni-konsenraatioon 2.13 *10-5mol/l sen pHon ' . $vesi . ' tulos on  <strong>'. $laskevesiph . ' </strong></h2>');
    }


    public function heitaNoppaa(){
        $random = rand(1, 6);
        return new Response('<h2> heitettu Noppaa  <strong>'. $random . ' </strong></h2>');
    }


    public function naytaJSON(){
        $names = [
         
            "Etunimi" => "Pekka",
            "Sukunimi" =>" Puupää"
            
        ];

        return new JsonResponse($names);
    }


    public function lihapiirakka(){
        $lompakonRaha = 10;
        $piirakaaHinta = 2.5;

        if($lompakonRaha == 0){
            return new Response('<h2> Sulla ei ole raha osta piirakka</h2>');
        }else {
            $balance = $lompakonRaha - $piirakaaHinta;
            return new Response('<h2> Sulla on € ' . $lompakonRaha .   ' ja piirakka maksoi € ' . $piirakaaHinta. ' sulle palautetaan €'. $balance .'</h2>');
        }
    }

    /**  * @Route("esimerkki/esim7")  */
    public function laskePalkkapaivat(){

        //Muuttujat
         $summa = 0;
         $pakkaspaivat = 0;
         $tekija = "James Brown";
         $mittausViikko = 35;
         $keskiarvo1 = 0;
         $keskiarvo2 = 0;


         $pakkasasteet = [
             'ma' => 6,
             'ti' => 3,
             'ke' => -2,
             'to' => -4,
             'pe' => 1,
             'la' => 0,
             'su' =>-5

         ];

         foreach ($pakkasasteet as  $pakkasaste) {
               if($pakkasaste < 0){
                   $summa += $pakkasaste;
                   $pakkaspaivat += 1;
               }
         }
      
         // Lasketaan palkkapäivien keskiarvo yhdellä desimaalilla
         $keskiarvo1 = number_format(($summa / $pakkaspaivat), 1);

         // Lasketaan koko viikon keskilämpötila yhdellä desimaalilla
         $keskiarvo2 = number_format(array_sum($pakkasasteet) / count($pakkasasteet), 1);

         //Kutsutaan näkymää ja lähetetään sille dataa sisältävät muuttujat
         return $this->render('esimerkki/pakkasasteet.html.twig', [
               'pakkasasteet' => $pakkasasteet,
               'keskiarvo1'   => $keskiarvo1,
               'keskiarvo2'   => $keskiarvo2,
               'viikko'       => $mittausViikko,
               'tekija'       => $tekija
         ]);
    }
}






?>