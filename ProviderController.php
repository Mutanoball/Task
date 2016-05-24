<?php
class ProviderController {
    function __construct ($processor, $db, $logger){
        $this->processor = $processor;
        $this->db = $db;
        $this->logger = $logger;
    }
    function process($params) {
        $params=$this->processor->normalizeFormat($params);
        $responseCode = $this->processor->checkParams($params) ? true : false;
        if ($responseCode) {
            $this->updateDB($params['userid'], $params['amount']);
        }
        return $this->processor->formatOutput($responseCode);
    }
    function updateDB($userId, $amount) {
        $this->db->query("UPDATE user SET balance = balance + $amount datetime = now() WHERE id = $userId");
        $this->db->query("INSERT INTO user_transation (user_id, amount) VALUES ($userId, $amount)");
        $this->logger->log('обновили баланс пользователя'.$userId);
    }
}
?>