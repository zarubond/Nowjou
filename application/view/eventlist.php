<h2>Events</h2>
<?php 
    $desc='';
    $i=0;
    foreach($data['events'] as $event)
    {
        if(strlen($event->description())>100)
            $desc=substr($event->description(), 0, 100).'...';
        else
            $desc=$event->description();

        echo '<a href="'.base_url('events/showevent/?id='.$event->id()).'" ><div class="event_box"><h3>'.$event->title().'</h3><p>Date: '.date(DATE_RFC822, $event->time()).'</p><p style="word-break: break-all;">'.$desc.'</p>';

        if(ActingUser::id()!=$event->userId() && !$participating[$i])
            echo '<a href="'.base_url('events/joinevent/?id='.$event->id()).'" style="float: right;color: blue;">Join</a>';
        else
            echo '<span style="float: right">attending</span>';
        $i++;
            
        echo '<a href="'.base_url('events/report/?id='.$event->id()).'" style="color:red">Report</a></div></a>';
    }         
?>