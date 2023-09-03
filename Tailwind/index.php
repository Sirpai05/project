<?php
include_once './Models/Student.php';

$students = Student::index();

if (isset($_POST['submit'])) {
    $response = Student::create([
        'nama' => $_POST['nama'],
        'nis'  => $_POST['nis'],
        'tempat' => $_POST['tempat'],
        'tanggal' => $_POST['tanggal'],
        'hobby' => $_POST['hobby'],
    ]);

    setcookie('message', $response, time() + 5);
    header("Location: index.php");
}

if (isset($_POST['delete'])) {
    $response = Student::delete($_POST['id']);

    setcookie('message', $response, time() + 10);
    header("Location: index.php");    
}

?>
<?php include './layout/top.php'; ?>
<?php include './layout/header.php'; ?>
    <div class="basis-1/4 border-r border-slate-500">
        <div class="m-3 bg-green-500 rounded-lg">
            <form method="POST" action="" class="p-3">
                <div class="mb-3">
                    <label class="text-black active:border-red-600" for="name">Nama</label>
                    <input class="text-black w-full bg-slate-100 border-b-2 border-white " type="text" name="nama" id="nama" placeholder="JOKO">
                </div>
                <div class="mb-3">
                    <label class="text-black" for="nis">Nis</label>
                    <input class="text-black w-full bg-slate-100 border-b-2 border-white" type="number" name="nis" id="nis" placeholder="Nis">
                </div>
                <div class="mb-3">
                    <label class="text-black" for="tempat">Tempat Lahir</label>
                    <input class="text-black w-full bg-slate-100 border-b-2 border-white " type="text" name="tempat" id="tempat" placeholder="JAKARTA">
                </div>
                <div class="mb-3">
                    <label class="text-black" for="tanggal">Tanggal Lahir</label>
                    <input class="text-black w-full bg-slate-100 border-b-2 border-white " type="date" name="tanggal" id="tanggal">
                </div>
                <div class="mb-3">
                    <label class="text-black" for="hobby">Hobby</label>
                    <input class="text-black w-full bg-slate-100 border-b-2 border-white " type="text" name="hobby" id="hobby" placeholder="(Optional)">
                </div>
                <div class="grid grap-3">
                    <button class="p-3 bg-blue-500 shadow-lg  text-white font-semibold rounded-md hover:bg-slate-100 hover:duration-300 hover:text-blue-800" name="submit" type="submit">Kirim</button>
                </div>
            </form>
        </div>
    </div>
    <div class="basis-3/4 m-3">
        <div class="p-2 bg-slate-100 rounded-md">
            <div class="text-3xl text-slate-800 text-center font-bold mb-5">Data Siswa RPL</div>
            <table class="table-auto table-primary table-striped table-hover table-bordered table-sm table-responsive-sm w-full">
                <thead>
                    <tr class="border-2 border-black bg-blue-500">
                        <th class="text-black" scope="col">No</th>
                        <th class="text-black text-start" scope="col">Nama</th>
                        <th class="text-black text-start" scope="col">Nis</th>
                        <th class="text-black text-start" scope="col">Tempat Lahir</th>
                        <th class="text-black text-start" scope="col">Tanggal Lahir</th>
                        <th class="text-black" scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody class="border-2 border-black bg-slate-10	0">
                    <?php foreach ($students as $key => $student) : ?>
                        <tr class="border-2 border-slate-400">
                            <th class="text-black" scope="row"><?= $key + 1 ?></th>
                            <td class="text-black"><?= $student['nama'] ?></td>
                            <td class="text-black"><?= $student['nis'] ?></td>
                            <td class="text-black"><?= $student['tempat'] ?></td>
                            <td class="text-black"><?= $student['tanggal'] ?></td>
                            <td class="justify-center flex">
                                <a href="detail.php?id=<?= $student['id']?>" class="m-1 w-9 h-9  bg-blue-600 bg-opacity-50 rounded-xl hover:bg-opacity-90 hover:duration-150">
                                    <img class="m-2 w-5 h-5" src="assets/eye.png">
                                </a>
                                <a href="edit.php?id=<?= $student['id']?>" class="m-1 w-9 h-9  bg-blue-600 bg-opacity-50 rounded-xl hover:bg-opacity-90 hover:duration-150">
                                    <img class="m-2 w-5 h-5" src="assets/pencil.png" alt="">
                                </a>
                                <form action="" method="POST" class="inline">
                                    <input type="hidden" name="id"value="<?= $student['id']?>">
                                    <button type="submit" name="delete" class="m-1 w-9 h-9  bg-red-900 bg-opacity-70 rounded-xl hover:bg-opacity-100 hover:duration-150 ">
                                        <a href="index.php?op=delete&id=<?php echo $id?>" onclick="return confirm('Yakin mau delete data?')">
                                            
                                            <img class="m-2 w-5 h-5" src="assets/trash.png" alt="">
                                        </a>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include './layout/footer.php'; ?>
<?php include './layout/bottom.php'; ?>