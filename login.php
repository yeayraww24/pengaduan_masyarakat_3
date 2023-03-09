
<div class="card" style="padding: 50px; width: 40%; margin: 0 auto; margin-top: 10%;">
<h3 style="text-align: center;" class="blue-text">Login Disini</h3>

	<form method="POST">
		<div class="input_field">
			<label for="username">Username</label>
			<input id="username" type="text" name="username" required>
		</div>
		<div class="input_field">
			<label for="password">Passoword</label>
			<input id="password" type="password" name="password" required>
		</div>
		<select class="form-select" aria-label="Default select example">
  <option selected>Pilihan</option>
  <option value="Masyarakat">Masyarakat</option>
  <option value="Petugas">Petugas</option>
  <option value="Admin">Admin</option>
</select>
		<input type="submit" name="login" value="Login" class="btn blue" style="width: 100%;">
		<a class="inline-block right-0 align-baseline font-bold text-sm text-500 hover:text-blue-800" href="register.php">
          Belum Registrasi?
        </a>
	</form>
</div>
<?php 
	if(isset($_POST['login'])){
		$username = mysqli_real_escape_string($koneksi,$_POST['username']);
		$password = mysqli_real_escape_string($koneksi,md5($_POST['password']));
		echo $username;
	
		$sql = mysqli_query($koneksi,"SELECT * FROM masyarakat WHERE username='$username' AND password='$password' AND verif = '1'");
		$cek = mysqli_num_rows($sql);
		$data = mysqli_fetch_assoc($sql);
	
		$sql2 = mysqli_query($koneksi,"SELECT * FROM petugas WHERE username='$username' AND password='$password' ");
		$cek2 = mysqli_num_rows($sql2);
		$data2 = mysqli_fetch_assoc($sql2);

		if($cek>0){
			session_start();
			$_SESSION['username']=$username;
			$_SESSION['data']=$data;
			$_SESSION['level']='masyarakat';
			header('location:masyarakat/');     
		}
		elseif($cek2>0){
			if($data2['level']=="admin"){
				session_start();
				$_SESSION['username']=$username;
				$_SESSION['data']=$data2;
				header('location:admin/');
			}
			elseif($data2['level']=="petugas"){
				session_start();
				$_SESSION['username']=$username;
				$_SESSION['data']=$data2;
				header('location:petugas/');
			}
		}
		else{
			echo "<script>alert('loginynya gagal kak,cek lagi ya!')</script>";
		}

	}
 ?>