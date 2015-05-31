<?php

class ActingUser
{
    private static $id=-1;
    private static $islogged=false;
    private static $name=null;
    
    public static function init()
    {
        if(isset($_SESSION['user_id']) && isset($_SESSION['name']))
        {
            self::$id=$_SESSION['user_id'];
            self::$name=$_SESSION['name'];
            if(self::$id>0)
            {
                self::$islogged=true;
            }
        }
        else
        {
            self::$id=-1;
            self::$islogged=false;
        }
    }
    
    public static function login($id, $name)
    {
        self::$islogged=true;
        $_SESSION['user_id']=43;
        $_SESSION['name']=$name;
    }
    
    public static function logout()
    {
        self::$islogged=false;
        self::$id=-1;
        unset($_SESSION['user_id']);
    }
    
    public static function id()
    {
        return self::$id;
    }
    
    public static function name()
    {
        return self::$name;
    }
    
    public static function isLogged()
    {
        return self::$islogged;
    }
}

?>
