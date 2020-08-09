<?php

Class Sql extends PDO {

    private $conn;

    public function __construct(){
        $this->conn = new PDO("mysql:host=127.0.0.1;dbname=dbphp7","root", "");
    }

    //faz o for each pra retornnar o dado de cada linha
    private function setParams($stmt, $parameters = array()) {
        foreach ($parameters as $key => $value) {

            $this->setParam($stmt,$key, $value);

        }
    }

    //faz o bind value para pegar o valor de caga parametro
    private function setParam($stmt, $key, $value){
        $stmt->bindParam($key, $value);
    }

    //executa a query
    public function query($rawQuery, $params = array()) {

        $stmt = $this->conn->prepare($rawQuery);
        $this->setParams($stmt, $params);
        $stmt->execute();
        return $stmt;

    }

    //funcao select
    public function select($rawQuery, $params = array()){
        $stmt = $this->query($rawQuery, $params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } 

}

?>