<?php

namespace LivrariaAdmin\Controller;

class LivroController extends CrudController {
    public function __construct() {
        $this->entity = "Livraria\Entity\Categoria";
        $this->form = "LivrariaAdmin\Form\Categoria";
        $this->service = "Livraria\Service\Categoria";
        $this->controller = "categoria";
        $this->route = "livraria-admin";
    }
    
    //Inserir
    public function newAction() {
        $form = new $this->getServiceLocator($this->form);
        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $service = $this->getServiceLocator()->get($this->service);
                $service->insert($request->getPost()->toArray());
                return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
            }
        }
        return new ViewModel(array('form' => $form));
    }

    //Editar
    public function editAction() {
        $form = new $this->getServiceLocator($this->form);
        $request = $this->getRequest();
        
        $repository = $this->getEm()->getRepository($this->entity);
        $entity = $repository->find($this->params()->fromRoute('id', 0));
        if ($this->params()->fromRoute('id', 0)) {
            $form->setData($entity->toArray());
        }
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $service = $this->getServiceLocator()->get($this->service);
                $service->update($request->getPost()->toArray());
                return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
            }
        }
        return new ViewModel(array('form' => $form));
    }
}
