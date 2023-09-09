<?php
class Login extends Controller
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->view->setLayout('mainpage');
    }

    public function indexAction()
    {        
        $this->view->render('Login/index');      
        // $data['user_id'] = $this->session->userdata('user_id');
    }

   
    
    

    

}
