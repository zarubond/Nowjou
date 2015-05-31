<?php


class Notification 
{
    private $id;
    private $title;
    private $text;
    private $created;
    
    public function __construct($id)
    {
        $this->id=$id;
    }
    
    public function setup($title, $text, $created)
    {
        $this->title=$title;
        $this->text=$text;
        $this->created=$created;
    }
    
    public function id()
    {
        return $this->id;
    }
    
    public function title()
    {
        return $this->title;
    }
    
    public function text()
    {
        return $this->text;
    }
    
    public function created()
    {
        return $this->created;
    }
}

?>