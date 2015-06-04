<?php
/**
 * @brief Singleton User class.
 */

class ActingUser
{
    private static $id=-1;
    private static $islogged=false;
    private static $name=null;
    /**
     * @brief Initialize the user login system on start of exeucion.
     */
    public static function init()
    {
        if(isset($_SESSION['user_id']) && $_SESSION['user_id']>0 && isset($_SESSION['name']))
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
    /**
     * @brief Set the user to login state.
     * @param [in] int $id User's id.
     * @param [in] string $name User's name.
     */
    
    public static function login($id, $name)
    {
        self::$islogged=true;
        self::$id=$id;
        self::$name=$name;
        
        $_SESSION['user_id']=$id;
        $_SESSION['name']=$name;
    }
    /**
     * @brief Logout the user.
     */
    public static function logout()
    {
        self::$islogged=false;
        self::$id=-1;
        $_SESSION['user_id']=-1;
        $_SESSION['name']='';
        session_unset();
    }
    
    public static function id()
    {
        return self::$id;
    }
    
    public static function name()
    {
        return self::$name;
    }
    /**
     * @brief Check if the the user is logged to system.
     * @return true/false.
     */
    public static function isLogged()
    {
        return self::$islogged;
    }
}

?>
