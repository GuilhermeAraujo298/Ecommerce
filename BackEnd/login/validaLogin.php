<?php
include_once "../conexao.php";
$db = new Conexao();
$email = $_POST['email'];
$senha = $_POST['senha'];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../../Cliente/homeCliente.php?invalidLogin");
    exit();
}
if ($senha == "") {
    header("Location: ../../Cliente/homeCliente.php?invalidLogin");
    exit();
}

//Validar com o banco

if ($db->errorCode != 0) {
    //Houve um erro de conexão
    header("Location: ../../Cliente/homeCliente.php?ERROR=1");
    exit();
}

//Buscar usuário
/*$result = $db->executar("SELECT ra from usuarios;");
    $userValid = false;
    foreach($result as $c){
        //Valida usuário
        if($c[0] == $ra_id){
            $userValid = true;
            break;
        }
    }*/
$sql = "SELECT email FROM view_client_user_combined WHERE email = :email";
$parametros = [
    ':email' => $email,
];
$result = $db->executar($sql, $parametros, true);
$userValid = $result->rowCount();
if (!$userValid) {
    header("Location: ../../Cliente/homeCliente.php?invalidLogin");
    exit();
}

//Valida senha
$sql = "SELECT passwordUser FROM view_client_user_combined WHERE email = :email UNION ALL SELECT passwordUser FROM clients WHERE email = :email";
$parametros = [
    ':email' => $email,
];
$result = $db->executar($sql, $parametros);
//if(!password_verify($password, $result[0]['senha']) && $result[0][0] != $password){ // IMPORTANTE -> A segunda parte do '&&' (E) deve ser removida após a padronização da criptografia!
if (!password_verify($senha, $result[0]['passwordUser'])) {
    header("Location: ../../Cliente/homeCliente.php?invalidLogin");
    exit();
}

//Concluir login na sessão e Indentificar tipo de usuário
include_once "../sessao.php";
$_SESSION[SESSION_USER_EMAIL] = $email;

$sql = "SELECT CONCAT(first_name, ' ', last_name) AS nome FROM view_client_user_combined WHERE email = :email";
$parametros = [
    ':email' => $email,
];
$result = $db->executar($sql, $parametros);
$_SESSION[SESSION_USERNAME] = $result[0][0];

$sql = "SELECT id FROM view_client_user_combined WHERE email = :email";
$parametros = [
    ':email' => $email,
];
$result = $db->executar($sql, $parametros);
$_SESSION[SESSION_USER_ID] = $result[0][0];
// $result = $db->executar("SELECT tipo FROM view_client_user_combined WHERE ra = $ra_id", true);
// $permisson = 0;
// if ($result[0][3] == 'client') {
//     $permisson = PERMISSION_CLIENTE;
// } 
// if ($result[0][3] == 'employee'){
//     $permisson = PERMISSION_FUNCIONARIO;
// }
// $_SESSION[SESSION_USER_IDPERMISSION] = $permisson;

$sql = "SELECT tipo FROM view_client_user_combined WHERE email = :email";
$parametros = [
    ':email' => $email,
];
$result = $db->executar($sql, $parametros, true);
$permisson = 0;
if ($result == 'client') {
    $permisson = PERMISSION_CLIENTE;
} else {
    $result = $result->fetchAll();
    $permisson = $result[0][0];
}
$_SESSION[SESSION_USER_IDPERMISSION] = $permisson;


//Redirecionar
redirectByPermission($permisson);