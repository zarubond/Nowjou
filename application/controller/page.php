<?php defined('EXEC') or die;

include_once 'application/model/notificationmanager.php';
/**
 * @brief Base class for all controller which want to show something to user.
 */
abstract class Page extends Controller
{
    public function __construct()
    {
        if(!ActingUser::isLogged())
            $this->redirect('home');
    }
    
    public function index()
    {
        $this->redirect('events');
    }
    /**
    * @brief Begining of the page. Put your content after calling this method.
    */
    protected function pageHeader()
    {   
        $data=Array();
        $data['user_name']=ActingUser::name();
        $this->view('page-header', $data);
    }
    /**
    * @brief End of page. Put your contnt before calling this method.
    */
    protected function pageFooter()
    {
        $notif_manager=new NotificationManager();
        $data=Array();
        $data['notifications']=$notif_manager->getNotifications();
        $this->view('page-footer', $data);
    }
}

?>
