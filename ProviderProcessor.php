<?php
abstract class ProviderProcessor {
    function __construct ($logger, $salt) {
        $this->logger = $logger;
        $this->salt = $salt;
    }
    function normalizeFormat($params) {
        $result = $this->formatter($params);
        $this->logger->log('конвертировали '.json_encode($params).' в '.json_encode($result));
        return $result;
    }
    function checkParams($params) {
        $result = ($params['md5'] == md5($params['userid'].$params['amount'].$this->salt));
        $particle = $result ? '' : 'не';
        $message = "Проверили контрольную сумму с параметрами ".json_encode($params)."Контрольная сумма ".$particle." сошлась";
        $this->logger->log($message);
        return $result;
    }
    abstract function formatOutput($isTransactionSuccessful);
    abstract function formatter($params);
}


?>