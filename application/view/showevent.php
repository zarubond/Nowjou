<h2><?php echo $event->title()?></h2>

<p><?php echo date(DATE_RFC822, $event->time());?></p>

<p><?php echo $event->description();?></p>
<h3>Comments</h3>
<table border="1px" style="width:100%">
<?php

    foreach($comments as $comment)
    {
        echo '<tr><td style="width:10%">'.date(DATE_ATOM,$comment->created()).'</td><td>'.$comment->text().'</td></tr>';    
    }
?>
</table>