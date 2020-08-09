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
//$logar = new Usuario();
//$logar->Login("Egnofar", "654321");
//echo $logar;

//inserir usuarios no banco
//$aluno = new Usuario("Wobbuf", "333");

//$aluno->setLogin("Wobbufet");
//$aluno->setSenha("1234");
//$aluno->insert();
//echo $aluno;

// Atualizar dados do usuario
/*
$usuario = new Usuario();

$usuario->getById(20); 

echo $usuario."<br>";

$usuario->update("jonas", "Baleia");

echo $usuario."<br>";
*/ 

//-------------
// Deletar usuario

$usuario = new Usuario();

$usuario->getById(4); 

echo $usuario."<br>";

$usuario->delete();


echo $usuario."<br>";