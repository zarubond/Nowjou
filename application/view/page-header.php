<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <title>NOWJOU</title>
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('application/assets/style/style.css');?>">
</head>
<body>
    <div>
        <h1>Nowjou - your gate for fun</h1>
        <div style="float: right">
            <a href="<?php echo base_url('authentication/logout')?>">Logout</a>
        </div>

        <div style="width:100%; display: table; margin: auto;border-top: 1px solid black;">
            <div style="display: table-row">
                <div style="width: 10%;display: table-cell;">
                    <h2>Menu</h2><br/>
                    <?php echo $user_name;?>
                    <div id='cssmenu'>
                    <ul>
                        <li><a href="<?php echo base_url('events')?>">Events</a></li>
                        <li><a href="<?php echo base_url('participating')?>">Participating</a></li>
                        <li><a href="<?php echo base_url('events/myevents')?>">My events</a></li>
                        <li><a href="">Participating events</a></li>
                        <li><a href="<?php echo base_url('events/create')?>">Create event</a></li>
                        <li><a href="<?php echo base_url('settings')?>">Settings</a></li>
                    </ul>
                    </div>
                </div>
                <div style="width: 70%; display: table-cell;border-right:1px solid black; border-left: 1px solid black">
