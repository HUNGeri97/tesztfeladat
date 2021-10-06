<?php
namespace AppBundle\Form;
use AppBundle\Entity\SubFamily;
use AppBundle\Repository\SubFamilyRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\PercentType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class SzamlazasicimekType extends AbstractType
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
                'required'=>true
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

            ->add('save', SubmitType::class, array(
                'label' => 'ÚJ CÍM FELVÉTELE'))
		;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\SzamlazasiCimek'
        ]);
    }
}