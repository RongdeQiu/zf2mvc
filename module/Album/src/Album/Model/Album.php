<?php
/**
 * Created by PhpStorm.
 * User: Qiu
 * Date: 3/18/2018
 * Time: 12:16 PM
 */

namespace Album\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Album implements InputFilterAwareInterface
{
    public $id;
    public $artist;
    public $title;
    public $inputFilter;

    public function getArrayCopy(){
        return array(
            'id'=>$this->id,
            'artist'=>$this->artist,
            'title'=>$this->title,
        );
    }

    // Module.php里面的getServiceConfig里面的
    //AlbumTableGateway含有以下statements会调用到这个方法
    //$resultSetPrototype=new ResultSet();
    //$resultSetPrototype->getArrayObjectPrototype(new Album());
    public function exchangeArray($data)
    {
        $this->id = (!empty($data['id'])) ? $data['id'] : null;
        $this->artist = (!empty($data['artist'])) ? $data['artist'] : null;
        $this->title = (!empty($data['title'])) ? $data['title'] : null;
    }


    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();

            $inputFilter->add(array(
                'name' => 'id',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                ),
            ));

            $inputFilter->add(array(
                'name' => 'artist',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 3,
                            'max' => 100,
                        ),
                    ),
                ),
            ));

            $inputFilter->add(array(
                'name' => 'title',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 3,
                            'max' => 100,
                        ),
                    ),
                ),
            ));

            $this->inputFilter = $inputFilter;
            return $this->inputFilter;
        }
    }

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        // TODO: Implement setInputFilter() method.
    }
}