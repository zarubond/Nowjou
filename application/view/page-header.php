<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <title>NOWJOU</title>
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('application/assets/style/style.css');?>">
</head>
<body>
    <div style="height:100%; width: 100%;">
        <div style="background-color: #8FB3E3; width: 100%; height: 100%">
            <img style="height: 70px;" src="<?php echo base_url('application/assets/style/logo.jpg');?>">
            <div style="float: right">
                <a href="<?php echo base_url('authentication/logout')?>">Logout</a>
            </div>
        </div>
        <div style="min-height:100%;width:100%; display: table; margin: auto;border-top: 20px solid rgb(0,112,192);">
            <div style="display: table-row">
                <div style="width: 10%;display: table-cell;">
                    <p>Welcome <?php echo $user_name;?>!</p>
                    
                    <div id='cssmenu'>
                    <ul>
                        <li><a href="<?php echo base_url('events')?>">Events</a></li>
                        <li><a href="<?php echo base_url('events/participatingevents')?>">Participating</a></li>
                        <li><a href="<?php echo base_url('events/myevents')?>">My events</a></li>
                        <li><a href="<?php echo base_url('events/createevent')?>">Create event</a></li>
                        <li><a href="<?php echo base_url('settings')?>">Settings</a></li>
                    </ul>
                    </div>
                </div>
                <div style="height: 100%;width: 70%; display: table-cell;border-right:20px solid rgb(0,112,192); border-left: 20px solid rgb(0,112,192); padding: 10px;">
