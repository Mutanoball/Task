<?php
class TransactonPaginator {
    function __construct($name, $db){
        $this->db = $db;
        $this->name = $name;
    }
    function printer(){
    	echo "транзакции пользователя $this->name";
    	$result=$this->db->query("SELECT * FROM user_transaction ORDER BY id WHERE name=$this->name");
    	$i=0;
    	while ($row = $result->fetch_assoc()) {
        	$i++;
        	$id     = $row['id'];
        	$name	= $row['name'];
        	$amount = $amount['amount'];
        	echo "Номер транзакции - ".$id."  Имя пользователя - ".$name."  Сумма зачисления - ".$amount;
    	}
    }
}
?>