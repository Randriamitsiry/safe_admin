<?php
/**
 * Created by PhpStorm.
 * User: gabriel
 * Date: 4/6/18
 * Time: 2:04 PM
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DatePicker extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            array('widget' => 'single_text'
            ,'format' => 'dd/MM/yyyy'
            ,'attr' => array('class'=>'datepicker'
                ,'data-dateformat'=>'dd/mm/yy'
                ,'placeholder'=>'Select a date'
                )
            )
        );
    }

    public function getParent()
    {
        return DateType::class;
    }
}
