<?php
    include_once "Model/manager_m.php";

    class Manager_c extends Manager_m
    {
        private $manager ;
        function __construct()
        {
            $this->manager = new Manager_m();
        }

        public function manager_c()
        {
            include_once "Views/manager/manager.php";
        }

        public function luongnv_c()
        {
            include_once "Views/manager/luong/luong.php";
        }

        public function tinhLuong_c()
        {   
            $danhSachPB = $this->manager->danhSachPB_m();
            $danhSachKTKL = $this->manager->danhSachKTKL();
            if(isset($_POST['phongban'])){
                $id = $_POST['id'];
                $danhSachNV = $this->manager->timNhanVienPB_m($id);
                $_SESSION['sll'] = count($danhSachNV);
           
            }
            include_once "Views/manager/luong/tinhluong.php";
        }

        public function baoCaoLuong_m()
        {
            if(isset($_SESSION['sll'])){
                $bangLuong = $this->manager->bangLuong_m($_SESSION['sll']);
            }
            include_once "Views/manager/luong/bangluong.php";
        }

        public function chuyenCT()
        {
            $danhSachPC = $this->manager->danhSachPC_m();
            $danhSachHSL = $this->manager->danhSachHSL_m();
            $danhSachHDLD = $this->manager->danhSachHDLD_m();
            $danhSachPB = $this->manager->danhSachPB_m();
            $danhSachCV = $this->manager->danhSachCV_m() ;
            $danhSachTDHV = $this->manager->danhSachTDHV_m();
            if(isset($_GET['manv'])){
                $id = (int)$_GET['manv'];
                $nhanVien = $this->manager->chiTietNhanVien_m($id);
            }
            include_once "Views/manager/nhanvien/chuyenct.php";
        }
        public function danhSachNhanVien_c()
        {
            if(isset($_POST['search'])){
                $name = $_POST['name'];
                $danhSachNhanVien = $this->manager->timNhanVien_m($name);
            }else{
                $danhSachNhanVien = $this->manager->danhSachNhanVien_m();
            }
            include_once "Views/manager/nhanvien/thongtinnhanvien.php";
        }

        public function themNhanVien_c()
        {   
            $danhSachPC = $this->manager->danhSachPC_m();
            $danhSachHSL = $this->manager->danhSachHSL_m();
            $danhSachHDLD = $this->manager->danhSachHDLD_m();
            $danhSachPB = $this->manager->danhSachPB_m();
            $danhSachCV = $this->manager->danhSachCV_m() ;
            $danhSachTDHV = $this->manager->danhSachTDHV_m();
            include_once "Views/manager/nhanvien/themnv.php";
        }

        public function option()
        {
            if(isset($_GET['method'])){
                $method = $_GET['method'];
            }else{
                $method = 'manager';
            }
            switch ($method) {
                case 'manager':
                    $this->manager_c();
                    break;
                case 'themmoinv':
                    $this->themNhanVien_c();
                    if(isset($_POST['themnv'])){
                        $name = $_POST['name'];
                        $birthday = $_POST['birthday'];
                        $gender = $_POST['gender'];
                        $phone = $_POST['phone'];
                        $address = $_POST['address'];
                        $id_hdld =$_POST['id_hdld'];
                        $from_day =$_POST['from_day'];
                        $to_day =$_POST['to_day'];
                        $id_chucvu = $_POST['id_chucvu'];
                        $id_phongban = $_POST['id_phongban'];
                        $id_tdhv = $_POST['id_tdhv'];
                        $id_hsl = $_POST['id_hsl'];
                        $luongcoban = $_POST['luongcoban'];
                        $id_phucap = $_POST['id_phucap'];

                        if(isset($name) && !empty($name) && isset($birthday) && !empty($birthday) && isset($gender)  && isset($phone) && !empty($phone) && isset($address) && !empty($address) && isset($id_chucvu) &&  isset($id_phongban) && isset($id_tdhv)){
                            $_SESSION['check'] = 1 ;
                            $this->manager->ThemNhanVien_m($name, $birthday, $gender, $phone, $address, $id_hdld, $from_day, $to_day, $id_chucvu, $id_phongban, $id_tdhv, $id_hsl, $luongcoban, $id_phucap);
                            header("Location:index.php?page=manager&method=thongtinnhanvien");
                        }else{
                            $_SESSION['error'] = 1 ;
                            header("Location:index.php?page=manager&method=themnv");
                        }
                    }
                    break;
                case 'thongtinnhanvien':
                    $this->danhSachNhanVien_c();
                    break ;
                case 'luongnv':
                    $this->luongnv_c();
                    break;
                case 'tinhluong':
                    $this->tinhLuong_c();
                    if(isset($_POST['tinhluong'])){
                        $id_nv = $_POST['id_nv'];
                        $name = $_POST['name'];
                        $phone = $_POST['phone'];
                        $chucvu = $_POST['chucvu'];
                        $tdhv = $_POST['tdhv'];
                        $heso = $_POST['heso'];
                        $luongcoban = $_POST['luongcoban'];
                        $phucap = $_POST['phucap'];
                        $tienUng = $_POST['tienUng'];
                        $current_time = $_POST['current_time'];
                        $ktkl = $_POST['ktkl'];
                        $workdays = $_POST['workdays'];
                        if(isset($id_nv) && !empty($id_nv)){
                            for ($i= 0; $i < $_SESSION['sll'] ; $i++) { 
                                if((int)$workdays[$i] < 25){
                                    $pc = 0;
                                }else{
                                    $pc = $phucap[$i];
                                }
                                $salary = ((float)$heso[$i] * (int)$luongcoban[$i] *  (int)$workdays[$i]) + $pc + (int)$ktkl[$i] - (int)$tienUng[$i] ;
                                $this->manager->themLichSuLuong_m($id_nv[$i], $heso[$i], $luongcoban[$i], $pc, $ktkl[$i],$tienUng[$i], $workdays[$i], $salary,$current_time);
                            }
                            header("Location:index.php?page=manager&method=baocaoluong");
                        }
                    }
                    break ;
                case 'baocaoluong' :
                    $this->baoCaoLuong_m();
                    break ;
                case 'chuyenct' : 
                    $this->chuyenCT();
                    if(isset($_POST['chuyenct'])){
                        $id = $_POST['id'] ;
                        $name = $_POST['name'];
                        $birthday = $_POST['birthday'];
                        $gender = $_POST['gender'];
                        $phone = $_POST['phone'];
                        $address = $_POST['address'];
                        $id_hdld =$_POST['id_hdld'];
                        $from_day =$_POST['from_day'];
                        $to_day =$_POST['to_day'];
                        $id_chucvu = $_POST['id_chucvu'];
                        $id_phongban = $_POST['id_phongban'];
                        $id_tdhv = $_POST['id_tdhv'];
                        $id_hsl = $_POST['id_hsl'];
                        $luongcoban = $_POST['luongcoban'];
                        $id_phucap = $_POST['id_phucap'];

                        if(isset($name) && !empty($name) && isset($birthday) && !empty($birthday) && isset($gender)  && isset($phone) && !empty($phone) && isset($address) && !empty($address) && isset($id_chucvu) &&  isset($id_phongban) && isset($id_tdhv)){
                            $_SESSION['check'] = 1 ;
                            $this->manager->chuyenCT_m($id,$name, $birthday, $gender, $phone, $address, $id_hdld, $from_day, $to_day, $id_chucvu, $id_phongban, $id_tdhv, $id_hsl, $luongcoban, $id_phucap);
                            header("Location:index.php?page=manager&method=thongtinnhanvien");
                        }else{
                            $_SESSION['error'] = 1 ;
                            header("Location:index.php?page=manager&method=themnv");
                        }
                    }
                    break ;
                default:
                header("Location:404.html");
                    break;
            }
        }
    }
?>