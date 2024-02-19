<?php
include_once "sessao.php";
include_once "conexao.php";
$db = new Conexao();

$token = $_GET['token'];
$email = $_GET['email'];
$sql = "SELECT * FROM users WHERE email = :email AND token = :token";
$parametros = [
    ':email' => $email,
    ':token' => $token,
];
$result = $db->executar($sql, $parametros, true);
if (empty($result->fetch())) {
    logout();
    header("Location: ../index.php");
    exit();
} else {
    $sql = "UPDATE users SET confirmed = :confirmed WHERE email = :email";
    $parametros = [
        ':confirmed' => 1,
        ':email' => $email,
    ];
    $result = $db->executar($sql, $parametros);
    if (empty($result->fetch())) {
        logout();
        header("Location: ../index.php");
        exit();
    } else {
        redirectByPermission($_SESSION[SESSION_USER_IDPERMISSION]);
    }
}

// Agora você pode usar $token e $email conforme necessário
