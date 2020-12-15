<div class="row">
    <div class="col-md-12">
        <h4 class="text-center">Cộng hòa xã hội chủ nghĩa việt nam</h4>
        <h4 class="text-center">Độc lập- Tự do - Hạnh phúc</h4>
        <br>
        <br>
        <h5 style="padding-left:500px;" class="text-center">Hà nội ,ngày <script>
                var d = new Date();
                document.write(d.getDate());
            </script> tháng <script>
                document.write(d.getMonth() + 1);
            </script> năm <script>
                document.write(d.getFullYear());
            </script>
        </h5>
        <br>
        <h2 class="text-center">BÁO CÁO LƯƠNG</h2>
        <br>
        <h5 style="padding-left:200px;">Bảng lương : <?= $_SESSION['pb']; ?></h5>
    </div>
</div>
<div class="row" style="margin-top:30px;">
    <div class="col-md-10 center" style="display: flex;  flex-direction: row; border-radius : 10px; border : 1px solid rgb(221, 221, 221) ; padding: 20px;">
        <table border="1">
            <thead>
                <tr>
                    <th style="padding: 19px;" scope="col">Tên nhân viên</th>
                    <th style="padding: 19px;" scope="col">Hệ số</th>
                    <th style="padding: 19px;" scope="col">Tiền thưởng</th>
                    <th style="padding: 19px;" scope="col">Tiền ứng</th>
                    <th style="padding: 19px;" scope="col">Lương cơ bản</th>
                    <th style="padding: 19px;" scope="col">Phụ cấp</th>
                    <th style="padding: 19px;" scope="col">Số công</th>
                    <th style="padding: 19px;" scope="col">Tổng lương</th>
                    <th style="padding: 19px;" scope="col">Thời gian</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($bangLuong as $nv) {
                ?>
                    <tr>
                        <td style="padding: 19px;"><?=$nv['name']?></td>
                        <td style="padding: 19px;"><?=$nv['heso']?></td>
                        <td style="padding: 19px;"><?=$nv['ktkl']?></td>
                        <td style="padding: 19px;"><?=$nv['tienung']?></td>
                        <td style="padding: 19px;"><?=$nv['luongcoban']?></td>
                        <td style="padding: 19px;"><?=$nv['phucap']?></td>
                        <td style="padding: 19px;"><?=$nv['workdays']?></td>
                        <td style="padding: 19px; color:red; font-weight : bold;"><?=number_format($nv['salary'] ,$decimals = 0, $dec_point = ".", $thousands_sep = ",");?> vnđ</td>
                        <td style="padding: 19px;"><?=$nv['current_time']?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>