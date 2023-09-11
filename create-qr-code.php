<?php
    $title = "Create QR-Code";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        .spacer-10 {margin-top: 10px;}
        .spacer-100 {margin-top: 100px;}
        .spacer-150 {margin-top: 150px;}
        .spacer-200 {margin-top: 200px;}
        .spacer-250 {margin-top: 250px;}
        .spacer-300 {margin-top: 300px;}
    </style>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,0,0" />
</head>
<body data-bs-theme="dark">
    <nav class="navbar bg-dark border-bottom border-body fixed-top navbar-expand-lg">
        <div class="container container-fluid">
            <a class="navbar-brand" href="index.php">ONECOMET</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="true" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav"><!-- me-auto mb-2 mb-lg-0 -->
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="create-qr-code.php">Create QR-Code</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="features.php">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pricing.php">Pricing</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container spacer-150">
        <h1 class="display-6 text-center"><span class="material-symbols-outlined">qr_code_2</span> Create QR-Code</h1>
        <div class="spacer-100"></div>
        <form action="create-qr-code.php" method="get">
            <div class="row g-3 align-items-end">
                <div class="col-md">
                    <label for="the-value" class="form-label">Data (Link or search term)</label>
                    <input class="form-control" type="text" name="data" id="the-value">
                </div>
                <div class="col-auto">
                    <button class="btn btn-primary" type="submit">Generate QR Code</button>
                </div>
            </div>
        </form>
    </div>
    <div class="container spacer-200">
        <?php
            if(isset($_GET['data']) & $_GET['data'] <> ""){
                $strip = 0;
                $data = trim($_GET['data']);

                if(str_starts_with($data,'http://')){$strip = 7;}
                if(str_starts_with($data,'https://')){$strip = 8;}
                $data = substr($data,$strip,strlen($data));
                
                $url = "https://api.qrserver.com/v1/create-qr-code/?size=300x300&format=png&color=000000&data=".$data;
                echo '<img class="rounded mx-auto d-block" src="'.$url.'" alt="'.$url.'">';
                echo '<div class="text-center spacer-10"><a href="'.$url.'" class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Raw link to QR Code: '.$data.'</a></div>';
            }
        ?>
    </div>
    <script>
        if("<?= $data; ?>" != ""){document.getElementById("the-value").value = "<?= $data; ?>";}
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
