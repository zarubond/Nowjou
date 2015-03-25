<?php

class Help extends Controller
{
    public function index()
    {
        $this->view('header');
        $this->view('help');
        $this->view('footer');
    }
}

?>