<?php
class Logger{
    function log($message){
        file_put_contents('./log.log', $message);
    }
}
?>