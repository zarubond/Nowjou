<h2>Create Event</h2>
<form method="post" action="<?php echo base_url('events/create')?>">
    <table>
        <tr><td>Title</td><td><input type="text" name="title"/></td></tr>
        <tr><td>Description</td><td><textarea name="description" rows="4" cols="50"></textarea></td></tr>
        <tr><td>Time</td><td><input type="date" name="date" value="<?php echo date('Y-m-d');?>"/><input type="time" name="time" value="<?php echo date('h:i:s');?>" /></td></tr>
        <tr><td>Maximum participants</td><td><input type="number" name="max_participants" value="2"/></td></tr>
    </table>
    <input type="submit" value="Create"/>
</form>