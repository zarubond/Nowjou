<?php

class Events extends Controller
{
    public function index()
    {
        $this->view('header');
        $this->view('events');
        $this->view('footer');
    }
}

?>