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
            $sql = "SELECT tbl_lichsuluong.heso , tbl_lichsuluong.luongcoban , tbl_lichsuluong.phucap , tbl_lichsuluong.ktkl , tbl_lichsuluong.tienung , tbl_lichsuluong.workdays , tbl_lichsuluong.salary ,tbl_lichsuluong.current_time , tbl_nhanvien.name FROM tbl_lichsuluong , tbl_nhanvien WHERE tbl_lichsuluong.id_nv = tbl_nhanvien.id ORDER BY tbl_lichsuluong.id DESC LIMIT  $sll";
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
            $sql = "SELECT tbl_nhanvien.id ,tbl_nhanvien.id_hdld,tbl_nhanvien.id_phongban,tbl_nhanvien.id_tdhv,tbl_nhanvien.id_chucvu,tbl_nhanvien.id_hsl,tbl_nhanvien.id_phucap, tbl_nhanvien.from_day, tbl_nhanvien.to_day, tbl_nhanvien.name , tbl_nhanvien.birthday , tbl_nhanvien.gender , tbl_nhanvien.phone , tbl_nhanvien.address ,
             tbl_detail_hdld.name as 'nameHDLD' , tbl_hesoluong.heso as 'HSL' , tbl_nhanvien.luongcoban , tbl_phucap.name as 'namePC ',tbl_chucvu.name as 'nameCV' ,
              tbl_phongban.name as 'namePB' , tbl_trinhdohocvan.name as 'nameTDHV' FROM tbl_nhanvien , tbl_trinhdohocvan , tbl_phongban, tbl_chucvu , tbl_phucap , tbl_detail_hdld , tbl_hesoluong
               WHERE tbl_nhanvien.id_chucvu = tbl_chucvu.id AND tbl_nhanvien.id_phongban = tbl_phongban.id AND tbl_nhanvien.id_hdld = tbl_detail_hdld.id AND tbl_nhanvien.id_tdhv = tbl_trinhdohocvan.id 
               AND tbl_nhanvien.id_hsl = tbl_hesoluong.id AND tbl_nhanvien.id_phucap = tbl_phucap.id AND tbl_nhanvien.id = $id";
            $result = $this->con->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        // hiển thị danh sach sinh viên
        protected function danhSachNhanVien_m()
        {
            $sql = "SELECT tbl_nhanvien.id , tbl_nhanvien.name , tbl_nhanvien.birthday , tbl_nhanvien.gender , tbl_nhanvien.phone , tbl_nhanvien.address ,
             tbl_detail_hdld.name as 'nameHDLD' , tbl_hesoluong.heso as 'HSL' , tbl_nhanvien.luongcoban , tbl_phucap.name as 'namePC ',tbl_chucvu.name as 'nameCV' ,
              tbl_phongban.name as 'namePB' , tbl_trinhdohocvan.name as 'nameTDHV' FROM tbl_nhanvien , tbl_trinhdohocvan , tbl_phongban, tbl_chucvu , tbl_phucap , tbl_detail_hdld , tbl_hesoluong
               WHERE tbl_nhanvien.id_chucvu = tbl_chucvu.id AND tbl_nhanvien.id_phongban = tbl_phongban.id AND tbl_nhanvien.id_hdld = tbl_detail_hdld.id AND tbl_nhanvien.id_tdhv = tbl_trinhdohocvan.id 
               AND tbl_nhanvien.id_hsl = tbl_hesoluong.id AND tbl_nhanvien.id_phucap = tbl_phucap.id" ;
            $result = $this->con->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }
        
        // tim nhan vien theo phòng ban
        protected function timNhanVienPB_m($id)
        {
            $sql = "SELECT tbl_nhanvien.id , tbl_nhanvien.name , tbl_nhanvien.birthday , tbl_nhanvien.gender , tbl_nhanvien.phone , tbl_nhanvien.address ,
             tbl_detail_hdld.name as 'nameHDLD' , tbl_hesoluong.heso as 'HSL' , tbl_nhanvien.luongcoban , tbl_phucap.name as 'namePC', tbl_phucap.money as 'moneyPC',tbl_chucvu.name as 'nameCV' ,
              tbl_phongban.name as 'namePB' , tbl_trinhdohocvan.name as 'nameTDHV' FROM tbl_nhanvien , tbl_trinhdohocvan , tbl_phongban, tbl_chucvu , tbl_phucap , tbl_detail_hdld , tbl_hesoluong
               WHERE tbl_nhanvien.id_chucvu = tbl_chucvu.id AND tbl_nhanvien.id_phongban = tbl_phongban.id AND tbl_nhanvien.id_hdld = tbl_detail_hdld.id AND tbl_nhanvien.id_tdhv = tbl_trinhdohocvan.id 
               AND tbl_nhanvien.id_hsl = tbl_hesoluong.id AND tbl_nhanvien.id_phucap = tbl_phucap.id  AND tbl_nhanvien.id_phongban = $id" ;
            $result = $this->con->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        // tim nhan vien theo ten
        protected function timNhanVien_m($name)
        {
            $sql = "SELECT tbl_nhanvien.id , tbl_nhanvien.name , tbl_nhanvien.birthday , tbl_nhanvien.gender , tbl_nhanvien.phone , tbl_nhanvien.address ,
             tbl_detail_hdld.name as 'nameHDLD' , tbl_hesoluong.heso as 'HSL' , tbl_nhanvien.luongcoban , tbl_phucap.name as 'namePC ',tbl_chucvu.name as 'nameCV' ,
              tbl_phongban.name as 'namePB' , tbl_trinhdohocvan.name as 'nameTDHV' FROM tbl_nhanvien , tbl_trinhdohocvan , tbl_phongban, tbl_chucvu , tbl_phucap , tbl_detail_hdld , tbl_hesoluong
               WHERE tbl_nhanvien.id_chucvu = tbl_chucvu.id AND tbl_nhanvien.id_phongban = tbl_phongban.id AND tbl_nhanvien.id_hdld = tbl_detail_hdld.id AND tbl_nhanvien.id_tdhv = tbl_trinhdohocvan.id 
               AND tbl_nhanvien.id_hsl = tbl_hesoluong.id AND tbl_nhanvien.id_phucap = tbl_phucap.id  AND tbl_nhanvien.name LIKE '%$name%'" ;
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



        // danh sach
        protected function danhSachPB_m()
        {
            $sql = "SELECT * FROM `tbl_phongban`" ;
            $result = $this->con->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        protected function danhSachKTKL()
        {
            $sql ="SELECT * FROM `tbl_khenthuongkyluat`";
            $result = $this->con->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        protected function danhSachCV_m()
        {
            $sql = "SELECT * FROM `tbl_chucvu`" ;
            $result = $this->con->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        protected function danhSachTDHV_m()
        {
            $sql = "SELECT * FROM `tbl_trinhdohocvan`" ;
            $result = $this->con->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        protected function danhSachPC_m()
        {
            $sql = "SELECT * FROM `tbl_phucap`";
            $result = $this->con->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        protected function danhSachHSL_m()
        {
            $sql ="SELECT * FROM `tbl_hesoluong`" ;
            $result = $this->con->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        protected function danhSachHDLD_m()
        {
            $sql = "SELECT * FROM `tbl_detail_hdld` ";
            $result = $this->con->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

    }
?>