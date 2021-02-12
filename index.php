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
            <!--JQuery requirements-->
    <script src="jquery-3.5.1.min.js"></script>

    <title>Employees Manager</title>
</head>
<body>
    <?php if (isset($_GET['login'])) {
            $loginCheck = $_GET['login'];
            echo '<aside class="login__error">
                    <p class="error">'.$loginCheck.'</p>
                </aside>';
        }
    ?>
    <?php include_once('./assets/html/loginForm.html'); ?>
    <header class="header">
        <section class="title">
            <h4>Employees Manager</h4>
        </section>
        <ul class="nav-links">
            <li>
                <a href="#">Login</a>
            </li>
            <li>
                <a href="#">Dashboard</a>
            </li>
            <li>
                <a href="#">Employee</a>
            </li>
        </ul>

        <section class="searchBar-container">
            <form class="searchBar" action="index.php" method="get">
                <input id="headerSearch" class="searchBar__input" type="text" name="searchValue" required>
                <input type="submit" class="searchBar__submit" id="searchBtn" value="Search">
            </form>
        </section>
        <section class="logout-container">
            <button id="logout"> Log Out </button>
        </section>
    </header>
    <main class="main-container">
        <div id="JsGrid"></div>
    <section class="main">
    </section>
    </main>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</body>
</html>

