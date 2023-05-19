<?php
    include("functions.php");
    $conn = conectar();
    
    /*inserção de registro*/
    //Projetos
    $campos1 = "nome, descricao, responsavel, status, dataInicio, dataTermino";
    $campos2 = ":nome, :descricao, :responsavel, :status, :dataInicio, :dataTermino";
    $tabela = "projetos";
    $dados = array('nome'=>'Trocador de Óleo', 'descricao'=>'Trocador de Óleo', 'responsavel'=>'6', 'status'=>'1', 'dataInicio'=>'2023-05-19', 'dataTermino'=>'');
    //cadastro($conn, $tabela, $campos1, $campos2, $dados);

    /*Alteração de registro*/
    //Projetos
    $tabela = "projetos";
    $campos = "nome = :nome, descricao = :descricao, responsavel = :responsavel, status = :status, dataInicio = :dataInicio, dataTermino = :dataTermino";
    $dados = array('nome'=>'Trocador de Óleo', 'descricao'=>'Trocador de Óleo', 'responsavel'=>'6','status'=>'2', 'dataInicio'=>'2023-05-19', 'dataTermino'=>'2023-05-20','id'=>6);
    //atualizar($conn, $tabela, $campos, $dados);
    
    /*Deletar  registro*/
    //Projetos
    $id = 1;
    $tabela = "tarefas";
    //deletar($conn, $tabela, $id);

    
    /*listagem de registro*/
    echo "<br><b>Relatório Geral de colaboradores</b><br>";
    listarColaboradores($conn);
    
    echo "<br><b>Relatório com Colaborador especifico com o ID</b><br>";
    $id = 1;
    listarWhere($conn,$id);

    echo "<br><b>Relatório Geral de colaboradores de cargo Gerente ordenado em ordem crescente</b><br>";
    $cargo = "Gerente";
    listarGerente($conn,$cargo);

    echo "<br><b>Relatório Geral de Projetos</b><br>";
    listarProjetos($conn);

    echo "<br><b>Relatório Geral de Projetos com status Ativo ou Inativo</b><br>";
    $status = 2;
    listarProjetosStatus($conn,$status);

?>