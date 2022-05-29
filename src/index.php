<?php

	if (isset($_POST['submit'])) 
    {
        include('config.php');

        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $cpf = $_POST['cpf']; 
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        
        $result = mysqli_query($con, "INSERT INTO contatos(nome, sobreNome, cpf, email, telefone) VALUES ('$nome', '$sobrenome', '$cpf', '$email', '$telefone')");
        header('Location: ', './');
	}
?>

<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Cadastro | Projeto</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	</head>
	<body>
		<div class="box">
			<form id="form" action="#" method="POST" onsubmit="return validarFormulario()">
				<fieldset>
					<legend class="titulocadastro"><h1>Cadastro de Contatos</h1></legend>
					<br>
                    <div class="row inputBox m-3">
                        <div class="col-md-4">
                        <label for="nome" class="form-label">Nome</label>
                            <input type="text" id="nome" name="nome" class="input-padrao form-control" aria-label="Nome" required>
                        </div>
                        <div class="col-md-4">
                            <label for="sobrenome" class="form-label">Sobrenome</label>
                            <input type="text" id="sobrenome" name="sobrenome" class="input-padrao form-control" aria-label="Sobrenome" required>
                        </div>
                        <div class="inputBox col-md-4">
                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="tel" id="telefone" name="telefone" class="input-padrao form-control" aria-label="Telefone" required>
					    </div>
                    </div>
                    <div class="row inputBox m-3">
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <input type="email" class="form-control input-padrao" id="inputEmail4 email" name="email">
                        </div>
                        <div class="col-md-6">
                            <label for="inputCpf" class="form-label">CPF</label>
                            <input type="text" id="cpf" name="cpf" class="input-padrao form-control" id="inputCpf cpf" placeholder="XXX.XXX.XXX-XX" max="15" aria-label="CPF" required>
                        </div>
                    </div>
					<br>
                    <div class="position-relative">
					    <button type="submit" name="submit" id="submit" class="submit position-absolute top-50 start-50 translate-middle p-2 fs-3 m-3" onclick='javascript: validarFormulario()'>Cadastrar</button>
                    </div>
				</fieldset>
			</form>
		</div>
        <br> <br> <br>
        <legend><h1>Lista de Contatos</h1></legend>
        <div class="listadecontatos">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Sobrenome</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">E-Mail</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Ações:</th>
                    </tr>
                </thead>
                <?php 
                    $connect=mysqli_connect('mysql_db','root','root','formulario-projeto');
                    // Check connection
                    if (mysqli_connect_errno())
                    {
                    echo "Falha ao conectar ao banco de dados MySQL: " . mysqli_connect_error();
                    }

                    $result = mysqli_query($connect,"SELECT * FROM contatos");
                
                    while($dado = mysqli_fetch_array($result)){ ?>
                <tbody>
                    <tr>
                        <td><?php echo $dado['id']; ?></td>
                        <td><?php echo $dado['nome']; ?></td>
                        <td><?php echo $dado['sobrenome']; ?></td>
                        <td><?php echo $dado['telefone']; ?></td>
                        <td><?php echo $dado['email']; ?></td>
                        <td><?php echo $dado['cpf']; ?></td>
                        <td>
                            <a href="editar.php?codigo=<?php echo $dado['id']; ?>">Editar</a>
                            <a href="excluir.php?codigo=<?php echo $dado['id']; ?>">Excluir</a>
                        </td>
                    </tr>
                </tbody>
                <?php } ?>
            </table>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
        <script>

            let $seuCampoCpf = $("#cpf");
            $seuCampoCpf.mask('000.000.000-00');

            function validarFormulario() {
                let form = document.getElementById('form');
                let cpf = form.cpf.value.replace(/[.-]/g, '');
                if (cpf!='') 
                {
                    if (!verificarCPF(cpf)) {
                        document.getElementById('cpferror').innerHTML = "CPF Inválido!";
                        return false;
                    }
                }
                form.submit();
        
            }

            function verificarCPF(strCpf) {
                if (!/[0-9]{11}/.test(strCpf)) return false;
                if (strCpf === "00000000000") return false;

                var soma = 0;

                for (var i = 1; i <= 9; i++) {
                    soma += parseInt(strCpf.substring(i - 1, i)) * (11 - i);
                }

                var resto = soma % 11;

                if (resto === 10 || resto === 11 || resto < 2) {
                    resto = 0;
                } else {
                    resto = 11 - resto;
                }

                if (resto !== parseInt(strCpf.substring(9, 10))) {
                    return false;
                }

                soma = 0;

                for (var i = 1; i <= 10; i++) {
                    soma += parseInt(strCpf.substring(i - 1, i)) * (12 - i);
                }
                resto = soma % 11;

                if (resto === 10 || resto === 11 || resto < 2) {
                    resto = 0;
                } else {
                    resto = 11 - resto;
                }
            
                if (resto !== parseInt(strCpf.substring(10, 11))) {
                    return false;
                }

                return true;
            }
        </script>    
    </body>
</html>