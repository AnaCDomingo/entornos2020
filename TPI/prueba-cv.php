<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <form action="upload-pdf.php" method="POST" name="cvForm" enctype="multipart/form-data">
        <input type="file" name="cvPrueba" id="cvPrueba1">
        <button class="btn-primary" type="submit" name="cvForm">Subir</button>
        <a class="btn btn-primary" style="color:white" href="testupload/example.pdf" download="inteligencia">Descargar</a>
        <a class="btn btn-primary" style="color:white" href="enviar-cv.php">Enviar mail</a>

    </form>
</body>

</html>