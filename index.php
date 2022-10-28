<?php
/*
Kelompok 4
-Achmad sandi aji permadi
-Syauqi alfurqonansyah
-Tutik Hidayanti
-Leoninda putri mahayani 
-Putri salpiyani

*/



$url = "https://berita-indo-api.vercel.app/v1/cnn-news";

$option =[
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => [
        'Accept: application/json',
        'Content-Type: application/json; charset=utf8',

    ],
        CURLOPT_RETURNTRANSFER => 1,
    ];
    $ch =curl_init($url);
    curl_setopt_array($ch, $option);
    $res = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($res, true); ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS only -->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
       
       <title>Hello World</title>
    </head>
    <body>
        <center>
            <h1> Berita Terbaru</h1>
        </center>
        <div class="container">
            <div class="row">
                <?php 
                $i = 0;
                foreach ($data['data'] as $key => $value) if ($i < 30) { ?>
                <div class="col-sm-4">
                    <div class="card my-2" style"">
                        <?php foreach ($value['image'] as $item) { ?>
                            <img src="<?= $item ?>" class="card-img-top" alt="...">
                            <?php }
                            ?>
                            <div class="card-body">
                                <h5 class="card-title"><?= $value['title'] ?></h5>
                                <p class="card-text"><?= $value['contentSnippet'] ?></p>
                                <a href="<?= $value ['link'] ?>" class='btn-primary'>Selengkapnya</a>

                            </div>
                </div>

            </div>
           <?php $i += 1;
                }
                ?>

        
    </body>
    </html>


