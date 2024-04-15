<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/progresso.css">
    <title>Iprev Santos</title>
    <link rel="icon" href = "img/icone_aba.png" type = "image/png">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
<a href="header.php"><button type="button" class="btn btn-outline-secondary ">Voltar</button></a>
    <img src="img/iprevsantos.png" class="rounded mx-auto d-block" alt="imagem do logo da empresa com a descrição iprev santos em duas cores (preto e dourado)">

<!--
<h6 id="versao">Versão 1.1 do sistema em construção</h6>

<div class="progress">
  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width: 5%"></div>
</div>
-->

<h6>Cadastro de Informações</h6><br>

<form action="processar_cadastro.php" method="post">

    <label for="NUMERO_PROCESSO_DIGITAL">Número do proceso digital:</label>
    <input type="text" id="NUMERO_PROCESSO_DIGITAL" name="NUMERO_PROCESSO_DIGITAL"><br>

    <label for="NOME_REQUERENTE">Nome requerente:</label>
    <input type="text" id="NOME_REQUERENTE" name="NOME_REQUERENTE"><br>

    <label for="CPF_REQUERENTE">CPF:</label>
    <input type="text" id="CPF_REQUERENTE" name="CPF_REQUERENTE"><br>

    <label for="REG_REQUERENTE">Reg requerente:</label>
    <input type="text" id="REG_REQUERENTE" name="REG_REQUERENTE"><br>

    <label for="PROCESSO_ADMINISTRATIVO">Processo Adm:</label>
    <input type="text" id="PROCESSO_ADMINISTRATIVO" name="PROCESSO_ADMINISTRATIVO"><br>

    <label for="CITACAO_REQUERENTE">Citação requerente:</label>
    <input type="text" id="CITACAO_REQUERENTE" name="CITACAO_REQUERENTE"><br>
    
    <label for="CALCULO_IR">Cálculo do IR:</label>
    <input type="text" id="CALCULO_IR" name="CALCULO_IR"><br>

    <label for="DATA_ATUALIZACAO">Data de Atualização:</label>
    <input type="text" id="DATA_ATUALIZACAO" name="DATA_ATUALIZACAO"><br>

    <label for="VALOR_PRINCIPAL">Valor Principal:</label>
    <input type="text" id="VALOR_PRINCIPAL" name="VALOR_PRINCIPAL"><br>

    <label for="VALOR_ATUALIZADO">Valor Atualizado:</label>
    <input type="text" id="VALOR_ATUALIZADO" name="VALOR_ATUALIZADO"><br>

    <label for="JUROS_MORATORIOS">Juros Moratórios:</label>
    <input type="text" id="JUROS_MORATORIOS" name="JUROS_MORATORIOS"><br>

    <label for="CUSTAS">Custas:</label>
    <input type="text" id="CUSTAS" name="CUSTAS"><br>

    <label for="HONORARIOS">Honorários:</label>
    <input type="text" id="HONORARIOS" name="HONORARIOS"><br>

    <label for="HONORARIOS_PERCENTUAL">Percentual de Honorários:</label>
    <input type="text" id="HONORARIOS_PERCENTUAL" name="HONORARIOS_PERCENTUAL"><br>

    <label for="CAPEP_VALOR">CAPEP:</label>
    <input type="text" id="CAPEP_VALOR" name="CAPEP_VALOR"><br>

    <label for="IPREV_VALOR">IPREV:</label>
    <input type="text" id="IPREV_VALOR" name="IPREV_VALOR"><br>

    <label for="NOME_RESPONSAVEL">Nome do Responsável:</label>
    <input type="text" id="NOME_RESPONSAVEL" name="NOME_RESPONSAVEL"><br>

    <label for="CARGO_RESPONSAVEL">Cargo do Responsável:</label>
    <input type="text" id="CARGO_RESPONSAVEL" name="CARGO_RESPONSAVEL"><br>

    <label for="DATA_RESPONSAVEL">Data do Responsável:</label>
    <input type="text" id="DATA_RESPONSAVEL" name="DATA_RESPONSAVEL"><br>

    <label for="CONCLUSOES">Conclusões do Responsável:</label>
    <input type="text" id="CONCLUSOES" name="CONCLUSOES"><br>

    <input type="submit" value="Enviar"><br><br><br>
</form>
<hr>
 <!-- Formulário de pesquisa -->
 <h6>Pesquisar por Número do Processo Digital</h6>
    <form action="" method="post">
        <label for="pesquisar_processo">Número do processo digital:</label>
        <input type="text" id="pesquisar_processo" name="pesquisar_processo">
        <button type="submit" name="pesquisar" class="btn btn-primary">Pesquisar</button>
    </form>

    <!-- Exibição dos resultados da pesquisa -->
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['pesquisar_processo'])) {
            $pesquisar_processo = $_POST['pesquisar_processo'];

            // Realizar a consulta no banco de dados com base no número do processo digital
            $servidor = "localhost";
            $usuario = "root";
            $senha = "";
            $db = "processos_judiciais";

            $conn = new mysqli($servidor, $usuario, $senha, $db);

            if ($conn->connect_error) {
                die("Conexão falhou: " . $conn->connect_error);
            }

            $sql_code = "SELECT * FROM cadastro_cliente WHERE NUMERO_PROCESSO_DIGITAL = '$pesquisar_processo'";
            $resultado_pesquisa = $conn->query($sql_code);

            if ($resultado_pesquisa->num_rows > 0) {
                echo "<h2>Resultados da Pesquisa</h2>";
                echo "<table class='table'>";
                echo "<tr><th>Número do Processo Digital</th><th>Nome do Requerente</th><th>CPF do Requerente</th><th>Reg Requerente</th><th>Processo Administrativo</th><th>Citação Requerente</th><th>Cálculo do IR</th><th>Data de Atualização</th><th>Valor Principal</th><th>Valor Atualizado</th><th>Juros Moratórios</th><th>Custas</th><th>Honorários</th><th>Percentual de Honorários</th><th>CAPEP</th><th>IPREV</th><th>Nome do Responsável</th><th>Cargo do Responsável</th><th>Data do Responsável</th><th>Conclusões do Responsável</th></tr>";
                while ($row = $resultado_pesquisa->fetch_assoc()) {
                    echo "<tr><td>" . $row["NUMERO_PROCESSO_DIGITAL"] . "</td><td>" . $row["NOME_REQUERENTE"] . "</td><td>" . $row["CPF_REQUERENTE"] . "</td><td>" . $row["REG_REQUERENTE"] . "</td><td>" . $row["PROCESSO_ADMINISTRATIVO"] . "</td><td>" . $row["CITACAO_REQUERENTE"] . "</td><td>" . $row["CALCULO_IR"] . "</td><td>" . $row["DATA_ATUALIZACAO"] . "</td><td>" . $row["VALOR_PRINCIPAL"] . "</td><td>" . $row["VALOR_ATUALIZADO"] . "</td><td>" . $row["JUROS_MORATORIOS"] . "</td><td>" . $row["CUSTAS"] . "</td><td>" . $row["HONORARIOS"] . "</td><td>" . $row["HONORARIOS_PERCENTUAL"] . "</td><td>" . $row["CAPEP_VALOR"] . "</td><td>" . $row["IPREV_VALOR"] . "</td><td>" . $row["NOME_RESPONSAVEL"] . "</td><td>" . $row["CARGO_RESPONSAVEL"] . "</td><td>" . $row["DATA_RESPONSAVEL"] . "</td><td>" . $row["CONCLUSOES"] . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "<p>Nenhum resultado encontrado.</p>";
            }

            $conn->close();
        }
    }
    ?>



<div id="conteudo">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>

