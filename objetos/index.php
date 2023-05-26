<!DOCTYPE html>
<html lang="en">
<head>
<title>CSS Template</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
  font-family: Arial, Helvetica, sans-serif;
}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the top navigation bar */
.topnav {
  overflow: hidden;
  background-color: #333;
}

/* Style the topnav links */
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change color on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}


.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 8px 16px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid #4CAF50;
}

.button1:hover {
  background-color: #4CAF50;
  color: white;
}
.button2 {
  background-color: white; 
  color: black; 
  border: 2px solid #008CBA;
}

.button2:hover {
  background-color: #008CBA;
  color: white;
}

.button3 {
  background-color: white; 
  color: black; 
  border: 2px solid #f44336;
}

.button3:hover {
  background-color: #f44336;
  color: white;
}

.button4 {
  background-color: white;
  color: black;
  border: 2px solid #e7e7e7;
}

.button4:hover {background-color: #e7e7e7;}


/* Style the content */
.content {
  background-color: #ddd;
  padding: 10px;
  width: 90%;
  margin: auto;
  
}

/* Style the tabela customer */
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}




input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.boxForm {
    width: 400px;
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}


/* The alert message box */
.alert {
  padding: 20px;
  background-color: #f44336; /* Red */
  color: white;
  margin-bottom: 15px;
  opacity: 1;
  transition: opacity 0.6s; /* 600ms to fade out */
}

.alert.success {background-color: #04AA6D;}
.alert.info {background-color: #2196F3;}
.alert.warning {background-color: #ff9800;}

/* The close button */
.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

/* When moving the mouse over the close button */
.closebtn:hover {
  color: black;
}

/* Style the footer */
.footer {
  background-color: #f1f1f1;
  padding: 10px;
}

</style>
</head>
<body>

<div class="topnav">
  <a href="index.php?pagina=colaborador.php">Colaborador</a>
  <a href="#">Tarefas</a>
  <a href="#">Projetos</a>
</div>

<div class="content">
  <h2>CSS Template</h2>
  <p>A topnav, content and a footer.</p>
  <?php
    if(isset($_GET["pagina"]) && !empty($_GET["pagina"])){
        $pagina = $_GET["pagina"];
        include($pagina);
    }else{

    }
  ?>
</div>

<div class="footer">
  <p>Footer</p>
</div>

</body>
</html>




<?php
    exit;
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

<script>
// Get all elements with class="closebtn"
var close = document.getElementsByClassName("closebtn");
var i;

// Loop through all close buttons
for (i = 0; i < close.length; i++) {
  // When someone clicks on a close button
  close[i].onclick = function(){

    // Get the parent of <span class="closebtn"> (<div class="alert">)
    var div = this.parentElement;

    // Set the opacity of div to 0 (transparent)
    div.style.opacity = "0";

    // Hide the div after 600ms (the same amount of milliseconds it takes to fade out)
    setTimeout(function(){ div.style.display = "none"; }, 600);
  }
}
</script>