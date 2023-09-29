<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dinamic image slider</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .carosello {
            width: 800px;
            height: 600px;
            background-color: aquamarine;
            margin: 30px 0 15px 0;
        }

        .btns button {
            padding: 6px;
            margin: 5px;
            background-color: rgb(74, 230, 217);
            color: #000;
            font-family: Arial, Helvetica, sans-serif;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="carosello">
            <img src="" alt="">
        </div>
        <div class="btns">
            <button id="di">Dietro</button>
            <button id="av">Avanti</button>
        </div>
    </div>

</body>



<?php
$cartella = "imgs/";
$immagini = [];

// apre la dir
$dir = opendir($cartella);

// legge i file nella cartella
while (($file = readdir($dir)) !== false) {
    // verifica l'estensione
    if (pathinfo($file, PATHINFO_EXTENSION) == "jpg" || pathinfo($file, PATHINFO_EXTENSION) == "jpeg" || pathinfo($file, PATHINFO_EXTENSION) == "png") {
        $immagini[] = $cartella . $file;
    }
}

// chiude la dir
closedir($dir);



?>


<script>
    let imgs = <?php echo json_encode($immagini); ?>;
    let indice = 1;
    const img = document.querySelector("img");
    img.src = imgs[indice]

    function avanti() {
        indice++;
        if (indice > imgs.length - 1) {
            indice = 0
        }
        img.src = imgs[indice]
    };

    function dietro() {
        indice--;
        if (indice < 0) {
            indice = imgs.length - 1
        }
        img.src = imgs[indice]
    }
    document.getElementById("di").addEventListener("click", dietro);
    document.getElementById("av").addEventListener("click", avanti);

    setInterval(avanti, 2000)
</script>

</html>