<?php

class Home extends Controller
{
    //there is a bug which will call home method as constructor
    public function __construct($app_folder)
    {
        parent::__construct($app_folder);
    }
    
    public function index()
    {
        $this->view('header');
        $this->view('dashboard');
        $this->view('footer');
    }
}

?>