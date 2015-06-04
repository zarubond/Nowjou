<h2>Participating Events</h2>

<?php
echo '<table style="width:100%;">
<tr><th>Title</th><th>Time</th><th>Unjoin</th></tr>';
 
foreach($events as $event)
{
   echo '<tr><td><a href="'.base_url('events/showevent/?id='.$event->id()).'">'.$event->title().'</a></td><td>'.date(DATE_RFC2822,$event->time()).'</td><td><a href="'.base_url('events/unjoinevent/?id='.$event->id()).'">Unjoin</a></td></tr>';
    
}
echo '</table>';

?>