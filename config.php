<?php

$authTableData = [
    'table' => 'users',
    'idfield' => 'login',
    'cfield' => 'mdp',
    'uidfield' => 'uid',
    'rfield' => 'role',
];

$pathFor = [
    "login"  => "login.php",
    "logout" => "logout.php",
    "adduser" => "adduser.php",
    "root"   => "session.php",
    "adduserform" =>"adduser_form.php",
];

const SKEY = '_Redirect';