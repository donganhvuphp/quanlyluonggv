<div class="row">
    <div class="col-md-10 center" style="border-radius: 20px; height: auto;">
        <div class="row">
            <div class="col-md-12">
                <?php
                if (isset($_SESSION['error']) && $_SESSION['error'] == 1) {
                ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Hãy nhập đủ thông tin!!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php
                    unset($_SESSION['error']);
                }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7 center">
                <h1 class="text-center" style="color:red; font-weight: bold;">
                    Thêm nhân viên
                </h1>
            </div>
        </div>
        <form action="" method="POST">
            <div class="row center" style="padding:50px 200px 30px 200px;">
                <div class="col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="name">Tên nhân viên:</label>
                                <input required="true" name="name" type="text" class="form-control border20" id="name">
                            </div>
                            <div class="form-group">
                                <label for="birthday">Ngày sinh:</label>
                                <input required="true" type="date" name="birthday" class="form-control border20" id="birthday">
                            </div>

                            <div class="form-group">
                                <label for="gender">Giới tính:</label>
                                <select name="gender" class="form-control border20"  id="">
                                    <option value="1">Nam</option>
                                    <option value="0">Nữ</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="phone">Số điện thoại:</label>
                                <input required="true" type="number" name="phone" class="form-control border20" id="phone">
                            </div>
                            <div class="form-group">
                                <label for="address">Địa chỉ:</label>
                                <input required="true" type="text" name="address" class="form-control border20" id="address">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="cv">Hợp đồng lao động:</label>
                                <select name="id_hdld" id="" class="form-control border20">
                                    <?php
                                    foreach ($danhSachHDLD as $hdld) {
                                    ?>
                                        <option value="<?= $hdld['id'] ?>"><?= $hdld['name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="from_day">Từ ngày:</label>
                                <input type="date" name="from_day" class="form-control border20" id="from_day">
                            </div>
                            <div class="form-group">
                                <label for="to_day">Đến ngày:</label>
                                <input type="date" name="to_day" class="form-control border20" id="to_day">
                            </div>
                            <div class="form-group">
                                <label for="pb">Phòng ban:</label>
                                <select name="id_phongban" id="" class="form-control border20">
                                    <option value="0">Phòng ban</option>
                                    <?php
                                    foreach ($danhSachPB as $PB) {
                                    ?>
                                        <option value="<?= $PB['id'] ?>"><?= $PB['name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_chucvu">Chức vụ:</label>
                                <select name="id_chucvu" id="" class="form-control border20">
                                    <option value="0">Chức vụ</option>
                                    <?php
                                    foreach ($danhSachCV as $cv) {
                                    ?>
                                        <option value="<?= $cv['id'] ?>"><?= $cv['name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="tdhv">Trình độ học vấn:</label>
                                <select name="id_tdhv" id="" class="form-control border20">
                                    <?php
                                    foreach ($danhSachTDHV as $tdhv) {
                                    ?>
                                        <option value="<?= $tdhv['id'] ?>"><?= $tdhv['name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_hsl">Hệ số lương:</label>
                                <select name="id_hsl" id="" class="form-control border20">
                                <option value="0">hệ số</option>
                                    <?php
                                    foreach ($danhSachHSL as $hsl) {
                                    ?>
                                        <option value="<?= $hsl['id'] ?>"><?= $hsl['heso'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="luongcoban">Lương cơ bản:</label>
                                <input required="true" type="text" name="luongcoban" class="form-control border20" id="luongcoban">
                            </div>
                            <div class="form-group">
                                <label for="id_phucap">Phụ cấp:</label>
                                <select name="id_phucap" id="" class="form-control border20">
                                    <?php
                                    foreach ($danhSachPC as $pc) {
                                    ?>
                                        <option value="<?= $pc['id'] ?>"><?= $pc['name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 center">
                    <button  class="btn btn-success" name="themnv" type="submit" style=" width: 100%;">Thêm nhân viên</button>
                </div>
            </div>
        </form>
    </div>
</div>