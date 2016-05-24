<?php
class Provider2Processor extends ProviderProcessor {
    function formatter($params) {
        $result = array('userid' => $params['x'],
                        'amount' => $params['y'],
                        'md5'   => $params['md5']);
        return $result;
    }

    function formatOutput($isTransactionSuccessful) {
        if ($isTransactionSuccessful) $answer = 'OK'; else $answer = 'ERROR';
        return $answer;
    }
}
?>