<?php
function base_url($path)
{
    return BASE_URL.'/'.$path;   
}

function system_url($path)
{
    return BASE_URL.'/'.$path;
}

function error403()
{
    echo '<h1>ERROR 403</h1>';
}

function error404()
{
    echo '<h1>ERROR 404</h1>';
}

?>