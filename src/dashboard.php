<?php
require_once('library/loginManager.php');
require_once('library/employeeManager.php');
require_once('library/sessionHelper.php');

if (session_status() == PHP_SESSION_NONE) session_start();

if (!isset($_SESSION['authUserId'])) {
    header('Location:../index.php');
}

$userId = $_SESSION['authUserId'];
$authUser = getUserById($userId);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="../node_modules/jsgrid/dist/jsgrid.min.css" />
    <link type="text/css" rel="stylesheet" href="../node_modules/jsgrid/dist/jsgrid-theme.min.css" />
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="../assets/css/main.css" />

    <title>Dashboard</title>
</head>

<body>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../node_modules/jsgrid/dist/jsgrid.min.js"></script>
    <script src="../node_modules/jquery-validation/dist/jquery.validate.min.js"></script>

    <header>
        <?php
        require_once('../assets/html/header.html');
        ?>
    </header>
    <div class="position-fixed toast-container position-absolute top-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <h4 class="me-auto">Required fields</h4>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
            </div>
        </div>
    </div>
    <div class="flex-grow-1 px-5">
        <div id="jsGrid"></div>
    </div>

    <footer>
        <?php
        require_once('../assets/html/footer.html');
        ?>
    </footer>

    <script>
        $("#jsGrid").jsGrid({
            width: "100%",
            height: "auto",

            filtering: false,
            inserting: true,
            editing: true,
            sorting: true,
            paging: true,
            autoload: true,
            pageSize: 10,
            pageButtonCount: 10,

            controller: {
                loadData: function(filter) {
                    return $.ajax({
                        type: "GET",
                        url: "./library/employeeController.php",
                        dataType: "json",
                        data: filter,
                    });
                },
                insertItem: function(item) {
                    return $.ajax({
                        type: "POST",
                        url: "library/employeeController.php",
                        data: item,
                        dataType: "json",
                        success: function(data) {
                            console.log(data);
                            if (data == 'sessionTimeOut') {
                                window.location.reload();
                            }
                        }
                    });

                },
                deleteItem: function(item) {
                    return $.ajax({
                        type: "DELETE",
                        url: "./library/employeeController.php",
                        data: item,
                        success: function(data) {
                            console.log(data);
                            if (data == 'sessionTimeOut') {
                                window.location.reload();
                            }
                        }
                    });
                },

            },
            fields: [{
                    name: "id",
                    type: "text",
                    visible: false,
                    css: 'bordersAndBackground'
                },
                {
                    name: "name",
                    title: "Name",
                    type: "text",
                    width: 100,
                    validate: "required",
                    css: 'bordersAndBackground',
                    headercss: 'backgroundHeader'

                },
                {
                    name: "email",
                    title: "Email",
                    type: "text",
                    width: 150,
                    validate: [
                        "required",
                        {
                            message: "Please put a valid email address",
                            validator: function(value, item) {
                                return /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/.test(value);
                            },
                        }
                    ],
                    css: 'bordersAndBackground',
                    headercss: 'backgroundHeader'

                },

                {
                    name: "age",
                    title: "Age",
                    type: "text",
                    width: 50,
                    css: 'backgroundRed',
                    validate: {
                        validator: function(value) {
                            if (value >= 18 && value < 80) {
                                return true;
                            }
                        },
                        message: function(value, item) {
                            return "The client age should be between 0 and 80. Entered age is \"" + value + "\" is out of specified range.";
                        },
                        param: [18, 80]
                    },
                    css: 'bordersAndBackground',
                    headercss: 'backgroundHeader'

                },
                {
                    name: 'streetAddress',
                    title: 'Address',
                    type: 'text',
                    width: '100',
                    headercss: 'backgroundHeader',
                    validate: 'required',
                    css: 'bordersAndBackground'
                },
                {
                    name: 'city',
                    title: 'City',
                    type: 'text',
                    width: '100',
                    validate: 'required',
                    headercss: 'backgroundHeader',
                    css: 'bordersAndBackground'
                },
                {
                    name: 'state',
                    title: 'State',
                    type: 'text',
                    width: '50',
                    headercss: 'backgroundHeader',
                    validate: 'required',
                    css: 'bordersAndBackground'
                },
                {
                    name: 'postalCode',
                    title: 'Postal Code',
                    type: 'text',
                    headercss: 'backgroundHeader',
                    width: '100',
                    validate: {
                        validator: function(value) {
                            if (value.length < 10 && value > 0) {
                                return true;
                            }
                        },
                        message: "Please enter a valid postal code",
                    },
                    css: 'bordersAndBackground'
                },
                {
                    name: 'phoneNumber',
                    title: 'Phone Number',
                    type: 'text',
                    headercss: 'backgroundHeader',
                    width: '100',
                    validate: {
                        validator: function(value, item) {
                            if (value.length < 20) {
                                return true;
                            }
                        },
                        message: "Please enter a valid phone number",
                    },
                    css: 'bordersAndBackground',
                },
                {
                    type: "control",
                    itemTemplate: function(value, item) {
                        var $result = $([]);
                        $result = $result.add(this._createDeleteButton(item));
                        return $result;
                    },
                    css: "bordersAndBackgroundEdit",
                    headercss: 'backgroundHeader'

                },
            ],

            rowClick: function(item) {
                window.location.href = "./employee.php?id=" + item.item.id;
            },
            onItemInvalid: function(args) {
                console.log("error");
                $(".toast-body").empty();
                // prints [{ field: "Name", message: "Enter client name" }]
                var messages = $.map(args.errors, function(error) {
                    return error.field.name + ": " + error.message;
                });

                $.each(messages, function(index, value) {
                    $(".toast-body")
                        .append(`<div class="alert alert-danger p-1" role="alert">*${value}</div>`)
                });
                $('.toast').toast('show');
                $(".toast").toast({
                    delay: 2000
                });

            },
            invalidNotify: function(args) {
                var messages = $.map(args.errors, function(error) {
                    return error.field.name + ": " + error.message;
                });
            }
        });

        const userName = "<?php echo $authUser['name'] ?>";
        setUserName(userName);
    </script>
</body>

</html>