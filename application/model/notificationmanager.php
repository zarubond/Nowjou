<?php
include_once 'notification.php';

class NotificationManager
{
    
    public function notifications()
    {
        $notifs=Array();

        $q = new SQL; 
        $q->query("SELECT * FROM notifications");
        $i=0;
        while($q->fetchAssoc())
        {
            $notifs[$i]=new Notification($q->get('id'));            
            $notifs[$i]->setup($q->get('title'), $q->get('text'), $q->get('created'));
            $i++;
        }
        
        $q->close();
     
        return $notifs;
    }
    
    public function getNotification($id)
    {
        $notif=null;
        $q = new SQL; 
        $q->query("SELECT * FROM notifications WHERE id='%d'", $id);
        $i=0;
        if($q->fetchAssoc())
        {
            $notif=new Event($q->get('id'));            
            $notif->setup($q->get('title'), $q->get('text'), $q->get('created'));
        }
        
        return notif;
    }
}

?>