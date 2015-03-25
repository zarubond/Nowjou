<?php

class Notifications extends Controller
{
    public function index()
    {
        $this->view('header');
        $this->view('notifications');
        $this->view('footer');
    }
}

?>