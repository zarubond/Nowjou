<?php defined('EXEC') or die;

include_once 'application/model/eventmanager.php';
include_once 'application/model/usermanager.php';
include_once 'application/model/notificationmanager.php';
/**
 * @brief Class for administrator views.
 */
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
        $data=Array();
        $manager=new NotificationManager();
        $data['notifications']=$manager->getNotifications();
        $module['module']='notifications';
        $this->view('admin/header',$module);
        $this->view('admin/notifications', $data);
        $this->view('admin/footer');
    }
    
    public function events()
    {
        $data=Array();
        $manager=new EventManager();
        $data['events']=$manager->getEvents();
        $module['module']='events';
        $this->view('admin/header', $module);
        $this->view('admin/events', $data);
        $this->view('admin/footer');
    }
    
    public function users()
    {
        $data=Array();
        $manager=new UserManager();
        $data['users']=$manager->getUsers();
        $module['module']='users';
        $this->view('admin/header',$module);
        $this->view('admin/users', $data);
        $this->view('admin/footer');
    }
}

?>
