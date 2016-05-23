<?php
class Logger{
    function log($message){
        $message = "[" . date(DATE_RFC850) . "]: " . $message;
        file_put_contents('./log.log', $message);
    }
}
?>