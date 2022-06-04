<?php

include('./loginManager.php');
//we can do urlFile = basename... para determinar si viene desde index o desde dasborah la peticion y asi saber cuando hacer validate o logout
validate();
include('./sessionHelper.php');
a(intval(date('i')), intval(date('s')));
