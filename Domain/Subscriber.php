<?php

class Subscriber
{
    // Atributes
    private $subscriberId;
    private $name;
    private $email;
    private $state;

    public function __construct($subscriberId, $name, $email, $state)
    {

        $this->subscriberId = $subscriberId;
        $this->name = $name;
        $this->email = $email;
        $this->state = $state;
    }
    // Gets

    function getSubscriberId(){
        return $this->subscriberId;
    }
    function getEmail()
    {
        return $this->email;
    }
    function getName()
    {
        return $this->name;
    }

    function getState()
    {
        return $this->state;
    }

    //  Sets
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setName($name)
    {
        $this->name = $name;
    }

    public function setState($state)
    {
        $this->state = $state;
    }
}
