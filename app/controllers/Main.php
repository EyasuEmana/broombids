<?php
class Main extends Controller
{
    
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->view->setLayout('mainpage');
        //$this->load_model('Users');
    }

    public function indexAction()
    {        
        $this->view->render('home/index_2');   
        if (isset($_GET['code'])) {

    // If we have a code, exchange it for an access token
    $google_client->authenticate($_GET['code']);
    $accessToken = $google_client->getAccessToken();

    // Store the access token in the session
    $_SESSION['access_token'] = $accessToken;

    // Use the access token to get user information
    $oauth2Service = new Google_Service_Oauth2($google_client);
    $userInfo = $oauth2Service->userinfo->get();

    $current_datetime = date('Y-m-d H:i:s');


    // Store user information in session
    // $_SESSION['user_info'] = $userInfo;

    $userInfoJson = json_encode($userInfo);

    $userInfo = json_decode($userInfoJson, true); 
    $_SESSION['user_info'] = $userInfo;

    // You can redirect to your application's dashboard or any other page
    header('Location: dashboard.php');
    exit;
}   
    }

    

}
