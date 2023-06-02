<?php

include("./Model/Projetos.php");
include("./Model/Colaborador.php");

$projeto = new Projetos();
$colaborador = new Colaborador();

?>
<div>
<h2>Gestão de Projetos</h2>
<a href="index.php?pagina=projetos.php&acao=listar"><button class="button button1">Projetos em Aberto</button></a>
<a href="index.php?pagina=projetos.php&acao=inserir"><button class="button button2">Adicionar Projeto</button></a>

</div>
<?php
if(isset($_GET["mensagem"]) && !empty($_GET["mensagem"])){
    $mensagem = $_GET["mensagem"];

    if($mensagem=="sucesso"){
    ?>
        <div class="alert success">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        Operação realizada com sucesso!!!.
        </div>
    <?php
    }else{
        ?>
        <div class="alert warning">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        Ocorreu um erro na operação com o colaborador, reveja os dados e tente novamente mais tarde. Obrigado!
        </div>
        <?php
    }
}

if(isset($_GET["acao"]) && !empty($_GET["acao"])){

    $acao = $_GET["acao"];

    if($acao=="listar"){
        $resultado = $projeto->listar();
        if (count($resultado)) {
        ?>
            <table id="customers">
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>GERENTE</th>
                    <th>INICIO</th>
                    <th>AÇÃO</th>
                </tr>
            <?php  
                $i=1;
                foreach($resultado as $row) {
                    $id = $row["id"];

                    $resultadoColaborador = $colaborador->carregarColaborador($row["responsavel"]);
                    foreach($resultadoColaborador as $rowColaborador)
                ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?=$row["nome"]?></td>
                    <td><?=$rowColaborador["nome"]?></td>
                    <td><?php
                        $data = new DateTime($row["dataInicio"]);
                        echo $data->format('d/m/Y');
                    ?></td>
                    <td>
                    <a href="index.php?pagina=projetos.php&acao=visualizar&id=<?=$id?>"><button class="button button4">Visualizar</button></a>
                    <a href="index.php?pagina=projetos.php&acao=alterar&id=<?=$id?>"><button class="button button2">Alterar</button></a>
                    <a href="index.php?pagina=controlerprojetos.php&acao=excluir&id=<?=$id?>"><button class="button button3">Excluir</button></a>
                </td>

                </tr>        
                <?php  
                }
                ?>
            </table>
                <?php
            } else {
                echo "Nenhum resultado retornado.";
            }
    }elseif($acao=="inserir"){
    ?>
    <h2>Adicionar novo Projeto</h2>

    <div class="boxForm">
    <form action="controlerProjetos.php" method="post">
        <label for="nome">Nome</label>
        <input type="text" id="nome" name="nome" placeholder="Informe o seu nome">

        <label for="descrição">Descrição</label>
        <textarea id="descricao" name="descricao" placeholder="Informe o seu descrição sem pontos e traços."></textarea>

        <label for="cargo">Cargo</label>
        <select id="cargo" name="cargo">
        <?php
            $colaboradorGerente = $colaborador->carregarColaboradorGerente();
            foreach($colaboradorGerente as $rowColaborador){
            ?>
                <option value=<?=$rowColaborador['id']?>><?=$rowColaborador['nome']?></option>
            <?php
            }
        ?>
        </select>
        <label for="dataInicio">Data de Início</label>
        <input type="date" id="dataInicio" name="dataInicio">

        <input type="hidden" name="acao" value="inserir">
        <input type="hidden" name="status" value="1">
        <input type="submit" value="Adicionar">
    </form>
    </div>

    <?php
    }elseif($acao=="alterar"){
        if(isset($_GET["id"]) && !empty($_GET["id"])){
            $id = $_GET["id"];
            $row = $colaborador->carregarColaborador($id);
            var_dump($row);
            foreach($row as $dado)
        ?>
            <h2>Alterar Colaborador</h2>

            <div class="boxForm">
            <form action="controlerColaborador.php" method="post">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" value="<?=$dado['nome'];?>">

                <label for="cpf">CPF</label>
                <input type="text" id="cpf" name="cpf" value="<?=$dado['cpf'];?>">

                <label for="cargo">Cargo</label>
                <select id="cargo" name="cargo">
                <option value="Gerente" <?php if($dado['cargo'] == "Gerente") echo "selected"?>>Gerente</option>
                <option value="Desenvolvedor" <?php if($dado['cargo'] == "Desenvolvedor") echo "selected"?>>Desenvolvedor</option>
                </select>
                <input type="hidden" name = "id" value ="<?=$id?>">
                <input type="hidden" name = "acao" value ="editar">
                <input type="submit" value="Atualizar">
            </form>
            </div>
    <?php
        }else{
            header("Location: ./index.php?pagina=colaborador.php&acao=listar&mensagem=erro");
        }
    }elseif($acao=="visualizar"){
        if(isset($_GET["id"]) && !empty($_GET["id"])){
            $id = $_GET["id"];
            $row = $colaborador->carregarColaborador($id);
            //var_dump($row);
            foreach($row as $dado){
                echo "id" . $dado["id"];
            }
        }

    }
}

?>