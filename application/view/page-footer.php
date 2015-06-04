
                </div>

                <div style="width: 20%;display: table-cell;">
                    <h3>Notifications</h3>

                    <?php
                    $desc='';
                    foreach($data['notifications'] as $notif)
                    {
                        if(strlen($notif->text())>50)
                            $desc=substr($notif->text(), 0, 50).'...';
                        else
                            $desc=$notif->text();

                        echo '<div class="notification_box"><h3>'.$notif->title().'</h3>'.$desc.'</div>';
                    }

                    ?>

                </div>
            </div>
        </div>
    </div>

    <div style="width:100%; text-align: center; height: 100%; background-color: #8FB3E3;">
        <span style="  ">
            Copyright © 2015 <a href="http://zarubond.com/">Ondřej Záruba</a>, Thijs Groot Zevert, Dong Hyun Kang, Paul Menning, Christopher Eck
        </span>
    </div>
</body>
</html> 
