<?php

class Users extends Controller
{
    public function index()
    {
	global $module;
	$module ='users';
        $this->view('header');
        $this->view('users');
        $this->view('footer');
    }
}

?>
