<?php

class Adminlogin extends Controller
{
    //there is a bug which will call home method as constructor
    public function __construct()
    {
        parent::__construct();
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
        $this->redirect('admin');
    }
    
    public function verify()
    {
        $this->redirect("home");
    }
}

?>