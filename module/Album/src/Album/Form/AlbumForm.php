<?php
/**
 * Created by PhpStorm.
 * User: Qiu
 * Date: 3/20/2018
 * Time: 9:07 PM
 */

namespace Album\Form;

use Zend\Form\Form;

class AlbumForm extends Form
{

    /**
     * AlbumForm constructor.
     */
    public function __construct($name = null)
    {
        //ignore the name passed in
        parent::__construct('album');

        //add element id
        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden',
        ));

        //add element title
        $this->add(array(
            'name' => 'title',
            'type' => 'Text',
            'options' => array(
                'label' => 'Title',
            ),
        ));

        //add element artist
        $this->add(array(
            'name' => 'artist',
            'type' => 'Text',
            'options' => array(
                'label' => 'Artist',
            ),
        ));

        //add element submit button
        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'options' => array(
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));

    }
}