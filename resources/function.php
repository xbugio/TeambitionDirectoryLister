<?php
function humanSize($size)
{
    $exts = array('bytes', 'KB', 'MB', 'GB', 'TB');
    $ext_index = 0;
    $ext_len = count($exts);
    while($size > 1024)
    {
        if($ext_index+1 >= $ext_len) break;
        $size /= 1024;
        $ext_index++;
    }

    return round($size,2).' '.$exts[$ext_index];
}