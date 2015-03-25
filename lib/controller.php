<?php defined('EXEC') or die;

/**
 * @brief Parent for all controller children.
 * When you want to create new controller you have to create new file in /application/controller/. Name this controller in lower case letters without any special chars. 
 * In this file create class which has the same name as the file but with first upper case letter. This class has to inherete from Controller.
 * To crete new page in the controller, just create public method in lower case letters.
 
 //exemple class in file home.php
 class Home extends Controller
 {
    //main function to be called
    public function index()
    {
    }
    //name of other page
    public function pagex()
    {
    }
 }
 */
abstract class Controller
{
    private static $app_folder='';
    private static $base_url='';
    
    public function __construct($app_folder)
    {
        self::$app_folder=$app_folder;        
    }
    
    /**
     * @brief This function is basic function if the controller is selected without page. You should override this method in each sub class
     */
    public function index()
    {
    }
    /**
     * @brief Include view in ./application/view/ to the page.
     * @param [in] string $view Name of the view.
     */
    protected function view($view)
    {
        $path = self::$app_folder.'/view/'.$view.'.php';
        if(file_exists($path))
            include $path;
        else
            echo 'ERROR 404';
    }
    /**
     * @brief Redirect current page to another location given by $controller name and it's page.
     * @param [in] string $controller Name of the controller.
     * @param [in] string $page Name of the page. This paremether is optional.
     */
    protected function redirect($controller, $page=NULL)
    {
        if($page!=NULL)
            header('Location: '.system_url($controller.'/'.$page));
        else
            header('Location: '.system_url($controller));
        exit;
    }
}

?>