<?php
class Provider1Processor extends ProviderProcessor {
    function formatter($params) {
        $result = array('userid' => $params['a'],
                        'amount' => $params['b'],
                        'md5'   => $params['md5']);
        return $result;
    }

    function formatOutput($isTransactionSuccessful) {
        if ($isTransactionSuccessful) $answer = 1; else $answer = 0;
        return '<answer>'.$answer.'</answer>';
    }
}
?>