<?php
include('db.php');

$pesquisa = '';

if (isset($_GET['busca'])) {
    $pesquisa = $mysqli->real_escape_string($_GET['busca']);

    // Consulta para buscar os processos filtrados pelo número do processo
    $sql_code = "SELECT 
                        REQUERENTE_NUM, 
                        MIN(NUM_PROC_DIG) AS NUM_PROC_DIG, 
                        MAX(NOME_COMPLETO) AS NOME_COMPLETO, 
                        MAX(CPF) AS CPF, 
                        MAX(REG) AS REG, 
                        MAX(PROCESS_ADM) AS PROCESS_ADM, 
                        MAX(CITACAO) AS CITACAO, 
                        MAX(REQUERENTE_CALCULO_IR) AS REQUERENTE_CALCULO_IR, 
                        MAX(REQUERENTE_DATA_ATUALIZACAO) AS REQUERENTE_DATA_ATUALIZACAO, 
                        MAX(REQUERENTE_VALOR_PRINCIPAL) AS REQUERENTE_VALOR_PRINCIPAL, 
                        MAX(REQUERENTE_VALOR_ATUALIZADO) AS REQUERENTE_VALOR_ATUALIZADO, 
                        MAX(REQUERENTE_JUROS_MORATORIOS) AS REQUERENTE_JUROS_MORATORIOS, 
                        MAX(REQUERENTE_CUSTAS) AS REQUERENTE_CUSTAS, 
                        MAX(REQUERENTE_HONORARIOS) AS REQUERENTE_HONORARIOS, 
                        MAX(REQUERENTE_HONORARIOS_PERCENTUAL) AS REQUERENTE_HONORARIOS_PERCENTUAL, 
                        MAX(CAPEP) AS CAPEP, 
                        MAX(IPREV) AS IPREV, 
                        MAX(RESPONSAVEL_NOME) AS RESPONSAVEL_NOME, 
                        MAX(RESPONSAVEL_CARGO) AS RESPONSAVEL_CARGO, 
                        MAX(RESPONSAVEL_DATA) AS RESPONSAVEL_DATA, 
                        MAX(RESPONSAVEL_CONCLUSOES) AS RESPONSAVEL_CONCLUSOES
                FROM PROCESSUAIS
                WHERE NUM_PROC_DIG = '$pesquisa'
                GROUP BY REQUERENTE_NUM";
    
    // Executa a consulta
    $sql_query = $mysqli->query($sql_code) or die("Erro ao consultar! " . $mysqli->error);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/estiloheader.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Iprev Santos</title>
    <link rel="icon" href="img/icone_aba.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<header>
    <img src="img/iprevsantos.png" class="rounded mx-auto d-block" alt="imagem do logo da empresa com a descrição iprev santos em duas cores (preto e dourado)">
    <h5 id="tituloPrincipal">INSTITUTO DE PREVIDÊNCIA SOCIAL DOS SERVIDORES PÚBLICOS MUNICIPAIS DE SANTOS</h5>
</header>

<h5>Lista de Processos</h5>
<form action="" method="GET">
    <input name="busca" placeholder=" Digite o processo" type="text">
    <button type="submit">Pesquisar</button>
</form>
<br>
<table width="100%" border="1">
    <tr>
        <th style="border: 1px solid black; padding: 10px;">N° AUTOS</th>     
        <th style="border: 1px solid black; padding: 10px;">Requerente</th>
        <th style="border: 1px solid black; padding: 10px;">CPF</th>
        <th style="border: 1px solid black; padding: 10px;">Reg</th>
        <th style="border: 1px solid black; padding: 10px;">Proc. adm.</th>
        <th style="border: 1px solid black; padding: 10px;">Citação</th>
    </tr>
    <?php
    // Exibindo os resultados da consulta
    if (isset($sql_query)) {
        while ($row = $sql_query->fetch_assoc()) {
            echo "<tr>";
            echo "<td style='border: 1px solid black; padding: 10px;'>{$row['NUM_PROC_DIG']}</td>";
            echo "<td style='border: 1px solid black; padding: 10px;'>{$row['NOME_COMPLETO']}</td>";
            echo "<td style='border: 1px solid black; padding: 10px;'>{$row['CPF']}</td>";
            echo "<td style='border: 1px solid black; padding: 10px;'>{$row['REG']}</td>";
            echo "<td style='border: 1px solid black; padding: 10px;'>{$row['PROCESS_ADM']}</td>";
            echo "<td style='border: 1px solid black; padding: 10px;'>{$row['CITACAO']}</td>";
            echo "</tr>";
        }
    } else {
        // Se não houver resultados
        echo "<tr><td colspan='6' style='border: 1px solid black; padding: 10px;'>Nenhum resultado encontrado.</td></tr>";
    }
    ?>
</table>

<section id="CadastrarProcesso">
    <a href="progresso.php" id="NovoCadastro"><h6>Clique aqui para iniciar um novo cadastro</h6></a>
</section>

<hr class="Divisoria"></hr>

<footer id="Rodape">
    <p>Versão do Sistema: 1.0 | 29/03/2024</p>
    <p>&copy; 2024 - todos os direitos reservados</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdsl
