<?php
require_once('config.php')
?>

<?php 
$id=$_GET['codigo'];
$excluir=mysqli_query($con,"DELETE FROM contatos Where id='$id'");
if($excluir==true){
    echo "<script>
    alert('Contato excluido com sucesso!!');
    window.location.href='index.php'
    </script> ";
} else {
    echo "<script>
    alert('Ocorreu alguma falha na exclusão, entrar em contato com o Administrador!');
    window.location.href='index.php'
    </script> ";
}

?>
