<?php 

if (!empty($_FILES)) {
    // echo "<pre>";
    // print_r($_FILES); exit();

    if (!empty($_FILES['pdf']['name'])) {
        $file = file_get_contents($_FILES['pdf']['tmp_name']);
        $file_name = md5($_FILES['pdf']['tmp_name']) . ".pdf";
        file_put_contents(__DIR__  . "/files/" . $file_name, $file);

        $path_print = __DIR__ . '/PDFtoPrinter.exe';
        $path = __DIR__ . "/files/" . $file_name;
        $command = $path_print . ' "'. $path .'" "PRINTER_HP_USB"';
        exec($command);

        echo "<script>window.location = 'index.php?status=".$_FILES['pdf']['name']."'; </script>"; exit();
    }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Online Printer Share</title>
  </head>
  <body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-6">
                <?php if (!empty($_GET['status'])) : ?>
                    <div class="alert alert-success text-center"><?=$_GET['status']?></div>
                <?php endif; ?>
                <form method="post" enctype="multipart/form-data" class="text-center">
                    <h1>Online Printer Share 0.1</h1>
                    <p>Opensource project by @akhyarmaulana</p>
                    <label>Upload your file here</label><br><br>
                    <input class="form-control" type="file" name="pdf" accept="application/pdf" require><br><br>
                    <button type="submit" class="btn btn-primary btn-block w-100"> Submit </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>