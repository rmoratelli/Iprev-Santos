<?php
// Verifica se a variável $_POST está definida e não está vazia
if (isset($_POST) && !empty($_POST)) {
    // Coleta dos dados do formulário
    $numero_processo_digital = isset($_POST['NUMERO_PROCESSO_DIGITAL']) ? $_POST['NUMERO_PROCESSO_DIGITAL'] : '';
    $nome_requerente = isset($_POST['NOME_REQUERENTE']) ? $_POST['NOME_REQUERENTE'] : '';
    $cpf_requerente = isset($_POST['CPF_REQUERENTE']) ? $_POST['CPF_REQUERENTE'] : '';
    $reg_requerente = isset($_POST['REG_REQUERENTE']) ? $_POST['REG_REQUERENTE'] : '';
    $processo_administrativo = isset($_POST['PROCESSO_ADMINISTRATIVO']) ? $_POST['PROCESSO_ADMINISTRATIVO'] : '';
    $citacao_requerente = isset($_POST['CITACAO_REQUERENTE']) ? $_POST['CITACAO_REQUERENTE'] : '';
    $calculo_ir = isset($_POST['CALCULO_IR']) ? $_POST['CALCULO_IR'] : '';
    $data_atualizacao = isset($_POST['DATA_ATUALIZACAO']) ? $_POST['DATA_ATUALIZACAO'] : '';
    $valor_principal = isset($_POST['VALOR_PRINCIPAL']) ? $_POST['VALOR_PRINCIPAL'] : '';
    $valor_atualizado = isset($_POST['VALOR_ATUALIZADO']) ? $_POST['VALOR_ATUALIZADO'] : '';
    $juros_moratorios = isset($_POST['JUROS_MORATORIOS']) ? $_POST['JUROS_MORATORIOS'] : '';
    $custas = isset($_POST['CUSTAS']) ? $_POST['CUSTAS'] : '';
    $honorarios = isset($_POST['HONORARIOS']) ? $_POST['HONORARIOS'] : '';
    $honorarios_percentual = isset($_POST['HONORARIOS_PERCENTUAL']) ? $_POST['HONORARIOS_PERCENTUAL'] : '';
    $capep_valor = isset($_POST['CAPEP_VALOR']) ? $_POST['CAPEP_VALOR'] : '';
    $iprev_valor = isset($_POST['IPREV_VALOR']) ? $_POST['IPREV_VALOR'] : '';
    $nome_responsavel = isset($_POST['NOME_RESPONSAVEL']) ? $_POST['NOME_RESPONSAVEL'] : '';
    $cargo_responsavel = isset($_POST['CARGO_RESPONSAVEL']) ? $_POST['CARGO_RESPONSAVEL'] : '';
    $data_responsavel = isset($_POST['DATA_RESPONSAVEL']) ? $_POST['DATA_RESPONSAVEL'] : '';
    $conclusoes = isset($_POST['CONCLUSOES']) ? $_POST['CONCLUSOES'] : '';

    // Conexão com o banco de dados
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $db = "processos_judiciais";

    $conn = new mysqli($servidor, $usuario, $senha, $db);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Preparação e execução da consulta SQL para inserção
    $sql_code = "INSERT INTO cadastro_cliente (NUMERO_PROCESSO_DIGITAL, NOME_REQUERENTE, CPF_REQUERENTE, REG_REQUERENTE, PROCESSO_ADMINISTRATIVO, CITACAO_REQUERENTE, CALCULO_IR, DATA_ATUALIZACAO, VALOR_PRINCIPAL, VALOR_ATUALIZADO, JUROS_MORATORIOS, CUSTAS, HONORARIOS, HONORARIOS_PERCENTUAL, CAPEP_VALOR, IPREV_VALOR, NOME_RESPONSAVEL, CARGO_RESPONSAVEL, DATA_RESPONSAVEL, CONCLUSOES) VALUES ('$numero_processo_digital', '$nome_requerente', '$cpf_requerente', '$reg_requerente', '$processo_administrativo', '$citacao_requerente', '$calculo_ir', '$data_atualizacao', '$valor_principal', '$valor_atualizado', '$juros_moratorios', '$custas', '$honorarios', '$honorarios_percentual', '$capep_valor', '$iprev_valor', '$nome_responsavel', '$cargo_responsavel', '$data_responsavel', '$conclusoes')";
    if ($conn->query($sql_code) === TRUE) {
        echo "Informações cadastradas com sucesso!";
    } else {
        echo "Erro ao cadastrar informações: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Nenhum dado enviado pelo formulário.";
}
?>
