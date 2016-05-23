<?php
class TransactonPaginator {
    function __construct($name, $db){
        $this->db = $db;
        $this->name = $name;
    }
    function print(){
    	echo "транзакции пользователя $name";
    	$result=$this->db->query("SELECT * FROM user_transaction order by id WHERE name=$name");
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