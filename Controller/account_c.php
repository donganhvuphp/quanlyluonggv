<?php
    include_once "Model/account_m.php";

    class Account_c extends Account_m
    {
        private $acc ;
        function __construct()
        {
            $this->acc = new Account_m();
        }

        public function login_c()
        {
            include_once "Views/account/login.php";
        }

        public function option()
        {
            if(isset($_GET['method'])){
                $method = $_GET['method'];
            }else{
                $method = 'login';
            }

            switch ($method) {
                case 'login':
                    $this->login_c();
                    if(isset($_POST['login'])){
                        $user = $_POST['user'];
                        $pass = md5($_POST['pass']) ;
                        if(isset($user) && !empty($user) && isset($pass) && !empty($pass)){
                            $result = $this->acc->login_m($user, $pass);
                            if(!empty($result)){
                                $_SESSION['admin'] = $result[0]['user'];
                                $_SESSION['check'] = 1;
                                header("Location:index.php?page=home&method=home");
                            }else{
                                $_SESSION['error'] = 2;
                                header("Location:index.php?page=account&method=login");
                            }
                        }else{
                            $_SESSION['error'] = 1;
                            header("Location:index.php?page=account&method=login");
                        }
                    }
                    break;
                default:
                header("Location:404.html");
                    break;
            }
        }
    }
?>