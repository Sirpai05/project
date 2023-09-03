<?php

include_once './Models/Student.php';

$id = $_GET['id'];
$student = Student::show($id);
?>

<?php include_once './layout/top.php';?> 
<?php include_once './layout/header.php';?>


        <div class="basis-1/5">
            <p class="font-bold">Nama:</p>
            <p class="font-bold">Nis:</p>
            <p class="font-bold">Tempat Lahir:</p>
            <p class="font-bold">Tanggal Lahir:</p>
            <p class="font-bold">Hobby:</p>
        </div>
        <div class="basis-4/5">
            <p><?= $student['nama'] ?></p>
            <p><?= $student['nis'] ?></p>
            <p><?= $student['tempat'] ?></p>
            <p><?= $student['tanggal'] ?></p>
            <p><?= $student['hobby'] ?></p>
        </div>

    <a href="index.php">
    <button class="p-3 bg-blue-800 shadow-lg  text-white font-semibold rounded-md hover:bg-white hover:duration-300 hover:text-blue-800" name="submit" type="submit">Kembali
        </div>
    </a>
    <?php include_once './layout/footer.php';?>
<?php include_once './layout/bottom.php';?>