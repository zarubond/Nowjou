<?php

class Home extends Controller
{
    public function index()
    {
        $this->view('login');
    }
    
    public function home()
    {
        $this->view('header');
        $this->view('dashboard');
        $this->view('home');
        $this->view('footer');
    }
}
