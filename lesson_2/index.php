<?php

/**
 * Clase persona
 */
class Person {

    /** @var  */
    protected $firstName;
    protected $lastName;
    protected $nickName;
    protected $dateBirth;
    protected $changeNickName = 0;

    /**
     * Constructor(método mágico) de la clase Persona
     * @param $firstName
     * @param $lastName
     */
    public function __construct($firstName, $lastName, $dateBirth)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->dateBirth = $dateBirth;
    }

    /**
     * Función encargada de devolver el nombre de la persona.
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getNickName()
    {
        return strtolower($this->nickName);
    }

    public function getAge()
    {
        $birth = new DateTime($this->dateBirth);

        $today = new DateTime();

        return $today->diff($birth)->y;
    }

    public function setFirstName($name)
    {
        $this->firstName = $name;
    }

    /**
     * Función que recoge el nick de la persona
     * @param $nickname
     * @throws Exception
     */
    public function setNickName($nickname)
    {
        if (!empty($nickname)
            and $this->changeNickName < 2
            and ($this->getFirstName() == $nickname
                or $this->getLastName() == $nickname)){
            throw new Exception("Nick vacío o intentando cambiar
            más de dos veces");
        }

        $this->nickName = strtolower($nickname);
        $this->changeNickName++;
    }

    /**
     * Función encargada de devolver el nombre completo.
     * @return string
     */
    public function getFullName(): string
    {
        return $this->firstName.' '.$this->lastName;
    }

}

$person1 = new Person('Ruben', 'RL', '06-02-1983');
$person2 = new Person('Rubencillo', 'LR', '30-09-2020');

$person2->setNickName('Pepes');
$person2->setNickName('Leches');
echo $person1->getAge();

echo 'Bienvenido '.$person1->getFullName(). ' es amigo '.$person2->getFullName().' con nick '.$person2->getNickName();