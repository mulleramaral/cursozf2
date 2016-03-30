<?php

namespace LivrariaAdmin\Controller;

class CategoriaController extends CrudController {
    public function __construct() {
        $this->entity = "Livraria\Entity\Categoria";
        $this->form = "LivrariaAdmin\Form\Categoria";
        $this->service = "Livraria\Service\Categoria";
        $this->controller = "categoria";
        $this->route = "livraria-admin";
    }
}
