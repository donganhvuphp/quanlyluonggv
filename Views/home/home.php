<?php
if (isset($_SESSION['check']) && $_SESSION['check'] == 1) {
?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Đăng nhập thành công!!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php
    unset($_SESSION['check']);
}
?>
<div class="row">
    <div class="col-md-10 center border20" style="padding-top: 100px; margin-top:30px; box-shadow: 0 1px 6px 0 grey;">
        <h2 class="center" style="width: 800px; color:white; font-weight: bold;">
            <marquee behavior="" direction=""><h1 style="color:red;">XIN CHÀO ĐẾN VỚI HỆ THỐNG QUẢN LÝ NHÂN SỰ TRƯỜNG CDNBK</h1></marquee>
        </h2>
        <h3 class="text-center center" style="color:red;text-transform: uppercase; background-color: lightcyan; width: 300px">Xin chào <?php if (isset($_SESSION['admin'])) {
                                                                                                                                            echo $_SESSION['admin'];
                                                                                                                                        } else {
                                                                                                                                            header("Location:index.php?page=account&method=login");
                                                                                                                                        }  ?> </h3>
        <div class="row">
            <div class="col-md-8 center">
                <div class="row">
                    <div class="col-md-6 center" style="padding : 80px 75px;"> <a href="index.php?page=manager&method=manager">
                            <div class="option">
                                <h4 class="danhmuc">MANAGER</h4>
                            </div>
                        </a></div>
                </div>
            </div>

        </div>
    </div>
</div>