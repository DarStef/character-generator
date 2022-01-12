<?php declare(strict_types=1);

namespace App\Form\Type;

use App\Entity\Character;
use App\Entity\CharacterSkill;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditCharacterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('surname', TextType::class)
            ->add('age', IntegerType::class)
            ->add('description', TextType::class)
            ->add('strength', IntegerType::class)
            ->add('character_condition', IntegerType::class)
            ->add('size', IntegerType::class)
            ->add('dexterity', IntegerType::class)
            ->add('appearance', IntegerType::class)
            ->add('intelligence', IntegerType::class)
            ->add('education', IntegerType::class)
            ->add('sanity', IntegerType::class)
            ->add('power', IntegerType::class)
            ->add('hit_points', IntegerType::class)
            ->add('magic_point', IntegerType::class);
            //->add('skills', CollectionType::class, [
                //'entry_type' => CharacterSkillType::class,
                //'entry_options' => 'id'
            //]);

    }
        public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefault('data_class', Character::class);
        $resolver->setDefault('csrf_protection', false);
    }

}