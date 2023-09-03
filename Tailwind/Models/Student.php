<?php
include_once './route/DB.php';

class Student extends DB{

    public static function create($data){
        $nama = $data['nama'];
        $nis = $data['nis'];
        $tempat = $data['tempat'];
        $tanggal = $data['tanggal'];
        $hobby = $data['hobby'];
        $sql = "INSERT INTO murid (nama,nis,tempat,tanggal,hobby) VALUES ('$nama','$nis','$tempat','$tanggal','$hobby')";
        $result = DB::connect()->query($sql);

        if($result){
            return "Berhasil";
        }
        return "Gagal";
    }

    public static function index(){
        $sql = "SELECT * FROM murid";
        $result = DB::connect()->query($sql);
        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public static function show($id){
        $sql = "SELECT * FROM murid WHERE id = '$id'";
        $result = DB::connect()->query($sql);
        $data = $result->fetch_assoc();

        return $data;
    }

    public static function update($data){
        $nama = $data['nama'];
        $nis = $data['nis'];
        $tempat = $data['tempat'];
        $tanggal = $data['tanggal'];
        $hobby = $data['hobby'];
        $id  = $data['id'];
        $sql = "UPDATE murid SET nama = '$nama', nis = '$nis', tempat = '$tempat', tanggal = '$tanggal', hobby = '$hobby' WHERE id = '$id'";
        $result = DB::connect()->query($sql);

        if($result){
            return "Berhasil mengedit data";
        }
        return "Gagal";
    }

    public static function delete($id){
        $sql = "DELETE FROM murid WHERE id = '$id'";
        $result = DB::connect()->query($sql);

        if($result){
            return "Berhasil menghapus data";
        }
        return "Gagal menghapus data";
    }
}