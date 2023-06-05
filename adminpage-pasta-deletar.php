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
    <meta charset="UTF-8" />
    <link rel="icon" type="image/x-icon" href="./img/icon_logo.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/global.css">
    <title>Admin Page - Deletar Pasta</title>
  </head>
  <body>
<header>
    <div class="title">
        ENGENHARIA CLÍNICA
    </div>
</header>

<div style="width: 100%; height: min-content; display: flex; justify-content: center;">
  <div class="main">
    <div class="equi-add">
      <span id="equi">Pasta existentes</span>
      <span style="margin-right: 10px;">
        <form action='adminpage.php'>
          <input type='submit' value='Voltar' class="add-pasta">
        </form>
      </span>
    </div>
    <div class="grid-container">
      <?php
      $dir = "./equipamentos/";
      if (is_dir($dir)){
          if ($dh = opendir($dir)){
              while (($file = readdir($dh)) !== false){
                  if ($file != "." && $file != "..") {
                      $faction = "equipamentos/" . $file . "/adminpage-" . $file . ".php";
                      $replace = str_replace("_", " ", $file);
                      $ftype = "submit";
                      echo "<div class='grid-item'>";
                      echo "<form action=$faction> <input type=$ftype value='$replace' style='cursor: pointer; padding: 20px; width: 100%; border: 0; text-transform: capitalize;'> </form>";
                      echo "<form method='post' action='adminpage-pasta-deletar-check.php'><input type='hidden' name='file_name' value='".$file."'><input type='submit' name='delete_file' value='Deletar Pasta' style='background: red; color: white; border: 0; padding: 1px; width: 100%; cursor: pointer;'></form>";
                      echo "</div>";
                  }
              }
              closedir($dh);
          }
      }

      ?> 
    </div>
  </div>
</div>
  </body>