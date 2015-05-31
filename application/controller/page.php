<?php defined('EXEC') or die;

include_once 'application/model/notificationmanager.php';

class Page extends Controller
{
    public function __constructor()
    {
        if(!ActingUser::isLogged())
            $this->redirect('home');
    }
    
    public function index()
    {
        $this->redirect('events');
    }
    
    protected function pageHeader()
    {   
        $data=Array();
        $data['user_name']=ActingUser::name();
        $this->view('page-header', $data);
    }
    
    protected function pageFooter()
    {
        $notif_manager=new NotificationManager();
        $data=Array();
        $data['notifications']=$notif_manager->notifications();
        $this->view('page-footer', $data);
    }
}

?>
