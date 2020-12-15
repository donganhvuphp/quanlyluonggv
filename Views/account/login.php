<div class="row">
    <div class="col-md-3 login">
        <?php
        if (isset($_SESSION['error']) && $_SESSION['error'] == 1) {
        ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Bạn hãy nhập đầy đủ thông tin!!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        unset($_SESSION['error']);
        }elseif (isset($_SESSION['error']) && $_SESSION['error'] == 2) {
            ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Thông tin tài khoản hoặc mật khẩu không chính xác!!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
            unset($_SESSION['error']);
            }
        ?>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="text-center" style="text-shadow: 1px 1px 3px red; color: red; font-weight: bold;">LOGIN ADMIN</h3>
            </div>
            <form action="" method="POST">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="user">Username:</label>
                        <input required="true" name="user" type="text" class="form-control border20" id="user">
                    </div>
                    <div class="form-group">
                        <label for="pass">Password:</label>
                        <input required="true" type="password" name="pass" class="form-control border20" id="pass">
                    </div>
                    <button class="btn btn-success" name="login" type="submit" style="margin-left: 110px; width: 100px;">LOGIN</button>
                </div>
            </form>
        </div>
        <div class="check"> <i class="fa fa-check"></i></div>
    </div>
</div>