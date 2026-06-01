<?php
class SinhVien {
    private $hoTen;
    private $gioiTinh;
    private $ngaySinh;
    private $diemTB;

    public function __construct($hoTen, $gioiTinh, $ngaySinh, $diemTB){
        $this->hoTen = $hoTen;
        $this->gioiTinh = $gioiTinh;
        $this->ngaySinh = $ngaySinh;
        $this->diemTB = $diemTB;
    }
    public function getHoTen(){
        return $this->hoTen;
    }

    public function setHoTen($hoTen){
        $this->hoTen = $hoTen;
    }

    public function getGioiTinh(){
        return $this->gioiTinh;
    }

    public function setGioiTinh($gioiTinh){
        $this->gioiTinh = $gioiTinh;
    }

    public function getNgaySinh(){
        return $this->ngaySinh;
    }

    public function setNgaySinh($ngaySinh){
        $this->ngaySinh = $ngaySinh;
    }

    public function getDiemTB(){
        return $this->diemTB;
    }

    public function setDiemTB($diemTB){
        $this->diemTB = $diemTB;
    }
    public function hienThiThongTin(){
        echo "Họ tên: " . $this->getHoTen() . "<br>";
        echo "Giới tính: " . $this->getGioiTinh() . "<br>";
        echo "Ngày sinh: " . $this->getNgaySinh() . "<br>";
        echo "Điểm trung bình: " . $this->getDiemTB() . "<br>";
    }
}

$sv = new SinhVien("Kim Yến", "Nữ", "26/11/2007", 10.0);
$sv->hienThiThongTin();
?>