<?php

namespace App\Form;

use App\Entity\Category;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('image', FileType::class, [
              'label' => 'Главное изображение',
              'required' => false,
              'mapped' => false //отвязывает поле от Entity
            ])
            ->add('title', TextType::class, [
              'label' => 'Заголовок категории',
              'attr' => [
                'placeholder' => 'Введите текст'
              ]
            ])
            ->add('description', TextareaType::class, [
              'label' => 'Описание категории',
              'attr' => [
                'placeholder' => 'Введите описание'
              ]
            ])
            ->add('save', SubmitType::class, [
              'label' => 'Сохранить',
              'attr' => [
                'class' => 'btn btn-success float-left mr-2'
              ]
            ])
            ->add('delete', SubmitType::class, [
              'label' => 'Удалить',
              'attr' => [
                'class' => 'btn btn-danger'
              ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Category::class,
        ]);
    }
}
