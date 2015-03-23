<?php defined('EXEC') or die;
    
class Home extends Controller
{
    public function index()
    {
        $this->view("header");
        $this->view("home");
        $this->view("footer");
    }
}

?>
