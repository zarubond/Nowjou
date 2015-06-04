<?php 

class Comment{
    private $id;
    private $text;
    private $user_id;
    private $event_id;
    private $created;
    private $ban;
    
    public function __construct($id, $event_id, $user_id)
    {
        $this->id=$id;
        $this->event_id=$event_id;
        $this->user_id=$user_id;
    }
    
    public function id()
    {
        return $id;
    }
    
    public function setup($text, $created, $ban)
    {
        $this->text=$text;
        $this->created=$created;
        $this->ban=$ban;
    }
    
    public function eventId()
    {
        return $event_id;
    }
    
    public function userId()
    {
        return $user_id;
    }
    
    public function text()
    {
        return $this->text;
    }
    
    public function setText($text)
    {
        $this->text=$text;
    }
    
    public function setBan($ban)
    {
        $this->ban=$ban;
    }
    
    public function ban()
    {
        return $this->ban;   
    }
    
    public function created()
    {
        return $this->created;
    }
    
    public function setCreated($created)
    {
        $this->created=$created;
    }
}

?>