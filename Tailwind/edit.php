<?php
include_once './Models/Student.php';

$student = Student::show($_GET['id']);

if (isset($_POST['submit'])) {
    $response = Student::update([
        'id'         => $_POST['id'],
        'nama'       => $_POST['nama'],
        'nis'        => $_POST['nis'],
        'tempat'     => $_POST['tempat'],
        'tanggal'    => $_POST['tanggal'],
        'hobby'      => $_POST['hobby'],
    ]);

    setcookie('message', $response, time() + 10);
    header("Location: index.php");
}
?>

<?php include_once './layout/top.php';?> 
<?php include_once './layout/header.php';?>
            <form method="POST" action="" class="p-3">
                <input type="hidden" name="id" value="<?=$student['id']?>">
                <div class="mb-3">
                    <label class="text-white active:border-red-600" for="name">Nama</label>
                    <input class="text-black w-full bg-white border-b-2 border-black " type="text" name="nama" id="nama" value="<?=$student['nama']?>">
                </div>
                <div class="mb-3">
                    <label class="text-white" for="nis">Nis</label>
                    <input class="text-black w-full bg-white border-b-2 border-black" type="number" name="nis" id="nis" value="<?=$student['nis']?>">
                </div>
                <div class="mb-3">
                    <label class="text-white" for="tempat">Tempat Lahir</label>
                    <input class="text-black w-full bg-white border-b-2 border-black " type="text" name="tempat" id="tempat" value="<?=$student['tempat']?>">
                </div>
                <div class="mb-3">
                    <label class="text-white" for="tanggal">Tanggal Lahir</label>
                    <input class="text-black w-full bg-white border-b-2 border-black " type="date" name="tanggal" id="tanggal" value="<?=$student['tanggal']?>">
                </div>
                <div class="mb-3">
                    <label class="text-white" for="hobby">Hobby</label>
                    <input class="text-black w-full bg-white border-b-2 border-black " type="text" name="hobby" id="hobby" value="<?=$student['hobby']?>">
                </div>
                <div class="grid grap-3">
                    <button class="p-3 bg-blue-800 shadow-lg  text-white font-semibold rounded-md hover:bg-white hover:duration-300 hover:text-blue-800" name="submit" type="submit">Simpan</button>
                </div>
            </form>


<?php include_once './layout/bottom.php';?>

