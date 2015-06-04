<?php defined('EXEC') or die;

include 'page.php';
include_once 'application/model/eventmanager.php';
include_once 'application/model/commentmanager.php';
/**
 * @brief Events handler.
 */
class Events extends Page
{
    public function index()
    {
        $this->eventlist();
    }
    /**
     * @brief Show the view with all events.
     */
    public function eventlist()
    {
        $this->pageHeader();
        $data=Array();
        $data['participating']=Array();
        $manager=new EventManager();
        $data['events']=$manager->getEvents();
        $user=new ActingUser;
        $i=0;
        foreach($data['events'] as $event)
        {
            $data['participating'][$i++]=$manager->isParticipating($event,$user);
        }

        $this->view('eventlist', $data);
        
        $this->pageFooter();
    }
    /**
     * @brief Show all event that the currently logged user has created.
     */
    public function myevents()
    {
        $this->pageHeader();
        $manager=new EventManager();
        $user=new ActingUser;
        $data['events']=$manager->getMyEvents($user);
        $this->view('myevents', $data);
        $this->pageFooter();
    }
    /**
     * @brief Show all event that the currently logged user is participating.
     */
    public function participatingevents()
    {
        $this->pageHeader();
        $manager=new EventManager();
        $user=new ActingUser;
        $data['events']=$manager->getParticipatingEvents($user);
        $this->view('participatingevents', $data);
        $this->pageFooter();
    }
    /**
     * @brief Show a form to create new event.
     */
    public function createevent()
    {
        $this->pageHeader();
        $this->view('createevent');
        $this->pageFooter();
    }
    /**
     * @brief Create new event with given parameters.
     * @param [in] string $_POST['title'] Title of the event.
     * @param [in] string $_POST['description'] Description of the event.
     * @param [in] date $_POST['date'] Date of the event when is happening.
     * @param [in] time $_POST['time'] Time of the day when the event is happening.
     * @param [in] int $_POST['max_participants'] Maximum users that are allowed to participate.
     * @return Description of returned value.
     */
    public function create()
    {
        if(isset($_POST['title']) && isset($_POST['description']) && isset($_POST['date']) && isset($_POST['time']) && isset($_POST['max_participants']))
        {
            $manager =new EventManager();
            $event=new Event(-1, ActingUser::id());
            $time=strtotime($_POST['date'].' '.$_POST['time']);
            $event->setup($_POST['title'], time(), $time, $_POST['description'], $_POST['max_participants'], false, '', false);
            $manager->createEvent($event);
            $this->redirect('events/myevents');
        }
        else
        {
            $this->redirect('events');
        }
    }
    /**
     * @brief Makes the current user to join to the requested event.
     * @param [in] int $_GET['id'] Id of the event.
     */
    public function joinevent()
    {
        if(isset($_GET['id']))
        {
            $manager=new EventManager();
            $user=new ActingUser;
            
            $manager->joinEvent($_GET['id'], $user);
        }
        $this->redirect('events');
    }
    /**
     * @brief Makes the current user to unjoin from the requested event.
     * @param [in] int $_GET['id'] Id of the event.
     */
    public function unjoinevent()
    {
        if(isset($_GET['id']))
        {
            $manager=new EventManager();
            $user=new ActingUser();
            $manager->unjoinEvent($_GET['id'], $user);
        }
        $this->redirect('events');
    }
    /**
     * @brief Show in detain given event
     * @param [in] int $_GET['id'] Id of the event.
     */
    public function showevent()
    {
        if(isset($_GET['id']))
        {
            $this->pageHeader();
            $manager=new EventManager();
            $comm=new CommentManager();
            $data['event']=$manager->getEvent($_GET['id']);
            $event=new Event($_GET['id'],-1);
            $data['comments']=$comm->getEventComments($event);
            
            $this->view('showevent', $data);
            $this->pageFooter();
        }
    }
}
?>