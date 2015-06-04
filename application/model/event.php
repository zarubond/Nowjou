<?php
class Event
{
    private $id;
    private $user_id;
    private $title;
    private $created;
    private $time;
    private $description;
    private $max_participants;
    private $cancel;
    private $reason;
    private $ban;
    
    public function __construct($id, $user_id)
    {
        $this->id=$id;
        $this->user_id=$user_id;
    }
    
    public function setup($title, $created, $time, $description, $max_participants, $cancel, $reason, $ban)
    {
        $this->title=$title;
        $this->created=$created;
        $this->time=$time;
        $this->description=$description;
        $this->max_participants=$max_participants;
        $this->cancel=$cancel;
        $this->reason=$reason;
        $this->ban=$ban;
    }
    
    public function id()
    {
        return $this->id;
    }
    
    public function userId()
    {
        return $this->user_id;
    }
    
    public function description()
    {
        return $this->description;
    }
    
    public function setDescription($text)
    {
        $this->description=$description;
    }
    
    public function title()
    {
        return $this->title;   
    }
    
    public function setTitle($title)
    {
        $this->title=$title;
    }
    
    public function time()
    {
        return $this->time;
    }
    
    public function setTime($time)
    {
        $this->time=$time;
    }
    
    public function created()
    {
        return $this->created;
    }
    
    public function setCreated($created)
    {
        $this->created=$created;
    }
    
    public function maxParticipants()
    {
        return $this->max_participants;
    }
    
    public function setMaxParticipants($max_participants)
    {
        $this->max_participants=$max_participants;
    }
    
    public function cancel()
    {
        return $this->cancel;
    }
    
    public function setCancel($cancel)
    {
        $this->cancel=$cancel;
    }
    
    public function reason()
    {
        return $this->reason;
    }
    
    public function ban()
    {
        return $this->ban;
    }
    
    public function setBan($ban)
    {
        $this->ban=$ban;
    }
}
?>