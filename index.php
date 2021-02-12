<!-- TODO Application entry point. Login view -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/css/style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
      <!--JS-GRID CODE requirements-->
    <link href="https://unpkg.com/gridjs/dist/theme/mermaid.min.css" rel="stylesheet" />
        <!--JQuery requirements-->
    <script src="jquery-3.5.1.min.js"></script>
    <title>Employees Manager</title>
</head>

<body>
    <main class="main-container">
        <div id="JsGrid"></div>
    <section class="main"></section>
    </main>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>
  <!--JS-Grid Requirement-->
    <script src="https://unpkg.com/gridjs/dist/gridjs.production.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script src="assets/js/index.js" type="module"></script>
</body>
<?php include_once('./assets/html/header.html');?>
<?php include_once('./assets/html/loginForm.html'); ?>
<?php include_once('./src/dashboard.php')?>
    <?php if (!isset($_GET['login'])) {
                exit();
        }
        else {
            $loginCheck = $_GET['login'];

            if ($loginCheck == "empty") {
                echo '<p class="error">Please fill all the fields</p>';
                exit();
            }
            elseif ($loginCheck == "invalidemail") {
                echo '<p class="error">Please write a valid email</p>';
                exit();
            }
            elseif ($loginCheck == "invaliduser") {
                echo '<p class="error">Incorrect user credentials</p>';
                exit();
            }
        }
    ?>

</html>