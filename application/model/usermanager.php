<?php

include_once 'user.php';
    
class UserManager extends Manager
{
    public function createUser($user)
    {
    }
    /**
     * @brief Get all user in the system.
     * @return Array of users.
     */
    public function getUsers()
    {
        $users=Array();

        $q = new SQL; 
        $q->query("SELECT * FROM users");
        $i=0;
        while($q->fetchAssoc())
        {
            $users[$i]=new User($q->get('id'));
            $users[$i]->setup($q->get('name'), $q->get('pass_hash'), $q->get('email'), $q->get('ban'));
            $i++;
        }
        
        $q->close();
     
        return $users;
    }
    /**
     * @brief Try to log the user to system with given credentials
     * @param [in] string $email Email of user.
     * @param [in] string $password User's password.
     * @return boolean.
     */
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