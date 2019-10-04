<?php 
    require_once "config.php";

    if(isset($_SESSION['access_token'])){
        $gclient -> setAccessToken($_SESSION['access_token']);
    }

    else if(isset($_GET['code'])){
        $token = $gclient -> fetchAccessTokenWithAuthCode($_GET['code']);
        $_SESSION['access-token'] = $token;
    }

    else {
        header("location : login.php");
    }


    $oAuth = new Google_service_Oauth2($gclient);
    $userdata = $oAuth -> userinfo_v2_me -> get();

    $_SESSION['email']= $userdata['email']; //Data we get from the API
    $_SESSION['picture']= $userdata['picture'];
    $_SESSION['givenname']= $userdata['givenName'];
    $_SESSION['familyname']= $userdata['familyName'];


        header("location : welcome.php");
        exit();
?>