<?php

class User
{
    private $id;
    private $name;
    private $hash;
    private $email;
    private $ban;
    
    function __construct($id) 
    {
        $this->id=$id;
    }
    
    public function setup($name, $hash, $email, $ban)
    {
        $this->name=$name;
        $this->hash=$hash;
        $this->email=$email;
        $this->ban=$ban;
    }
    
    public function id()
    {
    }
    
    public function name()
    {
        return $this->name;
    }
    
    public function setName($name)
    {
        $this->name=$name;
    }
    
    public function hash()
    {
        return $this->hash;
    }
    
    public function setHash($hash)
    {
        $this->hash=$hash;
    }
    
    public function email()
    {
        return $this->email;
    }
    
    public function setEmail($email)
    {
        $this->email=$email;
    }
    
    public function ban()
    {
        return $this->ban;
    }

    public function setBan($ban)
    {
        $this->ban=$ban;
    }
}

?>