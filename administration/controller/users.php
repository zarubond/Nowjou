<?php

class Users extends Controller
{
    public function index()
    {
        $this->view('header');
        $this->view('users');
        $this->view('footer');
    }
}

?>
