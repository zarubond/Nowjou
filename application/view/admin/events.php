<h1 class="page-header">Events</h1>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Date</th>
                <th>Description</th>
                <th>Ban</th>
            </tr>
        </thead>
        <tbody>
<?php 
    $desc='';
    $i=0;
    foreach($data['events'] as $event)
    {
        if(strlen($event->description())>100)
            $desc=substr($event->description(), 0, 100).'...';
        else
            $desc=$event->description();

        echo '<tr><td>'.$event->id().'</td><td>'.$event->title().'</td><td>'.date(DATE_RFC822, $event->time()).'</td><td>'.$desc.'</td>';
            
        echo '<td><a href="'.base_url('events/report/?id='.$event->id()).'">Ban</a></td></tr>';
    }         
?>
        </tbody>
    </table>
</div>