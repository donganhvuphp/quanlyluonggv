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
        <h2 class="text-center">THÔNG BÁO</h2>
        <br>
        <h5 style="padding-left:200px;">Danh sách nhân viên sắp về hưu :</h5>
    </div>
</div>
<div class="row" style="margin-top:30px;">
    <div class="col-md-10 center" style="display: flex;  flex-direction: row; border-radius : 10px; border : 1px solid rgb(221, 221, 221) ; padding: 20px;">
        <table border="1">
            <thead>
                <tr>
                    <th style="padding:19px 70px 19px 60px;" scope="col">Tên nhân viên</th>
                    <th style="padding:19px 70px 19px 60px;" scope="col">Số tuổi</th>
                    <th style="padding:19px 70px 19px 60px;" scope="col">Lương cơ bản</th>
                    <th style="padding:19px 70px 19px 60px;" scope="col">Lịch sử lương</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($danhSachNV_vehuu)) {
                    foreach ($danhSachNV_vehuu as $nv) {
                ?>
                        <tr>
                            <td style="padding: 19px 70px 19px 60px; text-center "><?= $nv['name'] ?></td>
                            <td style="padding: 19px 70px 19px 60px; text-center "><?= $nv['age'] ?></td>
                            <td style="padding: 19px 70px 19px 60px; text-center ; color:red; font-weight : bold;"><?= number_format($nv['luongcoban'] * 26, $decimals = 0, $dec_point = ".", $thousands_sep = ","); ?> vnđ</td>
                            <td  style="padding: 19px 70px 19px 60px; text-center "><a href="index.php?page=manager&method=chitietluong&id=<?=$nv['id']?>" class="btn btn-danger">Chi tiết</a></td>
                        </tr>
                <?php
                    }
                }else{
                    header('Location:index.php?page=manager&method=baocao');
                }
                ?>
            </tbody>
        </table>
    </div>
</div>