<?php

namespace App\Form;

// use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;


class LinkkiFormType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
         ->add('Linkki', TextType::class, ['label'=> 'Linkki'])
         ->add('Otsikko', TextType::class, ['label'=> 'Otsikko'])
         ->add('Avainsana', TextType::class, ['label'=> 'Avainsana'])
         ->add('Kuvaus', TextType::class, ['label'=> 'Kuvaus'])
         ->add('save', SubmitType::class, [
             'label'=>'Talleta',
             'attr'=>['class' =>'btn btn-info']
         ]);
        
    }

    public function configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults([
          'data-class' => Linkki::class,
        ]);
    }

}
?>