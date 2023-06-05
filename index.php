<head>
    <link rel="stylesheet" href="./css/global.css">
    <title>Engenharia Clínica</title>
    <link rel="icon" type="image/x-icon" href="./img/icon_logo.png">
</head>

<header>
    <div class="title">
        ENGENHARIA CLÍNICA
    </div>
    <div class="login">
        <form action="./loginpage.php">
            <input type="submit" value="Login">
        </form>
    </div>
</header>
<div style="width: 100%; height: min-content; display: flex; justify-content: center;">
    <div class="main">
        <span id="equi">Equipamentos</span>
        <div class="grid-container">
                <?php
                $dir = "./equipamentos/";
                // $dir = "//172.29.50.40/dfs/Documentos_Institucionais";
                if (is_dir($dir)){
                    if ($dh = opendir($dir)){
                        while (($file = readdir($dh)) !== false){
                            if ($file != "." && $file != "..") {
                                $faction = "equipamentos/" . $file;
                                $replace = str_replace("_", " ", $file);
                                $ftype = "submit";
                                echo "<div class='grid-item'><form action=$faction> <input type=$ftype value='$replace' style='padding: 20px; width: 100%; border: 0; text-transform: capitalize; cursor: pointer;'></form></div>";
                            }
                        }
                        closedir($dh);
                    }
                }

                ?> 
        </div>
    </div>
</div>