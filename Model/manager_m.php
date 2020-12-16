<?php
    include_once "config/config.php";

    class Manager_m extends Connect
    {
        function __construct()
        {
            parent::__construct();
        }

        //inbao cáo bảng lương
        protected function bangLuong_m($sll){
            $sql = "SELECT ls.heso , ls.luongcoban , ls.phucap , ls.ktkl , ls.tienung , ls.workdays , ls.salary ,ls.current_time , tbl_nhanvien.name FROM tbl_lichsuluong ls, tbl_nhanvien WHERE ls.id_nv = tbl_nhanvien.id ORDER BY ls.id DESC LIMIT  $sll";
            $result = $this->con->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        //them vao bang lich su luong
        protected function themLichSuLuong_m($id_nv, $heso, $luongcoban, $phucap, $ktkl,$tienung, $workdays ,$salary, $current_time)
        {
            $sql = "INSERT INTO `tbl_lichsuluong`(`id_nv`, `heso`, `luongcoban`, `phucap`, `ktkl`,`tienung`, `workdays`, `salary`, `current_time`) VALUES (:id_nv, :heso, :luongcoban, :phucap, :ktkl,:tienung, :workdays,:salary, :current_time)";
            $result = $this->con->prepare($sql);
            $result->bindParam(":id_nv" , $id_nv);
            $result->bindParam(":heso" , $heso);
            $result->bindParam(":phucap" , $phucap);
            $result->bindParam(":ktkl" , $ktkl);
            $result->bindParam(":workdays" , $workdays);
            $result->bindParam(":current_time" , $current_time);
            $result->bindParam(":luongcoban" , $luongcoban);
            $result->bindParam(":salary" , $salary);
            $result->bindParam(":tienung" , $tienung);
            $result->execute();
        }

        //chuyen cong tac
        protected function chuyenCT_m($id,$name, $birthday, $gender, $phone, $address, $id_hdld, $from_day, $to_day, $id_chucvu, $id_phongban, $id_tdhv, $id_hsl, $luongcoban, $id_phucap)
        {
            $sql = "UPDATE `tbl_nhanvien` SET `name`=:name,`birthday`=:birthday,`gender`=:gender,`phone`=:phone,`address`=:address,`id_hdld`=:id_hdld,`from_day`=:from_day,`to_day`=:to_day,`id_chucvu`=:id_chucvu,`id_phongban`=:id_phongban,`id_tdhv`=:id_tdhv,`id_hsl`=:id_hsl,`luongcoban`=:luongcoban,`id_phucap`=:id_phucap WHERE `id` = $id";
            $result = $this->con->prepare($sql);
            $result->bindParam(":name", $name);
            $result->bindParam(":birthday" , $birthday);
            $result->bindParam(":gender" , $gender);
            $result->bindParam(":phone" , $phone);
            $result->bindParam(":address" , $address);
            $result->bindParam(":id_hdld" , $id_hdld);
            $result->bindParam(":from_day" , $from_day);
            $result->bindParam(":to_day" , $to_day);
            $result->bindParam(":id_chucvu" , $id_chucvu);
            $result->bindParam(":id_phongban" , $id_phongban);
            $result->bindParam(":id_tdhv" , $id_tdhv);
            $result->bindParam(":id_hsl" , $id_hsl);
            $result->bindParam(":luongcoban" , $luongcoban);
            $result->bindParam(":id_phucap" , $id_phucap);
            $result->execute();
        }

        // hiển thị danh sach sinh viên theo id
        protected function chiTietNhanVien_m($id)
        {
            $sql = "SELECT nv.id ,nv.id_hdld,nv.id_phongban,nv.id_tdhv,nv.id_chucvu,nv.id_hsl,nv.id_phucap, nv.from_day, nv.to_day, nv.name , nv.birthday , nv.gender , nv.phone , nv.address ,
             tbl_detail_hdld.name as 'nameHDLD' , tbl_hesoluong.heso as 'HSL' , nv.luongcoban , tbl_phucap.name as 'namePC ',tbl_chucvu.name as 'nameCV' ,
              tbl_phongban.name as 'namePB' , tbl_trinhdohocvan.name as 'nameTDHV' FROM tbl_nhanvien nv, tbl_trinhdohocvan , tbl_phongban, tbl_chucvu , tbl_phucap , tbl_detail_hdld , tbl_hesoluong
               WHERE nv.id_chucvu = tbl_chucvu.id AND nv.id_phongban = tbl_phongban.id AND nv.id_hdld = tbl_detail_hdld.id AND nv.id_tdhv = tbl_trinhdohocvan.id 
               AND nv.id_hsl = tbl_hesoluong.id AND nv.id_phucap = tbl_phucap.id AND nv.id = $id";
            $result = $this->con->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        // hiển thị danh sach sinh viên
        protected function danhSachNhanVien_m()
        {
            $sql = "SELECT nv.id , nv.name , nv.birthday , nv.gender , nv.phone , nv.address ,
             tbl_detail_hdld.name as 'nameHDLD' , tbl_hesoluong.heso as 'HSL' , nv.luongcoban , tbl_phucap.name as 'namePC ',tbl_chucvu.name as 'nameCV' ,
              tbl_phongban.name as 'namePB' , tbl_trinhdohocvan.name as 'nameTDHV' FROM tbl_nhanvien nv, tbl_trinhdohocvan , tbl_phongban, tbl_chucvu , tbl_phucap , tbl_detail_hdld , tbl_hesoluong
               WHERE nv.id_chucvu = tbl_chucvu.id AND nv.id_phongban = tbl_phongban.id AND nv.id_hdld = tbl_detail_hdld.id AND nv.id_tdhv = tbl_trinhdohocvan.id 
               AND nv.id_hsl = tbl_hesoluong.id AND nv.id_phucap = tbl_phucap.id" ;
            $result = $this->con->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }
        
        // tim nhan vien theo phòng ban
        protected function timNhanVienPB_m($id)
        {
            $sql = "SELECT nv.id , nv.name , nv.birthday , nv.gender , nv.phone , nv.address ,
             tbl_detail_hdld.name as 'nameHDLD' , tbl_hesoluong.heso as 'HSL' , nv.luongcoban , tbl_phucap.name as 'namePC', tbl_phucap.money as 'moneyPC',tbl_chucvu.name as 'nameCV' ,
              tbl_phongban.name as 'namePB' , tbl_trinhdohocvan.name as 'nameTDHV' FROM tbl_nhanvien nv , tbl_trinhdohocvan , tbl_phongban, tbl_chucvu , tbl_phucap , tbl_detail_hdld , tbl_hesoluong
               WHERE nv.id_chucvu = tbl_chucvu.id AND nv.id_phongban = tbl_phongban.id AND nv.id_hdld = tbl_detail_hdld.id AND nv.id_tdhv = tbl_trinhdohocvan.id 
               AND nv.id_hsl = tbl_hesoluong.id AND nv.id_phucap = tbl_phucap.id  AND nv.id_phongban = $id" ;
            $result = $this->con->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        //lịch sử lương
        protected function LichSuLuong_m()
        {
            $sql = "SELECT ls.id, ls.id_nv , COUNT(ls.id_nv) as 'sothang', ls.heso, ls.luongcoban, ls.phucap,ls.ktkl, ls.tienung, ls.workdays, SUM(ls.salary) as 'sumsalary', ls.current_time ,tbl_nhanvien.name FROM tbl_lichsuluong ls, tbl_nhanvien WHERE ls.id_nv = tbl_nhanvien.id
            GROUP BY ls.id_nv";
            $result = $this->con->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        protected function chiTietLS_Luong_m($id)
        {
            $sql = "SELECT ls.id, ls.id_nv , ls.heso, ls.luongcoban, ls.phucap,ls.ktkl, ls.tienung, ls.workdays, ls.salary, ls.current_time ,tbl_nhanvien.name FROM tbl_lichsuluong ls, tbl_nhanvien WHERE ls.id_nv = tbl_nhanvien.id AND ls.id_nv = $id";
            $result = $this->con->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        //báo cáo nhân viên tăng lương
        protected function danhSachNV_tangluong()
        {
            $sql = "SELECT ls.id, ls.id_nv , COUNT(ls.id_nv) as 'sothang', ls.heso, ls.luongcoban, ls.phucap, ls.ktkl, ls.tienung, ls.workdays, ls.salary, ls.current_time , tbl_nhanvien.name FROM tbl_lichsuluong ls, tbl_nhanvien WHERE ls.id_nv = tbl_nhanvien.id GROUP BY ls.id_nv HAVING sothang >= 12";
            $result = $this->con->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);

        }

        //báo cáo nhân viên sắp về hưu
        protected function danhSachNV_vehuu()
        {
            $sql = "SELECT ROUND(DATEDIFF(CURDATE(), birthday) / 365, 0) AS 'age' ,id, name , luongcoban
            FROM tbl_nhanvien GROUP BY name HAVING age >= 55" ;
            $result = $this->con->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        // tim nhan vien theo ten
        protected function timNhanVien_m($name)
        {
            $sql = "SELECT nv.id , nv.name , nv.birthday , nv.gender , nv.phone , nv.address ,
             tbl_detail_hdld.name as 'nameHDLD' , tbl_hesoluong.heso as 'HSL' , nv.luongcoban , tbl_phucap.name as 'namePC ',tbl_chucvu.name as 'nameCV' ,
              tbl_phongban.name as 'namePB' , tbl_trinhdohocvan.name as 'nameTDHV' FROM tbl_nhanvien nv, tbl_trinhdohocvan , tbl_phongban, tbl_chucvu , tbl_phucap , tbl_detail_hdld , tbl_hesoluong
               WHERE nv.id_chucvu = tbl_chucvu.id AND nv.id_phongban = tbl_phongban.id AND nv.id_hdld = tbl_detail_hdld.id AND nv.id_tdhv = tbl_trinhdohocvan.id 
               AND nv.id_hsl = tbl_hesoluong.id AND nv.id_phucap = tbl_phucap.id  AND nv.name LIKE '%$name%'" ;
            $result = $this->con->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        // them nhan vien vao bang nhan vien
        protected function ThemNhanVien_m($name, $birthday, $gender, $phone, $address, $id_hdld, $from_day, $to_day, $id_chucvu, $id_phongban, $id_tdhv, $id_hsl, $luongcoban, $id_phucap)
        {
            $sql = "INSERT INTO `tbl_nhanvien`(`name`, `birthday`, `gender`, `phone`, `address`, `id_hdld`, `from_day`, `to_day`, `id_chucvu`, `id_phongban`, `id_tdhv`, `id_hsl`, `luongcoban`, `id_phucap`)
             VALUES (:name, :birthday, :gender, :phone, :address, :id_hdld, :from_day, :to_day, :id_chucvu, :id_phongban, :id_tdhv, :id_hsl, :luongcoban, :id_phucap )" ;
            $result = $this->con->prepare($sql);
            $result->bindParam(":name", $name);
            $result->bindParam(":birthday" , $birthday);
            $result->bindParam(":gender" , $gender);
            $result->bindParam(":phone" , $phone);
            $result->bindParam(":address" , $address);
            $result->bindParam(":id_hdld" , $id_hdld);
            $result->bindParam(":from_day" , $from_day);
            $result->bindParam(":to_day" , $to_day);
            $result->bindParam(":id_chucvu" , $id_chucvu);
            $result->bindParam(":id_phongban" , $id_phongban);
            $result->bindParam(":id_tdhv" , $id_tdhv);
            $result->bindParam(":id_hsl" , $id_hsl);
            $result->bindParam(":luongcoban" , $luongcoban);
            $result->bindParam(":id_phucap" , $id_phucap);
            $result->execute();
        }



        // danh sach phong ban
        protected function danhSachPB_m()
        {
            $sql = "SELECT * FROM `tbl_phongban`" ;
            $result = $this->con->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        protected function themPB_m($name)
        {
            $sql = "INSERT INTO `tbl_phonban`(`name`) VALUES (:name)";
            $result = $this->con->prepare($sql);
            $result->bindParam(":name", $name);
            $result->execute();
        }

        // khen thưởng kỷ luật
        protected function danhSachKTKL()
        {
            $sql ="SELECT * FROM `tbl_khenthuongkyluat`";
            $result = $this->con->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        // chưc vụ
        protected function danhSachCV_m()
        {
            $sql = "SELECT * FROM `tbl_chucvu`" ;
            $result = $this->con->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        protected function themCV_m($name)
        {
            $sql = "INSERT INTO `tbl_chucvu`(`name`) VALUES (:name)";
            $result = $this->con->prepare($sql);
            $result->bindParam(":name", $name);
            $result->execute();
        }

        // trình độ học vấn
        protected function danhSachTDHV_m()
        {
            $sql = "SELECT * FROM `tbl_trinhdohocvan`" ;
            $result = $this->con->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        protected function themTDHV_m($name)
        {
            $sql = "INSERT INTO `tbl_trinhdohocvan`(`name`) VALUES (:name)";
            $result = $this->con->prepare($sql);
            $result->bindParam(":name", $name);
            $result->execute();
        }

        // phụ cấp
        protected function danhSachPC_m()
        {
            $sql = "SELECT * FROM `tbl_phucap`";
            $result = $this->con->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        // hệ số lương
        protected function danhSachHSL_m()
        {
            $sql ="SELECT * FROM `tbl_hesoluong`" ;
            $result = $this->con->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        // hợp đồng lao động
        protected function danhSachHDLD_m()
        {
            $sql = "SELECT * FROM `tbl_detail_hdld` ";
            $result = $this->con->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

    }
?>