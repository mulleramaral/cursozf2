<?php

namespace LivrariaAdmin\Form;

use Zend\Form\Form;
use LivrariaAdmin\Form\CategoriaFilter;

class Categoria extends Form {

    public function __construct($name = null) {
        parent::__construct('categoria');

        $this->setAttribute('method','post');
        $this->setInputFilter(new CategoriaFilter());

        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type' => 'hidden'
            )
        ));

        $this->add(array(
            'name' => 'nome',
            'options' => array(
                'label', 'Nome',
                'type' => 'text'
            ),
            'attributes' => array(
                'id' => 'nome',
                'placeholder' => 'Informe o nome'
            )
        ));

        $this->add(array(
            'name' => 'submit',
            'type' => 'Zend\Form\Element\Submit',
            'attributes' => array(
                'value' => 'Salvar',
                'class' => 'btn-success',
                'action' => array(
                    'livraria-admin',
                )
            )
        ));
    }

}
