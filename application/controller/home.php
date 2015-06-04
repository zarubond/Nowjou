<?php defined('EXEC') or die;
/**
 * @brief Login/Signup views.
 */
class Home extends Controller
{
    public function index()
    {
        if(!ActingUser::isLogged())
        {
            $this->view("header");
            $this->view("home");
            $this->view("footer");
        }
        else
            $this->redirect('events');
    }
}

?>
