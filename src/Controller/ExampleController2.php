<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ExampleController2 extends AbstractController{

    /**  
     * @Route("esimerkki/palkka")
     */
 
    public function laskePalkka(){
        $nettopalkka = 4500 * 0.7;

        return $this->render('esimerkki/palkka.html.twig', [
                "nettopalkka" => $nettopalkka
        ]);
    }


    /**  
     * @Route("esimerkki/palkka1")
     */

    public function tarkistaKarkausvuosi( ){
       $year = 2001;
          if($year % 4 == 0){
            return $this->render('esimerkki/palkka1.html.twig', [
                " year" =>  $year . "common year"
        ]);
          }elseif (!$year % 100) {
            return $this->render('esimerkki/palkka1.html.twig', [
               "year" =>  $year  . " is a leap year"
        ]);
            
          }elseif (!$year % 400) {
            return $this->render('esimerkki/palkka1.html.twig', [
             "year"  =>  $year . " is a common year"
        ]);
          }else {
            return $this->render('esimerkki/palkka1.html.twig', [
               "year"  =>  $year . " is a leap year"
        ]);
          }
    }


    /**  
     * @Route("esimerkki/palkka2")
     */

    public function laskePH(){
        $vesi = 200;
        $laskevesiph = 2.13 * pow(10, -5);
        return $this->render('esimerkki/palkka2.html.twig', [
         "vesi" =>  $laskevesiph 
   ]);
        
    }

  /**  
     * @Route("esimerkki/palkka3")
     */

    public function heitaNoppaa(){
        $random = rand(1, 6);

       return $this->render('esimerkki/palkka3.html.twig', [
       "noppa" => "Heitettu noppa numero on " . $random 
        ]);
    }


    /**  
     * @Route("esimerkki/palkka4")
     */
    public function naytaJSON(){
        $names = [
         
            "Etunimi" => "Pekka",
            "Sukunimi" => " Puupää "
            
        ];

        return $this->render('esimerkki/palkka4.html.twig', [
          "names1" => $names["Etunimi"],
          "names2" => $names["Sukunimi"]
           ]);
        
    }

    /**  
     * @Route("esimerkki/palkka5")
     */


    public function lihapiirakka(){
        $lompakonRaha = 10;
        $piirakaaHinta = 2.5;

        if($lompakonRaha == 0){
          return $this->render('esimerkki/palkka5.html.twig', [
            "pirakka" => "Sulla ei oo raha ostaa pirakka"
             ]);
        }else {
            $balance = $lompakonRaha - $piirakaaHinta;
            return $this->render('esimerkki/palkka5.html.twig', [
              "pirakka" => "Sulla on € ". $lompakonRaha .  "ja piirakka maksoi € " . $piirakaaHinta. " sulle palautetaan €". $balance 

               ]);
           
        }
    }

    /**  * @Route("esimerkki/palkka6")  */
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
         return $this->render('esimerkki/palkka6.html.twig', [
               'pakkasasteet' => $pakkasasteet,
               'keskiarvo1'   => $keskiarvo1,
               'keskiarvo2'   => $keskiarvo2,
               'viikko'       => $mittausViikko,
               'tekija'       => $tekija
         ]);
    }
}






?>