<?php
require_once('config.php');

$id = $_GET['codigo'];
$consulta = mysqli_query($con, "SELECT * FROM contatos Where Id='$id'");
$resultado = mysqli_fetch_array($consulta);
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Cadastro | Projeto</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	</head>
    <body>
<form method="POST" action="atualizar.php">
                <fieldset>
                    <legend class="titulocadastro"><h1>Editar Registro do Contato!</h1></legend>
                        <br>
                        <div class="row inputBox m-3">
                            <input type="hidden" name="id" value="<?= $resultado[0]; ?>">
                            <div class="col-md-4">
                            <label for="nome" class="form-label">Nome</label>
                                <input type="text" id="nome" name="nome" value="<?= $resultado[1]; ?>" class="input-padrao form-control" aria-label="Nome" required>
                            </div>
                            <div class="col-md-4">
                                <label for="sobrenome" class="form-label">Sobrenome</label>
                                <input type="text" id="sobrenome" name="sobrenome" value="<?= $resultado[2]; ?>" class="input-padrao form-control" aria-label="Sobrenome" required>
                            </div>
                            <div class="inputBox col-md-4">
                                <label for="telefone" class="form-label">Telefone</label>
                                <input type="tel" id="telefone" name="telefone" value="<?= $resultado[5]; ?>" class="input-padrao form-control" aria-label="Telefone" required>
                            </div>
                        </div>
                        <div class="row inputBox m-3">
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">Email</label>
                                <input type="email" class="form-control input-padrao" id="inputEmail4 email" value="<?= $resultado[4]; ?>" name="email">
                            </div>
                            <div class="col-md-6">
                                <label for="inputCpf" class="form-label">CPF</label>
                                <input type="text" id="cpf" value="<?= $resultado[3]; ?>" name="cpf" class="input-padrao form-control" id="inputCpf cpf" placeholder="XXX.XXX.XXX-XX" max="15" aria-label="CPF" required>
                            </div>
                        </div>
                        <br>
                        <div class="position-relative">
                            <button type="submit" name="btnAtualizar" class="submit position-absolute top-50 start-50 translate-middle p-2 fs-3 m-3">Atualizar Dados</button>
                        </div>
				</fieldset>
            </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>


        </script>
    </body>
</html>