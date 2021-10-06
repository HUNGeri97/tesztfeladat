<?php
namespace AppBundle\Form;
use AppBundle\Entity\SubFamily;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class MegrendelesNewType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
		$builder
			->add('type',ChoiceType::class, array(
				'choices'=>array(
					'Magánszemély' => "Magánszemély",
					'Cég' => "Cég",
				),
				'label' => 'Típus:* ',
				'required'=>true,
			))

			->add('name',TextType::class, array(
			    'label' => 'Név / Cégnév:* ',
                'required'=>true))

			->add('phone',TextType::class, array(
			    'label' => 'Telefonszám: ',
                'required'=>true,
                'data'=>'+36'))

			->add('adoszam',TextType::class, array(
			    'label' => 'Adószám: ',
                'required'=>false))

			->add('orszag',ChoiceType::class, array(
				'choices'=>array(
					'Magyarország' => "Magyarország",
					'Németország' => "Németország",
					'Franciaország' => "Franciaország",
				),
				'label' => 'Ország: ',
                'required'=>true,
			))

			->add('iranyitoszam',TextType::class, array(
			    'label' => 'Irányítószám:* ',
                'required'=>true))

			->add('varos',TextType::class, array(
			    'label' => 'Város:* ',
                'required'=>true))

			->add('utcahazszam',TextType::class, array(
			    'label' => 'Utca, házszám:* ',
                'required'=>true))

            ->add("afsz", CheckboxType::class,array(
                'mapped' => false,
                'label' => 'Kijelentem, hogy elolvastam és elfogadom az általános szerződési feltételeket.*',
                'required'=>true,
            ))
            ->add('save', SubmitType::class, array('label' => 'Megrendelés'))
		;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\SzamlazasiCimek'
        ]);
    }
}