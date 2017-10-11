<?php
session_start();
// added in v4.0.0
require_once 'autoload.php';
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;
// init app with app id and secret
FacebookSession::setDefaultApplication( '145678322659466','3ba2f7710419465b7160ef5ca2d74986' );

// login helper with redirect_uri
    $helper = new FacebookRedirectLoginHelper('http://9meses.co/inicia-sesion/fbconfig.php' );
    $permissions = ['email','public_profile', 'user_friends']; // Optional permissions

try {
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
  // When Facebook returns an error
} catch( Exception $ex ) {
  // When validation fails or other local issues
}
// see if we have a session
if ( isset( $session ) ) {
  // graph api request for user data
  $request = new FacebookRequest( $session, 'GET', '/me?fields=name,email,age_range,gender' );
  $response = $request->execute();
  // get response
      $graphObject = $response->getGraphObject();
     	$fbid = $graphObject->getProperty('id');              // To Get Facebook ID
      //$fbid->getId();
 	    $fbfullname = $graphObject->getProperty('name'); // To Get Facebook full name
      //$fbfullname->getName();
	    $femail = $graphObject->getProperty('email');    // To Get Facebook email ID
      $fage = $graphObject->getProperty('age_range');    // To Get Facebook age range
      $fgender = $graphObject->getProperty('gender');    // To Get Facebook gender
      
	/* ---- Session Variables -----*/
	    $_SESSION['FBID'] = $fbid;           
      $_SESSION['FULLNAME'] = $fbfullname;
	    $_SESSION['EMAIL'] =  $femail;
      $_SESSION['AGE'] =  $fage;
      $_SESSION['GENDER'] =  $fgender;

    /* ---- header location after session ----*/
  header("Location: index.php");
} else {
  
  $loginUrl = $helper->getLoginUrl($permissions);
 header("Location: ".$loginUrl);
}
?>