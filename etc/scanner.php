<?php


function walker($folder)
{
    //echo "\n\n".$folder."\n";
    $files = scandir($folder);
    
    foreach($files as $file)
    {
        if($file!='.' && $file!='..')
        {
            $path=$folder.'/'.$file;
            if(is_dir($path))
            {
                if($file!='3rd' && $file!='.git' && $file!='etc')
                    walker($path);
            }
            else
            {
                if(strstr($file, '.', false)!='.jpg')
                {
                    echo "\n\n".$path."\n\n";
                    //echo strstr($file, '.', false);
                    $txt=file_get_contents($path);
                    echo $txt;
                }
            }
        }
    }
}

walker('.');

?>
