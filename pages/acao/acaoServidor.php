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
            require_once "../../classes/servidor.class.php";
                
            $form = form();
            $servidor = new Servidor($form["id"], $form["nome"], $form["rg"], $form["login"], $form["senha"]);
            $servidor->inserir();
            header("location:../index.php");
        break;
            
        case 'deletar':
            require_once "../../classes/servidor.class.php";
                
            $id = isset($_GET["id"]) ? $_GET["id"] : "0";
            $form = form();
            $servidor = new Servidor($id, $form["nome"], $form["rg"], $form["login"], $form["senha"]);
            $servidor->excluir();
            header("location:../index.php");
        break;

        case 'editar':
            require_once "../../classes/servidor.class.php";
            
            $form = form();
            $servidor = new Servidor($form["id"], $form["nome"], $form["rg"], $form["login"], $form["senha"]);
            $servidor->atualizar();
            header("location:../index.php");
        break;

    }

    function form(){
        $id = isset($_POST["id"]) ? $_POST["id"] : 0;
        $nome = isset($_POST["nome"]) ? $_POST["nome"] : "";
        $rg = isset($_POST["rg"]) ? $_POST["rg"] : "";
        $login = isset($_POST["login"]) ? $_POST["login"] : "";
        $senha = isset($_POST["senha"]) ? $_POST["senha"] : "";

        $form = array(
            "id" => $id,
            "nome" => "$nome",    
            "rg" => "$rg", 
            "login" => "$login", 
            "senha" => "$senha"
        );
        return $form;
    } 
?>