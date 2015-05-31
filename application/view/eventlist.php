<h2>Events</h2>
<?php 
    $desc='';
    foreach($data['events'] as $event)
    {
        if(strlen($event->description())>100)
            $desc=substr($event->description(), 0, 100).'...';
        else
            $desc=$event->description();

        echo '<div class="event_box"><h3>'.$event->title().'</h3><p>Date: '.date(DATE_RFC822, $event->time()).'</p><p style="word-break: break-all;">'.$desc.'</p>
                <a href="'.base_url('events/join/?id='.$event->id()).'" style="float: right;">Join</a><a href="'.base_url('events/report/?id='.$event->id()).'">Report</a></div>';
    }         
?>