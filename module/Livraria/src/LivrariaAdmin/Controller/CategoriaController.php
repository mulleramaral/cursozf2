<?php

namespace LivrariaAdmin\Controller;

use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel;
use Zend\Paginator\Paginator,
    Zend\Paginator\Adapter\ArrayAdapter;

class CategoriaController extends AbstractActionController {

    protected $em;

    public function indexAction() {
        $list = $this->getEm()
                ->getRepository('Livraria\Entity\Categoria')
                ->findAll();
        
        $page = $this->params()->fromRoute('page');
        
        $paginator = new Paginator(new ArrayAdapter($list));
        $paginator->setCurrentPageNumber($page);
        $paginator->setDefaultItemCountPerPage(1);
        
        return new viewModel(array('data' => $paginator,'page' => $page));
    }

    public function getEm() {
        if (null === $this->em) {
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }

        return $this->em;
    }

}
