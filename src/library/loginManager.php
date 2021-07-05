<?php
function validateLoginData($launchUser, $launchPassword, $logedUser, $logedPassword){

    
    switch (true) {
        case ($launchUser==$logedUser && password_verify($launchPassword,$logedPassword)):
           
            header("Location:../dashboard.php?welcome=$logedUser");
                break;
        case (($launchUser!=$logedUser) && !password_verify($launchPassword,$logedPassword)):
            header("Location:../../index.php?wrongPassword_andName=Wrong password and wrong name"); 
                
                break;
        case (!($launchUser==$logedUser)):
            header("Location:../../index.php?wrongName=Worng user_name"); 
                         
                break;
        case (!password_verify($launchPassword,$logedPassword)):
            header("Location:../../index.php?wrongPass=Wrong password"); 
                              
                break; 
        default:
                break;
    }
}