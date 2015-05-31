<?php

class UserManager
{
    public function createUser($user)
    {
    }
    
    public function login($email, $password)
    {
        $q = new SQL; 
        $q->query("SELECT id, name FROM users WHERE email='%s' AND pass_hash='%s'", $email, md5($password));
        if($q->fetchAssoc())
        {
            ActingUser::login($q->get('id'), $q->get('name'));
            return true;
        }
        
        return false;
    }
}

?>