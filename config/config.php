<?php
    class Connect
    {
        private $userName = "root";
        private $password = '';
        protected $con    = null ;
        function __construct()
        {
            $this->con = new PDO("mysql:host=localhost;dbname=quanlyluongcdnbk", $this->userName , $this->password);
            $this->con->query("SET NAMES utf8");
        }
    }
?>