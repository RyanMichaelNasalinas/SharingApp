<?php

class Users extends Controller {
    public function __construct() {
        $this->userModel = $this->model('User');
    }

    public function register() {
        //Check is form method is POST
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            
            //Process the form

            //Sanitize Data from the POST form

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //Init Data
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                //Display error variables
                'name_error' => '',
                'email_error' => '',
                'password_error' => '',
                'confirm_password_error' => ''
            ];

            //Validate Email
            if(empty($data['email'])){
                $data['email_error'] = "Please enter email";
            } else {
                if($this->userModel->findByUserEmail($data['email'])){
                    $data['email_error'] = "Email is already exists";
                }
            }

            //Validate Name
            if(empty($data['name'])){
                $data['name_error'] = "Please enter name";
            }

            //Validate Password
            if(empty($data['password'])){
                $data['password_error'] = "Please enter password";
            } elseif (strlen($data['password']) < 8) {
                $data['password_error'] = "Password must be atleast 8 characters";
            } elseif (!preg_match('/[A-Z]/',$data['password'])){
                $data['password_error'] = "Password must contain atleast a uppercase letter";
            } elseif (!preg_match('/[a-z]/',$data['password'])) {
                $data['password_error'] = "Password must contain atleast a lowercae letter";
            } elseif (!preg_match('/[0-9]/',$data['password'])) {
                $data['password_error'] = "Password must contain atleast a number";
            } elseif (!preg_match('/[^A-Za-z0-9\s]/',$data['password'])) {
                $data['password_error'] = "Password must contain atleast a symbol";
            }

            //Validate Confirm Password
            if(empty($data['confirm_password'])){
                $data['confirm_password_error'] = "Please confirm password";
            } else {
                if($data['confirm_password'] != $data['password']){
                    $data['confirm_password_error'] = "Password does not match";
                }
            }

            //Make sure that errors are empty
            if(empty($data['email_error']) && empty($data['name_error']) && empty($data['password_error']) && 
                empty($data['confirm_password_error'])){
               //Hashed Passwords
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                if($this->userModel->register($data)){
                    flash('register_success','You are now registered');
                    //Parameter should be root/target
                   redirect('users/login');
                } else {
                    die('Something went wrong');
                }

            } else {
                //Load View
                $this->view('users/register', $data);
            }

        } else {
            //Init Data
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                //Display error variables
                'name_error' => '',
                'email_error' => '',
                'password_error' => '',
                'confirm_password_error' => ''
            ];
            //Load View
            $this->view('users/register', $data);
        }
    }


    
    public function login() {
        //Check is form method is POST
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            //Process the form
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                //Display error variables
                'email_error' => '',
                'password_error' => '',
            ];

            //Validate Email
            if(empty($data['email'])){
                $data['email_error'] = "Please enter email";
            } 

            //Check if email is existing
            if($this->userModel->findByUserEmail($data['email'])){
                //Correct Email
            } else {
                $data['email_error'] = 'Email does not exists';
            }

            //Validate Password
            if(empty($data['password'])){
                $data['password_error'] = "Please enter password";
            }

            //Make sure that erros are empty
            if(empty($data['email_error']) && empty($data['password_error'])){
                //Validated
                //Check and set logged in user
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                if($loggedInUser){
                    //Create Session Variables
                   $this->createUserSession($loggedInUser);
                } else {
                    $data['password_error'] = 'Password Incorect';

                    $this->view('users/login', $data);  
                }
            } else {
                //Load View
                $this->view('users/login', $data);
            }

            
        } else {
            //Init Data
            $data = [
                'email' => '',
                'password' => '',
                //Display error variables
                'email_error' => '',
                'password_error' => '',
            ];
            //Load View
            $this->view('users/login', $data);
        }
    }
    //Create login user session
    public function createUserSession($user) {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;
        redirect('posts');
    }

    //Create a logout method
    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('users/login');
    }

    
}
    
?>