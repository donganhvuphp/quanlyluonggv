<div class="row">
    <div class="col-md-10 center" style=" min-height: 500px;">
        <div class="row">
            <div class="col-md-7 center">
                <h1 class="text-center" style="color:red; font-weight: bold;">
                    Danh sách nhân viên
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php
                if (isset($_SESSION['check']) && $_SESSION['check'] == 1) {
                ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Thêm thành công!!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php
                 unset($_SESSION['check']);
                }elseif (isset($_SESSION['check']) && $_SESSION['check'] == 2) {
                    ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Xóa thành công!!</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php
                     unset($_SESSION['check']);
                    }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 center" style="display: flex;  flex-direction: row; background-color: white; border-radius: 20px;">
                <nav class="navbar navbar-expand-lg navbar-light" style="width: 100%;background-color: #e3f2fd;">
                    <a class="navbar-brand" href="#">Tìm kiếm</a>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <form class="form-inline my-2 my-lg-0" method="POST">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" name="name" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" name="search" type="submit">Search</button>
                            <a class="btn btn-success my-2 my-sm-0" href="index.php?page=manager&method=manager" style="margin-left:10px;" >Trang chủ</a>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
        <div class="row" style="margin-top : 30px;">
            <div class="col-md-4">
                <a href="index.php?page=manager&method=themmoinv" class="btn btn-primary">Thêm mới nhân viên</a>
            </div>
        </div>
        <div class="row" style="margin-top:30px;">
            <div class="col-md-12" style="display: flex;  flex-direction: row; border-radius : 10px; border : 1px solid rgb(221, 221, 221) ; padding: 20px;">
                <table class="table table-hover text-center">
                    <thead>
                        <tr>
                            <th scope="col">Tên nhân viên</th>
                            <th scope="col">Ngày sinh</th>
                            <th scope="col">Giới tính</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Phòng ban</th>
                            <th scope="col">Chức vụ</th>
                            <th scope="col">TDHV</th>
                            <th scope="col">HS lương</th>
                            <th scope="col" colspan="3">Tùy chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($danhSachNhanVien as $nv){
                        ?>
                            <tr>
                                <td><?=$nv['name']?></td>
                                <td><?=$nv['birthday']?></td>
                                <td><?php if($nv['gender'] == 1){ echo "Nam" ;}else{echo "Nữ";} ?></td>
                                <td><?=$nv['phone']?></td>
                                <td><?=$nv['address']?></td>
                                <td><?=$nv['namePB']?></td>
                                <td><?=$nv['nameCV']?></td>
                                <td><?=$nv['nameTDHV']?></td>
                                <td><?=$nv['HSL']?></td>
                                <td><a href="index.php?page=manager&method=suanv&manv=<?=$nv['id'];?>" class="btn btn-warning">Sửa</a></td>
                                <td><a href="index.php?page=manager&method=xoanv&manv=<?=$nv['id'];?>" onclick="return confirm('Bạn có muốn xóa lớp này không ?')"class="btn btn-info">Xóa</a></td>
                                <td><a href="index.php?page=manager&method=chuyenct&manv=<?=$nv['id'];?>" style="width: 138px;" class="btn btn-danger">Chuyển Công tác</a></td>
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
