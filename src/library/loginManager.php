<?php
session_start();

define( 'USERS_JSON_PATH', $_SERVER[ 'DOCUMENT_ROOT' ] . "/php-employee-management-v1/resources/users.json" );

function getUser( string $userEmail )
{
    $users = json_decode( file_get_contents( USERS_JSON_PATH ) ) -> users;

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

function logOut() :bool
{
    return session_destroy();
}