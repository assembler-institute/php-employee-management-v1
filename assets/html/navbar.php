<!--todo html Navbar content --> 

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <div class="col d-flex ">
            <span>
                <i class="fas fa-rocket"> Rocket Employee System</i>
            </span>
        </div>
        <div class="col d-flex">
            <span id="filelocation">
                <!-- todo script to find the actual Page and write -->
                <script>
                    var divlocation = document.getElementById('filelocation');
                    var winloc = window.location.pathname.split('/');
                    var dirname = winloc[4].split('.');
                    console.log(dirname[0]);
                    divlocation.append(dirname[0]);
                </script>
            </span>
        </div>
        <div class="col d-flex justify-content-end">
            <form action="./library/loginController.php" method="POST">
                <button class="d-flex justify-content-end btn btn-light " type="submit" name="logout">Log out </button>
            </form>
        </div>

    </div>
</nav>