<?php

namespace Livraria\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use Livraria\Entity\Configurator;

/**
 * @ORM\Entity
 * @ORM\Table(name="categoria")
 * @ORM\Entity(repositoryClass="Livraria\Entity\CategoriaRepository")
 */
class Categoria {

    public function __construct($options = null) {
        Configurator::configure($this,$options);
        $this->livros = new ArrayCollection();
    }
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var type int
     */
    protected $id;

    /**
     * @ORM\Column(type="text")
     * @var type string
     */
    protected $nome;
    
    /**
     * @ORM\OneToMany(targetEntity="Livraria\Entity\Livro",mappedBy="categoria")
     */
    protected $livros;
  
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function __toString() {
        return $this->getNome();
    }
    
    function toArray() {
        return array(
            'id' => $this->getId(),
            'nome' => $this->getNome()
        );
    }
    
    function getLivros(){
        return $this->livros;
    }
}
