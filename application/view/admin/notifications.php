<h1 class="page-header">Users</h1>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
<?php
    foreach($notifications as $notif)
    {
        echo '<tr><td>'.$notif->id().'</td><td>'.$notif->title().'</td><td>'.$notif->text().'</td><td>'.date(DATE_RFC2822, $notif->created()).'</td><td><a href="">Edit</a></td></tr>';
    }         
?>
        </tbody>
    </table>
</div>