<h2>My Events</h2>

<?php
echo '<table style="width:100%;">
<tr><th>Title</th><th>Time</th><th></th><th>Cancel</th><th>Edit</th></tr>';
 
foreach($events as $event)
{
   echo '<tr><td>'.$event->title().'</td><td>'.date(DATE_RFC2822,$event->time()).'</td><td><a href="">Cancel</a></td><td><a href="">Edit</a></td></tr>';
    
}
echo '</table>';

?>