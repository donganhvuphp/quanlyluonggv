<?php
    include_once "config/config.php";

    class Account_m extends Connect
    {
        function __construct()
        {
            parent::__construct();
        }

        protected function login_m($user, $pass)
        {
            $sql = "SELECT * FROM `user` WHERE `user` = :user AND `pass` = :pass AND `permission` =1";
            $result = $this->con->prepare($sql);
            $result->bindParam(":user",$user);
            $result->bindParam(":pass",$pass);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>