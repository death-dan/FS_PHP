<?php

namespace Source\Interpretation;

class User
{
    private $firstName;
    private $lastName;
    private $email;

    public function __construct($firstName, $lastName, $email)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
    }

    public function __clone()
    {
        $this->firstName = null;
        $this->lastName = null;
        echo "<p class='trigger'>Clonou!!</p>";
    }

    public function __destruct()
    {
        var_dump($this);
        echo "<p class='trigger accept'>O objeto {$this->firstName} foi destrido!</p>";
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getEmail()
    {
        return $this->email;
    }
}