<?php
include('conecxão.php');
if(isset($_POST['email'])|| isset($_POST['senha'])){
   

 if(strlen($_POST['email'])==0){
    echo"preencha seu email";
}else if(strlen($_POST['senha'])==0) {
 echo"preencha sua senha";
}else{
    $email= $mysqli->real_escape_string($_POST['email']);
    $senha = $mysqli->real_escape_string($_POST['senha']);
    $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $sql_query = $mysqli->query($sql_code) or die("falha na execução do código SQL:" . $mysqli->error);
    $quantidade = $sql_query->mum_rows; 
    if($quantidade ==1){
$usuario = $sql_query->fetch_assoc();
if(!isset($_SESSION)) {
    session_start();
}
$_SESSION['id'] = $usuario['id'];
$_SESSION['nome'] = $usuario['nome'];
header("Location:http://localhost/nutribem/painel.php");
    }else{
        echo"falha ao logar! email ou senha incorretos";
    }
    }

}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tela de login</title>
</head>
<body>
    <h1>acesse sua conta</h1>
    <form action="" method="POST">
<p>
<label >email</label>
<input type="text" name="EMAIL">

</p>
<p>
<label >senha</label>
<input type="text" name="SENHA">
</p>
<p>
    <button type="submit" >entrar </button>
</p>



    </form>
</body>
</html>