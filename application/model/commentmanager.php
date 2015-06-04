<?php
include 'comment.php';

class CommentManager
{
    /**
     * @brief Give me the comments to given event.
     * @param [in] Event $event The event we want to find comments to.
     * @return Array of Comment.
     */
    public function getEventComments($event)
    {
        $comms=Array();
        $q = new SQL; 
        $q->query("SELECT * FROM comments WHERE event_id='%d'", $event->id());
        $i=0;
        while($q->fetchAssoc())
        {
            $comm=new Comment($q->get('id'), $q->get('event_id'), $q->get('user_id'));            
            $comm->setup($q->get('text'), $q->get('created'), $q->get('ban'));    
            $comms[$i++]=$comm;
        }
        
        return $comms;
    }
}

?>