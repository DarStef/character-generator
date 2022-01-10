<?php declare(strict_types=1);

namespace App\Form\Type;

use App\Entity\Profession;
use App\Form\DTO\Character;
use App\Form\Enum\Sex;
use App\Form\Enum\Type;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CharacterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('surname', TextType::class)
            ->add('sex', EnumType::class, [
                'class' => Sex::class,
            ])
            ->add('profession', EntityType::class, [
                'class' => Profession::class,
                'choice_label' => 'name',
            ])
            ->add('type', EnumType::class, [
                'class' => Type::class,
            ]);

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefault('data_class', Character::class);
        $resolver->setDefault('csrf_protection', false);
    }

}