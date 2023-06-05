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
    <title>Admin Page - Deletar Pasta</title>
    <link rel="icon" type="image/x-icon" href="./img/icon_logo.png">
</head>

<?php
function deleteAll($dir) {
    foreach(glob($dir . '/*') as $file) {
        if(is_dir($file))
            deleteAll($file);
        else
            unlink($file);
    }
    rmdir($dir);
}
deleteAll("equipamentos/" . $_POST['file_name'])
?>

<div class="pnc-tela">
    <div class="pnc-box">
        Pasta deletada com sucesso
        <form action='adminpage.php'><input type='submit' value='Tela Inicial'></form>
    </div>
</div>
