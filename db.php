<?php
class db {
    function __construct($dbparams) {
        $dbcon = new mysqli($dbparams["host"], $dbparams["user"], $dbparams["password"], $dbparams["database"]);
        $dbcon->set_charset("utf8");
        $this->dbcon = $dbcon;
    }

    function getDB() {
        return $this->dbcon;
    }
}
?>