<?php defined('EXEC') or die;

class Board extends Controller
{
    public function index()
    {
        $this->view('header');
        $this->view('board');
        $this->view('footer');
    }
}


?>