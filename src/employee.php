<?php
include_once('./library/employeeManager.php');
include_once('./library/avatarManager.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/4f8800fac8.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/main.css">
  <link rel="stylesheet" href="../assets/css/employee.css">

  <script type="module" src="/php-employee-management-v1/assets/js/Avatar.js"></script>

  <script src="../assets/js/employee.js" type="module"></script>

  <title>Employee</title>
</head>

<body class='employee' id='employee'>
  <?php include('../assets/html/header.html'); ?>
  <?php
  if(isset($_GET['id'])) {
    $employee = getEmployeeAsArray($_GET['id']);
    $avatar = getAvatar($employee['id']); 
  } else {
    die();
  }

  echo "<section class='employee__page'>
        <div class='employee__avatar'></div>
        <h2 class='employee__name'>" . $employee['name'] . " " . $employee['lastName'] . "</h2>
        <h5 class='employee__role'>" . $employee['role'] . "</h5>
        <div class='employee__contact'>
          <div class='employee__email'>
            <a href='mailto:" . $employee['email'] . "'>          
              <span class='material-icons contact__icon'>email</span>
            </a>
          </div>
          <div class='employee__phone'>
            <a href='callto:" . $employee['phoneNumber'] . "'>          
              <span class='material-icons contact__icon'>stay_primary_portrait</span>
            </a>

          </div>
          <div class='awesome employee__linkedin'>
            <a href='" . $employee['linkedinLink'] . "'>      
              <i class='fab fa-linkedin contact__icon'></i>    
            </a>
          </div>
          <div class='awesome employee__github'>
            <a href='" . $employee['githubLink'] . "'>   
              <i class='fab fa-github contact__icon'></i>       
            </a>
          </div>
        </div>
        </section>"

  ?>
  <?php include('../assets/html/footer.html'); ?>

  <script type="module">
    import {
      Avatar
    } from '../assets/js/Avatar.js'
    import {
      createAvatarModal
    } from "../assets/js/avatarModal.js";

    let $avatarContainer = document.querySelector('.employee__avatar');
    let employee = JSON.parse(<?php echo json_encode(getEmployee($_GET['id'])); ?>);
    let avatarObj = JSON.parse(<?php echo json_encode($avatar); ?>);
    avatarObj = avatarObj ? avatarObj : {
      properties: {}
    };
    let avatar = new Avatar(employee.gender, avatarObj.properties);

    $avatarContainer.innerHTML = avatar.getAvatar({
      width: 200
    });
    let callback = (avatarProps) => {
      axios.put(`http://localhost/php-employee-management-v1/src/library/avatarController.php?id=${employee.id}`, {
          properties: avatarProps
        })
        .then((response) => {
          updateAvatar(response.data.properties);
        })
    }
    $avatarContainer.addEventListener('click', () => createAvatarModal(employee.gender, avatarObj.properties, callback))

    function programateWink() {
      let $avatarContainer = document.querySelector('.employee__avatar');
      setTimeout(() => {
        $avatarContainer.innerHTML = avatar.getEyesClosedAvatar({
          width: 200
        });
        setTimeout(() => {
          $avatarContainer.innerHTML = avatar.getAvatar({
            width: 200
          });
        }, getRandomInt(120, 160))
        programateWink();
      }, getRandomInt(2000, 10000))
    }

    programateWink()

    function getRandomInt(min, max) {
      return Math.floor(Math.random() * (max - min)) + min;
    }

    function updateAvatar(props) {
      avatar.setProperties(props);
      let $avatarContainer = document.querySelector('.employee__avatar');
      $avatarContainer.innerHTML = avatar.getAvatar({
        width: 200
      });
      $avatarContainer.addEventListener('click', () => createAvatarModal(employee.gender, avatarObj.properties, callback))
    }
  </script>

</body>

</html>