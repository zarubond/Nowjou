<?php
class Event
{
    private $id;
    private $title;
    private $created;
    private $time;
    private $description;
    private $max_participants;
    private $cancel;
    private $reason;
    private $ban;
    
    public function __construct($id)
    {
        $this->id=$id;
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
}
?>