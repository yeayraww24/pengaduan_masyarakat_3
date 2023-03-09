<head>
<?php 
include('conn/koneksi.php');
if(isset($_POST['daftar'])){
    @session_start();
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $telp = $_POST['telp'];

    $u = mysqli_query($koneksi, "SELECT * from masyarakat WHERE username='$username'");
    $r = mysqli_num_rows($u);
    if($r == 1){
        ?> 
            echo "<script>alert('Daftar gagal kak,cek lagi ya!')</script>";
        <?php
    }else{
        $q = mysqli_query($koneksi, "INSERT INTO `masyarakat` (`nik`, `nama`, `username`, `password`, `telp`) VALUES ('$nik', '$nama', '$username', '$password', '$telp');");
    ?> 
        echo "<script>alert('Daftar Berhasil ! Tunggu Verifikasi dari Admin!')</script>";
    <?php
    }
    
}

?>
	<title>Aplikasi Pengaduan Masyarakat</title>
	<link rel="shortcut icon" href="https://cepatpilih.com/image/logo.png">
	<title>Aplikasi Pengaduan Masyarakat</title>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">

</head>
<body style="background: url(img/depanlogin.JFIF); background-size: cover;">

	<div class="container">
        <div class="card" style="padding: 50px; width: 40%; margin: 0 auto; margin-top: 10%;">
            <h3 style="text-align: center;" class="blue-text">Register Disini</h3>

            <form method="POST">
                <div class="input_field">
                    <labe class="form-label" for="username">Username</label>
                    <input class="form-control" id="username" type="text" name="username" required>
                </div>
                <div class="input_field">
                    <label class="form-label" for="password">Password</label>
                    <input class="form-control" id="password" type="password" name="password" required>
                </div>
                <div class="input_field">
                    <label class="form-label" for="nik">NIK</label>
                    <input class="form-control" id="nik" type="text" name="nik" required>
                </div>
                <div class="input_field">
                    <label class="label" for="nama">Nama</label>
                    <input class="form-control" id="nama" type="text" name="nama" required>
                </div>
                <div class="input_field mb-3">
                    <label class="form-label" for="telp">No Telpon</label>
                    <input class="form-control" id="telp" type="number" name="telp" required>
                </div>
                <input type="submit" name="daftar" value="daftar" class="btn btn-primary" style="width: 100%;">
                <a class="inline-block right-0 align-baseline font-bold text-sm text-500 hover:text-blue-800" href="index.php">
                Sudah Registrasi?
                </a>
            </form>
        </div>
	</div>
</body>