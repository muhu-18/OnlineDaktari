<?php

class Users extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function register()
    {
        $data = [
            'username' => '',
            'firstName' => '',
            'lastName' => '',
            'phone' => '',
            'email' => '',
            'password' => '',
            'confirmPassword' => '',
            'latitude' => '',
            'longitude' => '',
            'userType' => '',
            'usernameError' => '',
            'firstNameError' => '',
            'lastNameError' => '',
            'emailError' => '',
            'phoneError' => '',
            'passwordError' => '',
            'confirmPasswordError' => '',
            'userTypeError' => ''
        ];


        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'firstName' => trim($_POST['firstName']),
                'lastName' => trim($_POST['lastName']),
                'email' => trim($_POST['email']),
                'phone' => trim($_POST['phone']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'userType' => trim($_POST['usertype']),
                'latitude' => trim($_POST['lat']),
                'longitude' => trim($_POST['long']),
                'firstNameError' => '',
                'lastNameError' => '',
                'emailError' => '',
                'phoneError' => '',
                'passwordError' => '',
                'confirmPasswordError' => '',
                'userTypeError' => ''
            ];

            $nameValidation = "/^[a-zA-Z0-9]*$/";
            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";
            //validate first name on letters/numbers
            if (empty($data['firstName'])){
                $data['firstNameError'] = 'Please enter first name.';
            }elseif (!preg_match($nameValidation, $data['firstName'])){
                $data['firstNameError'] = 'Name can only contain letters and numbers.';
            }

            //validate second name on letters/numbers
            if (empty($data['lastName'])){
                $data['lastNameError'] = 'Please enter last name.';
            }elseif (!preg_match($nameValidation, $data['lastName'])){
                $data['lastNameError'] = 'Name can only contain letters and numbers.';
            }

            //validate email
            if (empty($data['email'])){
                $data['emailError'] = 'Please enter email.';
            }elseif (!filter_var($data['email'],    FILTER_VALIDATE_EMAIL)){
                $data['emailError'] = 'Please enter the correct email format.';
            }else{
                //Check if email exists
                if ($this->userModel->findUserEmail($data['email'])){
                    $data['emailError'] = 'Email is already registered.';
                }
            }

            if (empty($data['phone'])){
                $data['phoneError'] = 'Please enter a phone number.';
            }

            //Validate password on length and numeric values
            if (empty($data['password'])){
                $data['passwordError'] = 'Please enter password.';
            }elseif (strlen($data['password'] < 8)){
                $data['passwordError'] = 'Password must be at least 8 characters long.';
            }elseif (preg_match($passwordValidation, $data['password'])){
                $data['passwordError'] = 'Password must have at least 1 numeric value.';
            }
            //Validate confirm password
            if (empty($data['confirmPassword'])){
                $data['confirmPasswordError'] = 'Please enter password.';
            }else{
                if($data['password'] != $data['confirmPassword']){
                    $data['confirmPasswordError'] = 'Passwords do not match, please try again.';
                }
                //Empty the errors array
                if(empty($data['firstNameError']) && empty($data['lastNameError']) && empty($data['emailError']) && empty($data['passwordError']) && empty($data['confirmPasswordError'])){
                    //Hash passwords
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                    //Register userlogin from model function
                    if ($this->userModel->insertLogins($data['email'], $data['password'])){
                        //Register user form model function
                        if ($this->userModel->insertUserLocation($data)){
                            //Register user location form model function
                            if ($this->userModel->register($data)){
                                //Redirect the user to login page
                                header('location: '.URLROOT.'/users/login');
                            }else{
                                die(('Something went wrong!'));
                            }
                        }else{
                            die(('Something went wrong!'));
                        }
                    }else{
                        die(('Something went wrong!'));
                    }


                }
            }
        }

        $this->view('users/register', $data);
    }

    public function login()
    {
        $data = [
            'title' => 'Login Page',
            'email' => '',
            'password' => '',
            'emailError' => '',
            'passwordError' => ''
        ];

        // Check for post
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Sanitize the post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'emailError' => '',
                'passwordError' => ''
            ];

            //Validate email
            if (empty($data['email'])){
                $data['emailError'] = 'Please enter your email.';
            }
            //Validate password
            if(empty($data['password'])){
                $data['passwordError'] = 'Please enter a password.';
            }

            //Check if there are no errors
            if (empty($data['emailError']) && empty($data['passwordError'])){
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);
                if ($loggedInUser){
                    $this->createUserSession($loggedInUser);
                }else{
                    $data['passwordError'] = 'Password or email is incorrect. Please try again.';
                    $this->view('users/login', $data);
                }
            }
        }else{
            $data = [
                'email' => '',
                'password' => '',
                'emailError' => '',
                'passwordError' => ''
            ];
        }
        $this->view('users/login', $data);
    }

    public function createUserSession($user) {
        $_SESSION['user_id'] = $user->user_id;
        $_SESSION['email'] = $user->email;
        $_SESSION['firstName'] = $user->first_name;
        header('location:' . URLROOT . '/pages/index');
    }

    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['email']);
        unset($_SESSION['firstName']);
        header('location:' . URLROOT . '/users/login');
    }

}