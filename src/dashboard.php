<?php
    include('./library/sessionHelper.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/php-employee-management-v1/assets/css/main.css">
    <link rel="stylesheet" href="/php-employee-management-v1/assets/css/dashboard.css">
    <link rel="stylesheet" href="/php-employee-management-v1/assets/css/modal.css">
    <link rel="stylesheet" href="https://unpkg.com/gridjs/dist/theme/mermaid.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <script type="module" src="/php-employee-management-v1/assets/js/index.js"></script>
    <script type="modules" src="/php-employee-management-v1/assets/js/modules"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <title>Dashboard</title>
</head>

<body class='dashboard'>

    <?php include('../assets/html/header.html'); ?>
    <main class='main'>
        <div id='table-wrapper'></div>
    </main>

    <?php include('../assets/html/footer.html'); ?>
</body>

</html>