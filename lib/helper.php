<?php
function base_url($path)
{
    return BASE_URL.'/'.$path;   
}

function system_url($path)
{
    return BASE_URL.'/admin/'.$path;
}
?>