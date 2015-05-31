<?php defined('EXEC') or die;

class Error extends Controller
{
    public function e404()
    {
        echo '<h1>Error 404</h1>'
    }
    
    public function e403()
    {
        echo '<h1>Error 403</h1>'
    }
}

?>