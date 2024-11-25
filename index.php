<?php
session_start();

if (isset($_POST)) {
    if (!isset($_SESSION['contador'])) {
        $_SESSION['contador'] = 0;
        $_SESSION['numero']= rand(0, 100);
    }


    
    $qmax =  $_SESSION['numero']+ 10;
    $qmin =  $_SESSION['numero'] - 10;
   

    $chu = $_POST["chute"];

    if ($chu ==  $_SESSION['numero']) {
        echo  "<p class='acertou'>voce acertou o numero magico</p>";
        
        $check=0;
        $_SESSION['contador'] = 19;
        $_SESSION['contador'] = 0;
        $_SESSION['numero']= rand(0, 100);

    } else if ($chu <= $qmax && $chu >= $qmin && $chu != $_SESSION['numero']) {
        echo "<p class='quente'>o numero magico esta quente</p>";
      $check=1;

    } else {
        echo "<p class='frio'>o numero magico esta frio</p>";
        $check=1;
    }
  $_SESSION['contador']++;

     
    if ($_SESSION['contador'] >= 19 && $check==1) {
        $_SESSION['numero']= rand(0, 100);
        echo "<p class='perdeu'>voce nao encrontou o equlibrio</p>";
        $_SESSION['contador'] = 0;
    }
  
   
    
} ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
<body>
    <p>
        <span class="ten">
            <?php 
             echo "voce tem " . $_SESSION['contador'] . "/20 tentativas"; ?>
            </span>
    </p>
    <form action="index.php" method="post">
        <label class="texto" for="numero">fale o numero magico para que os magos encontrem o equilibrio:</label>
        <input class="barra" type="number" name="chute" id="numero">
        <input class="bota" type="submit">
       
    </form>
    <header>
    <img  class="img"src="img/logo.png" alt="mago de fogo e gelo" width="1325" height="1300">
    </header>
</body>


</html>