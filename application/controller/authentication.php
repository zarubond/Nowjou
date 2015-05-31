<?php defined('EXEC') or die;

include 'application/model/usermanager.php';

class Authentication extends Controller
{
    public function index()
    {
    }
    
    public function signup()
    {
        $this->redirect("events");
    }
    
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
    
    public function logout()
    {
        ActingUser::logout();
        $this->redirect("home");   
    }
}
?>