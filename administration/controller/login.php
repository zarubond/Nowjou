<?php

class Login extends Controller
{
    //there is a bug which will call home method as constructor
    public function __construct($app_folder)
    {
        parent::__construct($app_folder);
    }
    
    public function index()
    {
        $this->login();
    }
    
    public function login()
    {
        $this->view('login');
    }
    
    public function logout()
    {
        $this->redirect('login');
    }
    
    public function verify()
    {
        $this->redirect("home");
    }
}

?>