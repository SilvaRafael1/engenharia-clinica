<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}
?>

<head>
    <link rel="stylesheet" href="./css/global.css">
    <title>Admin Page - Adicionar Pasta</title>
    <link rel="icon" type="image/x-icon" href="./img/icon_logo.png">
</head>

<div class="pn-tela">
    <div class="pn-box">
        Nova Pasta
        <form method='post' action='adminpage-pasta-nova-check.php'>
            <input type='text' name='file_name' placeholder="Digite o nome da nova pasta"><br>
            <input type='submit' value='Adicionar Pasta' style="cursor: pointer;">
        </form>
    </div>
</div>