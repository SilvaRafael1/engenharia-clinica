<?php
session_start();
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

<div class="pnc-tela">
    <div class="pnc-box">
        <?php
        $replace = str_replace(" ", "_", $_POST['file_name']);
        if ($replace != " " && $replace != "") {
            function adicionarPasta($dir)
            {
                $replace = str_replace(" ", "_", $_POST['file_name']);
                mkdir($dir);
                mkdir("$dir/files/");
                copy("backup_copy/index.php", "$dir/index.php");
                copy("backup_copy/adminpage--check.php", "$dir/adminpage-" . $replace . "-check.php");
                copy("backup_copy/adminpage--deletar.php", "$dir/adminpage-" . $replace . "-deletar.php");
                copy("backup_copy/adminpage--renomear.php", "$dir/adminpage-" . $replace . "-renomear.php");
                copy("backup_copy/adminpage--renomear-check.php", "$dir/adminpage-" . $replace . "-renomear-check.php");
                copy("backup_copy/adminpage-.php", "$dir/adminpage-" . $replace . ".php");
                header("location: adminpage.php");
            }
            adicionarPasta("equipamentos/" . $replace);
        } else {
            echo "Nome da Pasta Inválido";
            echo "<form action='adminpage-pasta-nova.php'><input type='submit' value='Voltar' style='cursor: pointer'></form>";
        }

        ?>
    </div>
</div>