<?php

require_once("config.php");

//Busca um usuario
//$user = new Usuario();
//$user->getById(13);
//echo $user;

//Busca todos os usuarios
//$lista = Usuario::getList();
//echo json_encode($lista);

//Busca pelo usuario

//$login = Usuario::getByLogin("Egn");
//echo json_encode($login);

//Logar no sistema
$logar = new Usuario();
$logar->Login("Egnofar", "654321");
echo $logar;