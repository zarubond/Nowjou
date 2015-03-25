<?php defined('EXEC') or die;

class Router
{
    function run($url)
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
            
            if($url_parts[$i]=='admin')
            {
                $admin=true;
                $i++;
            }
            
            if(isset($url_parts[$i]))
	           $controller=$url_parts[$i];
	       
            if(isset($url_parts[$i+1]))
	           $page=$url_parts[$i+1];
            
            if($controller!=NULL)
                $this->launchController($admin, $controller, $page);
            else
            {
                if($admin)
                    $this->launchController(true, ADMIN_HOME);
                else
                    $this->launchController(false, APPLICATION_HOME);
            }
        }
        else
            $this->launchController(false, APPLICATION_HOME);
    }
  
    private function launchController($isadmin, $controller, $page=NULL)
    {
        $c_module=$this->clearText($controller);
        
        if($isadmin)
            $path = ADMINISTRATION_FOLDER.'/controller/'.$c_module.'.php';
        else
            $path = APPLICATION_FOLDER.'/controller/'.$c_module.'.php';
        
        if(file_exists($path))
        {       
            include $path;
            $class_name=ucFirst($c_module);
            
            if(class_exists($class_name))
            {            
                if($isadmin)
                    $object=new $class_name(ADMINISTRATION_FOLDER);
                else
                    $object=new $class_name(APPLICATION_FOLDER);
                echo $page;
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
