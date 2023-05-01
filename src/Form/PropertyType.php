<?php

namespace App\Form;

use App\Entity\Property;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PropertyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', null, ['label' => 'Titre'])
            ->add('description')
            ->add('surface')
            ->add('rooms', null, ['label' => 'Pièces'])
            ->add('bedrooms', null, ['label' => 'Chambres'])
            ->add('floor', null, ['label' => 'Etage'])
            ->add('price', null, ['label' => 'Prix'])
            ->add('heat', ChoiceType::class, [
                'label' => 'Chauffage',
                'choices' => $this->getChoices()
            ])
            ->add('city', null, ['label' => 'Ville'])
            ->add('adress', null, ['label' => 'Adresse'])
            ->add('postal_code', null, ['label' => 'Code postal'])
            ->add('sold', null, ['label' => 'Vendu ?'])
            //->add('create_at')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Property::class,
            //'translation_domain' => 'forms'
        ]);
    }

    private function getChoices() {
        $choices = Property::HEAT;
        $output = [];
        foreach ($choices as $key => $choice) {
            $output[$choice] = $key;
        }
        return $output;
    }
}
