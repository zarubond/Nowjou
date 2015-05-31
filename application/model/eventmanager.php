<?php
include_once 'event.php';

class EventManager
{
    public function events()
    {
        $events=Array();

        $q = new SQL; 
        $q->query("SELECT * FROM events");
        $i=0;
        while($q->fetchAssoc())
        {
            $events[$i]=new Event($q->get('id'));            
            $events[$i]->setup($q->get('title'), $q->get('created'), $q->get('time'), $q->get('description'), $q->get('max_participants'), $q->get('cancel'), $q->get('reason'), $q->get('ban'));
            $i++;
        }
        
        $q->close();
     
        return $events;
    }
    
    public function getEvent($id)
    {
        $event=null;
        $q = new SQL; 
        $q->query("SELECT * FROM events WHERE id='%d'", $id);
        $i=0;
        if($q->fetchAssoc())
        {
            $event=new Event($q->get('id'));            
            $event->setup($q->get('title'), $q->get('created'), $q->get('time'), $q->get('description'), $q->get('max_participants'), $q->get('cancel'), $q->get('reason'), $q->get('ban'));
        }
        
        return $event;
    }
    
    public function createEvent($event)
    {
        $q = new SQL;
        if($q->query("INSERT INTO events (title, created, time, description, max_participants, cancel, ban, created) VALUES ('%s', '%d', '%d', '%s', '%d', '0', '0', '%d')", 
                 htmlspecialchars($event->title()), $event->created(), htmlspecialchars($event->description()), $event->maxParticipants(), $time));
		{
            $id=$que->GetInsertId();
            $ev=new Event($id);
            $ev->setup($event->title, $event->created, $event->time, $event->description, $event->max_participants, $event->cancel, $event->reason, $event->ban);
            return $ev;
        }
        
        return null;
    }
}
?>