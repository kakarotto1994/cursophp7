<?php

require_once("config.php");

$user = new Usuario();
$user->getById(13);
echo $user;