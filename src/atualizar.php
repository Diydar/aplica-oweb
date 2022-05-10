<?php
require_once('config.php')
?>

<?php

$id=$_POST['id'];
$nome=$_POST['nome'];
$sobrenome=$_POST['sobrenome'];
$telefone=$_POST['telefone'];
$email=$_POST['email'];
$cpf=$_POST['cpf'];

$atualizar=mysqli_query($con,"UPDATE contatos set nome='$nome', sobrenome='$sobrenome', telefone='$telefone', email='$email', cpf='$cpf' Where id='$id'");
if($atualizar=true){
    echo "<script>
    alert('Contato atualizado com sucesso!');
    window.location.href='index.php'
    </script> ";
} else {
    echo "<script>
    alert('Ocorreu alguma falha na atualização, entrar em contato com o Administrador!');
    window.location.href='index.php'
    </script> ";
}
?>