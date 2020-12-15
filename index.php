<?php
    session_start();
    ob_start();
?>
<!DOCTYPE html>
<html>
<head>
    <?php
    include_once 'Views/layout/head.php';
    ?>
</head>

<body>
    <div class="container-fluid">
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 'account';
        }
        switch ($page) {
            case 'account':
                include_once 'Controller/account_c.php';
                $acc = new Account_c();
                $acc->option();
                break;
            case 'home':
                include_once 'Controller/home_c.php';
                $home = new Home_c();
                $home->option();
                break;
            case 'manager':
                include_once 'Controller/manager_c.php';
                $manager = new Manager_c();
                $manager->option();
                break;
            case 'system':
                include_once 'Controller/system_c.php';
                $system = new System_c();
                $system->option();
                break;
            default:
                header("Location:404.html");
                break;
        }
        ?>
    </div>
    <?php
    include_once 'Views/layout/script.php';
    ?>
</body>

</html>