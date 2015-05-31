<?php defined('EXEC') or die;

class Router
{
    public function run($url)
    {
        $url_parts=explode("/", $url);
        $current_folder = basename(getcwd());
        $i=0;
        while($i<count($url_parts) && $current_folder!=$url_parts[$i++]);
        
        if($i<count($url_parts))
        {
            $page=NULL;
            $controller=NULL;
            $admin=false;
            
            
            if(isset($url_parts[$i]))
	           $controller=$url_parts[$i];
	       
            if(isset($url_parts[$i+1]))
	           $page=$url_parts[$i+1];
            
            if($controller!=NULL)
                $this->launchController($controller, $page);
            else
            {
                $this->launchController(APPLICATION_HOME);
            }
        }
        else
            $this->launchController(APPLICATION_HOME);
    }
  
    private function launchController($controller, $page=NULL)
    {
        $c_module=$this->clearText($controller);
        
        $path = APPLICATION_FOLDER.'/controller/'.$c_module.'.php';
        
        if(file_exists($path))
        {       
            include $path;
            
            $class_name=ucFirst($c_module);
            
            if(class_exists($class_name))
            {            
                $object=new $class_name();
                
                if($page==NULL)
                {
                    $object->index();
                }
                else if(method_exists($object, $page))
                {
                    $c_page=$this->clearText($page);
                    call_user_func(array($object, $c_page));
                }
                else echo 'ERROR 404';
            }
            else
                echo 'ERROR 404';
        }
        else
            echo 'ERROR 404';
    }
    
    private function clearText($text)
    {
        return preg_replace('/[^\w]/', '', $text);
    }
} 
?>
