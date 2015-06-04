<?php defined('EXEC') or die;

include 'application/model/usermanager.php';
/**
 * @brief User authentification system.
 */
class Authentication extends Controller
{
    public function index()
    {
    }
    
    public function signup()
    {
        $this->redirect("events");
    }
    /**
     * @brief Login to system with given credentials.
     * @param [in] string $_POST['password'] User's password.
     * @param [in] string $_POST['email'] User's email address.
     */
    public function login()
    {
        if(isset($_POST['email']) && isset($_POST['password']))
        {
            $manager=new UserManager;
            
            if($manager->login($_POST['email'], $_POST['password']))
                $this->redirect("events");
        }
        
        $this->redirect("home"); 
    }
    
    /**
     * @brief Logout the user from the system.
     */
    
    public function logout()
    {
        ActingUser::logout();
        $this->redirect("home");   
    }
}
?>