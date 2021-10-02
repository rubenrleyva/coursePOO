<?php

/**
 * Clase persona
 */
class Person {

    /** @var  */
    var $firstName;
    var $lastName;

    /**
     * Constructor(método mágico) de la clase Persona
     * @param $firstName
     * @param $lastName
     */
    public function __construct($firstName, $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    /**
     * Función encargada de devolver el nombre completo.
     * @return string
     */
    public function fullName()
    {
        return $this->firstName.' '.$this->lastName;
    }

}

$person1 = new Person('Ruben', 'RL');
$person2 = new Person('Rubencillo', 'LR');

echo 'Bienvenido '.$person1->fullName(). ' es amigo '.$person2->fullName();