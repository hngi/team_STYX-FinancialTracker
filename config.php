<?php 
    session_start();
    require_once "GoogleAPIUpdated/vendor/autoload.php";
    $gclient = new Google_Client();
    $gclient -> setClientId("267104905609-64v7asrtbclruu33c6vprrrkfe6p9n3d.apps.googleusercontent.com"); #change this to the new one you generated
    $gclient -> setClientSecret("0YkFkrsuHkHEgr8goKQdnYt5"); #This one also
    $gclient -> setApplicationName("STYX-FINANCE-TRACKER-APP"); #Give your app this name "STYX-FINANCE-TRACKER-APP"
    $gclient -> setRedirectUri("http://styx.afroblogit.com/financetracker/gcallback.php"); #TO WHO TO HOST: correct this to the appropriate. if forking this codes: CREATE GOOGLE CREDENTIAL FOR THIS APP USING THIS LINK = https://console.cloud.google.com/apis/credentials/oauthclient/ without this, the app wont open.
    $gclient -> addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
?>
