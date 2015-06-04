<?php
include_once 'event.php';

class EventManager extends Manager
{
    /**
     * @brief Some brief description.
     * @param [in|out] type parameter_name Parameter description.
     * @param [in|out] type parameter_name Parameter description.
     * @return Description of returned value.
     */
    public function getEvents()
    {
        $events=Array();

        $q = new SQL; 
        $q->query("SELECT * FROM events");
        $i=0;
        while($q->fetchAssoc())
        {
            $events[$i]=new Event($q->get('id'), $q->get('user_id'));            
            $events[$i]->setup($q->get('title'), $q->get('created'), $q->get('time'), $q->get('description'), $q->get('max_participants'), $q->get('cancel'), $q->get('reason'), $q->get('ban'));
            $i++;
        }
        
        $q->close();
     
        return $events;
    }
    /**
     * @brief getEvents Get all events created by given user in database.
     * @param [in] User/ActiveUser $user User which we want to find events.
     * @return Array of events.
     */
    public function getMyEvents($user)
    {
        $events=Array();
        $q = new SQL; 
        $q->query("SELECT * FROM events WHERE user_id='%d'", $user->id());
        $i=0;
        while($q->fetchAssoc())
        {
            $events[$i]=new Event($q->get('id'), $q->get('user_id'));            
            $events[$i]->setup($q->get('title'),$q->get('created'), $q->get('time'), $q->get('description'), $q->get('max_participants'), $q->get('cancel'), $q->get('reason'), $q->get('ban'));
            $i++;
        }
        
        $q->close();
     
        return $events;
    }
    /**
     * @brief getEvent Get event with given id.
     * @param [in] int $id Id of event.
     * @return Event with given id.
     */
    public function getEvent($id)
    {
        $event=null;
        $q = new SQL; 
        $q->query("SELECT * FROM events WHERE id='%d'", $id);
        $i=0;
        if($q->fetchAssoc())
        {
            $event=new Event($q->get('id'), $q->get('user_id'));            
            $event->setup($q->get('title'), $q->get('created'), $q->get('time'), $q->get('description'), $q->get('max_participants'), $q->get('cancel'), $q->get('reason'), $q->get('ban'));
        }
        
        return $event;
    }
    
    /**
     * @brief Get the events the user is participating on.
     * @param [in] User $user The user.
     * @return Array of Event.
     */
    public function getParticipatingEvents($user)
    {
        $events=Array();
        $q = new SQL; 
        $q->query("SELECT events.* FROM events JOIN participants ON events.id=participants.event_id WHERE participants.user_id='%d'", $user->id());
        $i=0;
        echo $q->error();
        while($q->fetchAssoc())
        {
            $events[$i]=new Event($q->get('id'), $q->get('user_id'));            
            $events[$i]->setup($q->get('title'),$q->get('created'), $q->get('time'), $q->get('description'), $q->get('max_participants'), $q->get('cancel'), $q->get('reason'), $q->get('ban'));
            $i++;
        }
        
        $q->close();
     
        return $events;
    }
    /**
     * @brief Create an event in the database.
     * @param [in] Event $event Event object with filled parameters.
     * @return Created event.
     */
    public function createEvent($event)
    {
        $q = new SQL;
        if($q->query("INSERT INTO events (user_id, title, created, time, description, max_participants, cancel, ban) VALUES ('%d','%s', '%d', '%d', '%s', '%d', '0', '0')", 
                $event->userId(), htmlspecialchars($event->title()), $event->created(), time(), htmlspecialchars($event->description()), $event->maxParticipants()));
		{
            $id=$q->getInsertId();
            $ev=new Event($id, $event->userId());
            $ev->setup($event->title(), $event->created(), $event->time(), $event->description(), $event->maxParticipants(), $event->cancel(), $event->reason(), $event->ban());
            return $ev;
        }
        
        return null;
    }
    /**
     * @brief Make the given user to join the event.
     * @param [in] int $event_id The id of the event.
     * @param [in] User $user User that wants to join.
     */
    public function joinEvent($event_id, $user)
    {
        $q = new SQL;
        return $q->query("INSERT INTO participants (user_id, event_id) VALUES ('%d','%d')", $user->id(), $event_id);
    }
    /**
     * @brief Make the given user to unjoin the event.
     * @param [in] int $event_id The id of the event.
     * @param [in] User $user User that wants to unjoin.
     */
    public function unjoinEvent($event_id, $user)
    {
        $q = new SQL;
        return $q->query("DELETE FROM participants WHERE user_id='%d' AND event_id='%d'", $user->id(), $event_id);
    }
    
    /**
     * @brief Check if the user is participating on given event.
     * @param [in] Event $event Event you are asking for.
     * @param [in] User $user User to check.
     */
    public function isParticipating($event, $user)
    {
       
        $q = new SQL; 
        $q->query("SELECT COUNT(*) AS cnt FROM participants WHERE event_id='%d' AND user_id='%d'", $event->id(), $user->id());

        if($q->fetchRow())
        {
            return $q->get(0)==1;
        }
        return true;
    }
    
}
?>