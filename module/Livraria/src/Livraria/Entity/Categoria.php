<?php

namespace Livraria\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="categoria")
 * @ORM\Entity(repositoryClass="Livraria\Entity\CategoriaRepository")
 */
class Categoria {

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

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function setId(type $id) {
        $this->id = $id;
    }

    function setNome(type $nome) {
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
}
