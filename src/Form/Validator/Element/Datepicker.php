<?php
/**
 * Created by PhpStorm.
 * User: Jenzri
 * Date: 01/10/2016
 * Time: 20:36
 */

namespace laminas\Bootstrapdatepicker\Form\Validator\Element;

use Laminas\Form\Element;
use Laminas\InputFilter\InputProviderInterface;


class Datepicker extends Element implements InputProviderInterface
{
    protected $validator;

    public function getValidator()
    {
        if (null === $this->validator) {
           // $this->validator = new BarValidator;
        }
        return $this->validator;
    }

    /**
     * Should return an array specification compatible with
     * {@link Laminas\InputFilter\Factory::createInput()}.
     *
     * @return array
     */
    public function getInputSpecification()
    {
        return array(
            'name'       => $this->getName(),
            'required'   => false,
            'validators' => array(
                $this->getValidator(),
            ),
        );
    }
}