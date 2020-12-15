<div class="row">
    <div class="col-md-10 center" style="border-radius: 20px; height: auto;">
        <div class="row">
            <div class="col-md-7 center">
                <h1 class="text-center" style="color:red; font-weight: bold;">
                    Tính lương nhân viên
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 center" style="margin-top:30px;">
                <form method="POST">
                    <div class="form-group">
                        <label for="phongban">Chọn phòng ban :</label>
                        <select name="id" id="" class="form-control">
                            <?php
                            foreach ($danhSachPB as $pb) {
                            ?>
                                <option <?php if (isset($_POST['id']) && $_POST['id'] == $pb['id']) echo "selected";  ?> value="<?= $pb['id'] ?>"><?= $pb['name'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" name="phongban" class="btn btn-primary">Hiển thị nhân viên</button>
                    <a href="index.php?page=manager&method=manager" class="btn btn-danger">Trang chủ</a>
                </form>
            </div>
        </div>
        <?php
        if (isset($danhSachNV[0]['namePB'])) {
            $_SESSION['pb'] = $danhSachNV[0]['namePB'];
        ?>
            <div class="row">
                <div class="col-md-12" style="margin-top:30px;">
                    <h3 class="text-center" style="color: green;">Danh sách nhân viên :
                        <?= $danhSachNV[0]['namePB'] ?></h3>
                </div>
            </div>
        <?php
        }

        if (isset($danhSachNV) && !empty($danhSachNV)) {
        ?>
            <form action="" method="POST">
                <div class="row">
                    <div class="col-md-3">
                        Date :<input type="date" name="current_time" required class="form-control">
                    </div>
                </div>
                <div class="row" style="margin-top:30px;">
                    <div class="col-md-12" style="display: flex;  flex-direction: row; border-radius : 10px; border : 1px solid rgb(221, 221, 221) ; padding: 20px;">
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Tên nhân viên</th>
                                    <th scope="col">Số điện thoại</th>
                                    <th scope="col">Chức vụ</th>
                                    <th scope="col">TDHV</th>
                                    <th scope="col">HS lương</th>
                                    <th scope="col">Lương cơ bản</th>
                                    <th scope="col">Phụ cấp</th>
                                    <th scope="col">KTKL</th>
                                    <th scope="col">Tiền ứng</th>
                                    <th scope="col">Ngày công</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($danhSachNV as $nv) {
                                ?>
                                    <tr>
                                    <input type="text" class="text-center" value="<?= $nv['id'] ?>" style=" border:none;display: none;" name="id_nv[]" readonly>
                                        <td><?= $nv['name'] ?><input type="text" class="text-center" value="<?= $nv['name'] ?>" style=" border:none;display: none;" name="name[]" readonly></td>
                                        <td><?= $nv['phone'] ?><input type="text" class="text-center" value="<?= $nv['phone'] ?>" style=" border:none;display: none;" name="phone[]" readonly></td>
                                        <td><?= $nv['nameCV'] ?><input type="text" class="text-center" value="<?= $nv['nameCV'] ?>" style=" border:none;display: none;" name="chucvu[]" readonly></td>
                                        <td><?= $nv['nameTDHV'] ?><input type="text" class="text-center" value="<?= $nv['nameTDHV'] ?>" style=" border:none;display: none;" name="tdhv[]" readonly></td>
                                        <td style="color:red; font-weight : bold;"><?= $nv['HSL'] ?><input type="text" class="text-center" value="<?= $nv['HSL'] ?>" style=" border:none; display: none;" name="heso[]" readonly></td>
                                        <td style="color:red; font-weight : bold;"><?= number_format($nv['luongcoban'] * 26, $decimals = 0, $dec_point = ".", $thousands_sep = ","); ?><input type="text" class="text-center" value="<?= $nv['luongcoban'] ?>" style=" border:none; display: none;" name="luongcoban[]" readonly>vnđ</td>
                                        <td><?= $nv['namePC'] ?><input type="text" class="text-center" value="<?= $nv['moneyPC'] ?>" style=" border:none; display: none;" name="phucap[]" readonly></td>
                                        <td><select name="ktkl[]" style=" border:none; width: 100px;outline: none; color:green; font-weight:bold;">
                                                <option value="0">KTKL</option>
                                                <?php
                                                foreach ($danhSachKTKL as $KTKL) {
                                                ?>
                                                    <option value="<?= $KTKL['money'] ?>"><?= $KTKL['name'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select></td>
                                        <td><input type="number" class="text-center" style=" border:none; width: 100px;outline: none; color:green; font-weight:bold;  " name="tienUng[]"></td>
                                        <td><input type="number" class="text-center" style=" border:none; width: 100px;outline: none; color:red; font-weight:bold;" min="0" max="26" name="workdays[]"></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 center" style="margin-top : 20px;">
                        <button class="btn btn-success" type="submit" name="tinhluong" style="width: 100%;">In báo cáo</button>
                    </div>
                </div>
            </form>
        <?php
        }
        ?>


    </div>
</div>