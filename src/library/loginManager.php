<?php
session_start();
//define( 'USERS_JSON_PATH', $_SERVER[ 'DOCUMENT_ROOT' ] . "/php-employee-mangement-v1/resources/users.json" );

print_r( logIn( 'admin@assemblerschool.com' , '123456' ) );

function getUser( string $userEmail )
{
    $users = json_decode( file_get_contents( "../../resources/users.json" ) ) -> users;

    foreach ( $users as $user) {
        if( $user -> email === $userEmail ){
            return $user;
        }
    }
}

function logIn( string $userEmail, string $password ) : bool
{
    $user = getUser( $userEmail );

    if ( isset( $user ) ){

        $isPasswordCorrect = password_verify( $password, $user -> password );

        if( $isPasswordCorrect ){
            $_SESSION[ 'userId' ] = $user -> userId;
            $_SESSION[ 'time' ] = time();
            $_SESSION[ 'lifeTime' ] = 600;

            return true;

        } else {
            return false;
        }
    } else {

        return false;

    }
}

function logOut( )
{
    //toDo 
}