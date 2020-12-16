<div class="row">
    <div class="col-md-10 center" style="border-radius: 20px; height: auto;">
        <div class="row">
            <div class="col-md-7 center">
                <h1 class="text-center" style="color:red; font-weight: bold;">
                    Lịch sử lương nhân viên
                </h1>
            </div>
        </div>
        <div class="row" style="margin-top:30px;">
            <div class="col-md-12" style="display: flex;  flex-direction: row; border-radius : 10px; border : 1px solid rgb(221, 221, 221) ; padding: 20px;">
                <table class="table table-hover text-center">
                    <thead>
                        <tr>
                            <th scope="col">Tên nhân viên</th>
                            <th scope="col">Số tháng Làm việc</th>
                            <th scope="col">Hệ số</th>
                            <th scope="col">Lương cơ bản</th>
                            <th scope="col">Tổng số lương</th>
                            <th scope="col">Tùy chọn</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        foreach ($LichSuLuong as $ls) {
                        ?>
                            <tr>
                               <td style="color:green; font-weight : bold;"><?=$ls['name']?></td>
                               <td style="color:green; font-weight : bold;"><?=$ls['sothang']?></td>
                               <td style="color:green; font-weight : bold;"><?=$ls['heso']?></td>
                               <td style="color:red; font-weight : bold;"><?= number_format($ls['luongcoban'] * 26, $decimals = 0, $dec_point = ".", $thousands_sep = ","); ?> vnđ</td>
                               <td style="color:red; font-weight : bold;"><?= number_format($ls['sumsalary'], $decimals = 0, $dec_point = ".", $thousands_sep = ","); ?> vnđ</td>
                               <td><a href="index.php?page=manager&method=chitietluong&id=<?=$ls['id_nv']?>" class="btn btn-primary">Chi tiết</a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>