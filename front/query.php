<?php
    //home
    $queryHome = "SELECT nome, id_empresa FROM empresa WHERE home = 1 and deletar = 0";
    $resultHome = $conn->query($queryHome);

    //departamento
    $queryDepart = "SELECT nome FROM departamento WHERE deletar = 0 ORDER BY nome ASC";
    $resultDepart = $conn->query($queryDepart);

    //empresa
    $queryEmpresa = "SELECT nome FROM empresa WHERE deletar = 0  ORDER BY nome ASC";
    $resultEmpresa = $conn->query($queryEmpresa);

    //tabela
    $queryTabela = "SELECT id_empresa, nome FROM empresa WHERE deletar = 0 AND id_empresa =";

    //refeição principal
    $queryRefeicaoPrincipal = "SELECT * FROM cardapio.reifeicao_principal WHERE  deletar = 0 AND filial = ";

    //refeição chef
    $queryRefeicaoChef = "SELECT * FROM cardapio.refeicao_chef WHERE deletar = 0 AND filial = ";
?>