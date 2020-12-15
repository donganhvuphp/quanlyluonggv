<?php
    include_once "Model/home_m.php";

    class Home_c extends Home_m
    {
        private $home ;
        function __construct()
        {
            $this->home = new Home_m();
        }

        public function home_c()
        {
            include_once "Views/home/home.php";
        }

        public function option()
        {
            if(isset($_GET['method'])){
                $method = $_GET['method'];
            }else{
                $method = 'home';
            }
            switch ($method) {
                case 'home':
                    $this->home_c();
                    break;
                default:
                header("Location:404.html");
                    break;
            }
        }
    }
?>