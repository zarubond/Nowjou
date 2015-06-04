<h1 class="page-header">Users</h1>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Ban</th>
            </tr>
        </thead>
        <tbody>
<?php 
    $desc='';
    $i=0;
    foreach($data['users'] as $user)
    {

        echo '<tr><td>'.$user->id().'</td><td>'.$user->name().'</td><td>'.$user->email().'</td><td>';
        if($user->ban())
            echo '<a href="">UnBan</a>';
        else
            echo '<a href="">Ban</a>';
        echo '</td></tr>';
    }         
?>
        </tbody>
    </table>
</div>