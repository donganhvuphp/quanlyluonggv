<div class="row">
    <div class="col-md-10 center" style="border-radius: 20px; height: auto;">
        <div class="row">
            <div class="col-md-7 center">
                <h1 class="text-center" style="color:red; font-weight: bold;">
                    Quản trị chức vụ
                </h1>
            </div>
        </div>
        <div class="row" style="margin-top:30px;">
            <div class="col-md-12" style="display: flex;  flex-direction: row; border-radius : 10px; border : 1px solid rgb(221, 221, 221) ; padding: 20px;">
                <table class="table table-hover text-center">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tên chức vụ</th>
                            <th scope="col" colspan="2">Tùy chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($danhSachCV as $cv) {
                        ?>
                            <tr>
                                <td style="color:green; font-weight : bold;"><?= $cv['id'] ?></td>
                                <td style="color:green; font-weight : bold;"><?= $cv['name'] ?></td>
                                <td> <a href="#" class="btn btn-danger">Sửa</a></td>
                                <td> <a href="#" class="btn btn-warning">Xóa</a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row" style="margin-top : 30px;">
            <div class="col-md-4">
                <form method="POST">
                    <div class="form-group">
                        <label for="name">Tên chức vụ</label>
                        <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter name">
                    </div>
                    <button type="submit" name="themcv" class="btn btn-primary">Thêm chức vụ</button>
                </form>
            </div>
        </div>
    </div>
</div>