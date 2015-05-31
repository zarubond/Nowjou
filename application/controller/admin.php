<?php defined('EXEC') or die;

class Admin extends Controller
{
    public function index()
    {
        $data=Array();
        $data['module']='index';
        $this->view('admin/header', $data);
        $this->view('admin/dashboard');
        $this->view('admin/footer');
    }
    
    public function notifications()
    {
        $this->view('admin/header');
        $this->view('admin/notifications');
        $this->view('admin/footer');
    }
    
    public function events()
    {
        $this->view('admin/header');
        $this->view('admin/events');
        $this->view('admin/footer');
    }
    
    public function users()
    {
        $this->view('admin/header');
        $this->view('admin/users');
        $this->view('admin/footer');
    }
    
    /*
    public function index()
    {
        $this->redirect('admin/main');
    }
    
    protected function pageHeader()
    {        
        $this->view('page-header');
    }
    
    protected function pageFooter()
    {
        $notif_manager=new NotificationManager();
        $data['notifications']=$notif_manager->notifications();
        $this->view('page-footer', $data);
    }*/
}

?>
