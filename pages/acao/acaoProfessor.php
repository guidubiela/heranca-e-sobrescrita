<?php
    $path = '../config.inc.php';
    if (file_exists($path))
      require($path);
    $path = '../../config.inc.php';
    if (file_exists($path))
      require($path); 

    $acao = "";
    switch($_SERVER['REQUEST_METHOD']) {
        case 'GET':  $acao = isset($_GET['acao']) ? $_GET['acao'] : ""; break;
        case 'POST': $acao = isset($_POST['acao']) ? $_POST['acao'] : ""; break;
    }

    switch ($acao) {
        case 'salvar':
            require_once "../../classes/professor.class.php";
                
            $form = form();
            $professor = new Professor($form["id"], $form["nome"], $form["rg"], $form["login"], $form["senha"], $form["materia"]);
            $professor->inserir();
            header("location:../index.php");
        break;
            
        case 'deletar':
            require_once "../../classes/professor.class.php";
                
            $id = isset($_GET["id"]) ? $_GET["id"] : "0";
            $form = form();
            $professor = new Professor($id, $form["nome"], $form["rg"], $form["login"], $form["senha"], $form["materia"]);
            $professor->excluir();
            header("location:../index.php");
        break;

        case 'editar':
            require_once "../../classes/professor.class.php";
            
            $form = form();
            $professor = new Professor($form["id"], $form["nome"], $form["rg"], $form["login"], $form["senha"], $form["materia"]);
            $professor->atualizar();
            header("location:../index.php");
        break;

    }

    function form(){
        $id = isset($_POST["id"]) ? $_POST["id"] : 0;
        $nome = isset($_POST["nome"]) ? $_POST["nome"] : "";
        $rg = isset($_POST["rg"]) ? $_POST["rg"] : "";
        $login = isset($_POST["login"]) ? $_POST["login"] : "";
        $senha = isset($_POST["senha"]) ? $_POST["senha"] : "";
        $materia = isset($_POST["materia"]) ? $_POST["materia"] : "";

        $form = array(
            "id" => $id,
            "nome" => "$nome",    
            "rg" => "$rg", 
            "login" => "$login", 
            "senha" => "$senha",
            "materia" => "$materia"
        );
        return $form;
    } 
?>