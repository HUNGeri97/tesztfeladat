<?php
namespace AppBundle\Form;

use AppBundle\Entity\SubFamily;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use AppBundle\Entity\SzamlazasiCimek;

class MegrendelesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->add('szamlazasiId',EntityType::class, array(
                'class' => 'AppBundle\Entity\SzamlazasiCimek',
                'choice_label' => 'teljescim',
                'choice_value' => 'id',
                'placeholder' => 'Új számlázási címet adok meg',
				'label'=>'Számlázási címeim:* ',
                'empty_data'  => null,
				'required'=>false,
			))
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
            'data_class' => 'AppBundle\Entity\megrendeles'
        ]);
    }
}