<?php

class Usuario {
    private $id;
    private $login;
    private $senha;
    private $data_criacao;
//  geter e seter id
    public function getId(){
        return $this->id;
    }

    public function setId($a){
        $this->id = $a;
    }
//  geter e seter login
    public function getLogin(){
        return $this->login;
    }

    public function setLogin($a){
        $this->login = $a;
    }
//  geter e seter senha
    public function getSenha(){
        return $this->senha;
    }

    public function setSenha($a){
        $this->senha = $a;
    }
//  geter e seter datas
    public function getDataCriacao(){
        return $this->data_criacao;
    }

    public function setDataCriacao($a){
        $this->data_criacao = $a;
    }

    public function getById($id){
        $sql = new Sql();
        $result = $sql->select("select * from easy_usuarios where id = :ID", array(
            ":ID" =>$id
        ));
        if(count($result) > 0) {
            $row = $result[0];
            $this->setId($row["id"]);
            $this->setLogin($row["login"]);
            $this->setSenha($row["senha"]);
            $this->setDataCriacao(new DateTime($row["data_criacao"]));
        }
    }

    //lista todos na tabela usuarios
    public static function getList(){
        $sql = new Sql();
        return $sql->select("select * from easy_usuarios order by login;");
    }

    //busca pelo lotin
    public static function getByLogin($l){
        $sql = new Sql();
        return $sql->select("select * from easy_usuarios where login rlike :login;", array(
            ":login"=> $l
        ));
    }

    //Autentica usuario
    public function login($l, $p){
        $sql = new Sql();
        $result = $sql->select("select * from easy_usuarios where login = :login and senha = :pass", array(
            ":login" =>$l,
            ":pass"=>$p
        ));
        if(count($result) > 0) {
            $row = $result[0];
            
            $this->setId($row["id"]);
            $this->setLogin($row["login"]);
            $this->setSenha($row["senha"]);
            $this->setDataCriacao(new DateTime($row["data_criacao"]));
        }
        else {
            throw new Exception("usuario ou senha não encontrados");
        }
    }
    
    // convert para string 
    public function __toString(){
        return json_encode(array(
            "id"=>$this->getId(),
            "login"=>$this->getLogin(),
            "senha"=>$this->getSenha(),
            "data_criacao"=>$this->getDataCriacao()->Format("d/m/Y H:i:s")
        ));
    }

}