<?php
include_once 'notification.php';
    
class NotificationManager extends Manager
{
    /**
     * @brief Get all notification in database.
     * @return Array of Notification
     */
    public function getNotifications()
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
    /**
     * @brief Get selected notification.
     * @param [in] int $id Id of the notification.
     * @return Notification.
     */
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