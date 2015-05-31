<?php defined('EXEC') or die;

include 'page.php';
include_once 'application/model/eventmanager.php';

class Events extends Page
{
    public function index()
    {
        $this->eventlist();
    }
    
    public function eventlist()
    {
        $this->pageHeader();
        
        $manager=new EventManager();
        $data['events']=$manager->events();
        $this->view('eventlist', $data);
        
        $this->pageFooter();
    }
    
    public function event()
    {
        if(isset($_GET['id']))
        {
            $manager=new EventManager();
            $event=$manager->getEvent($_GET['id']);
            
            if($event!=null)
            {
                $data['event']=$event;
                $this->pageHeader();
                $this->view('event', $data);
                $this->pageFooter();
            }
            else $this->redirect('error', 'e404');
        }
        else
            $this->redirect('error', 'e404');
    }
    
    public function myevents()
    {
        $this->pageHeader();
        //$this->view('event', $data);
        $this->pageFooter();
    }
    
    public function participating()
    {
        $this->pageHeader();
        //$this->view('event', $data);
        $this->pageFooter();
    }
    
    public function createevent()
    {
        $this->pageHeader();
        $this->view('createevent');
        $this->pageFooter();
    }
    
    public function create()
    {
        $this->redirect('myevents');
    }
    
    public function join()
    {
        $this->redirect('events');
    }
    
    public function report()
    {
        $this->redirect('events');
    }
}
?>