<?php

namespace LivrariaAdmin\Form;

use Zend\Form\Form,
    Zend\Form\Element\Select;

class Categoria extends Form {

    protected $categorias;

    public function __construct($name = null, array $categorias = null) {
        parent::__construct('livro');
        $this->categorias = $categorias;

        $this->setAttribute('method', 'post');
        //$this->setInputFilter(new CategoriaFilter());

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


        $repository = $this->em->getRepository('Livraria\Entity\Categoria');
        $categorias = $repository->fetchPairs();

        $categoria = new Select();
        $categoria->setLabel("Categoria")
                ->setName("categoria")
                ->setOptions(array(
                    'value_options' => $categorias
        ));

        $this->add($categoria);


        $this->add(array(
            'name' => 'autor',
            'options' => array(
                'type' => 'text',
                'label' => 'Autor'
            ),
            'attributes' => array(
                'id' => 'autor',
                'placeholder' => 'Entre com o Valor'
            ),
        ));

        $this->add(array(
            'name' => 'isbn',
            'options' => array(
                'type' => 'text',
                'label' => 'ISBN'
            ),
            'attributes' => array(
                'id' => 'isbn',
                'placeholder' => 'Entre com o ISBN'
            )
        ));

        $this->add(array(
            'name' => 'valor',
            'options' => array(
                'type' => 'text',
                'label' => 'valor'
            ),
            'attributes' => array(
                'id' => 'valor',
                'placeholder' => 'Entre com o valor'
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
