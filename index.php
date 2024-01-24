<?php
// NOTE: Импорт кода
include('app.php')
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>todolist</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body class="bg-light">
    <div class="container pt-5">
        <div class="row">
            <div class="col-12 col-lg-8 pe-0 pe-lg-5">
                <h2 class="mb-4"><b>Todo list</b> <small class="text-muted ms-2">v.php</small></h2>
                <? if (count(Notes::$notes) > 0) : ?>
                    <div class="row">
                        <? foreach (Notes::$notes as $key => $note) : ?>
                            <? include('view/card.php') ?>
                        <? endforeach; ?>
                    </div>
                <? endif; ?>
            </div>
            <div class="col-12 col-lg-4 start pe-0 pe-lg-5 mt-5 mt-lg-0">
                <? include('view/form.php') ?>
            </div>
        </div>
    </div>
</body>

</html>