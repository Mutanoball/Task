<?php
abstract class ProviderProcessor {
    function __construct ($logger, $salt) {
        $this->logger = $logger;
        $this->salt = $salt;
    }
    function normalizeFormat($params) {
        $result = $this->formatter($params);
        $this->logger->log('конвертировали $params в result');
        return $result;
    }
    function checkParams($params) {
        $result = ($params['md5'] == md5($params['userid'].$params['amount'].$this->salt));
        $this->logger->log('проверили контрольную сумму');
        return $result;
    }
    abstract function formatOutput($responseCode);
    abstract function formatter($params);
}
class Provider1Processor extends ProviderProcessor {
    function formatter($params) {
        $result = array('userid' => $params['a'],
                        'amount' => $params['b'],
                        'md5'   => $params['md5']);
        return $result;
    }

    function formatOutput($responseCode) {
        if ($responseCode) $answer = 1; else $answer = 0;
        return '<answer>'.$answer.'</answer>';
    }
}
class Provider2Processor extends ProviderProcessor {
    function formatter($params) {
        $result = array('userid' => $params['x'],
                        'amount' => $params['y'],
                        'md5'   => $params['md5']);
        return $result;
    }

    function formatOutput($responseCode) {
        if ($responseCode) $answer = 'OK'; else $answer = 'ERROR';
        return $answer;
    }
}
?>