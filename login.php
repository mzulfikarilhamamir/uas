
<?php 

require_once 'koneksi.php'; // panggil perintah koneksi database 



if(isset($_POST['login'])) { // mengecek apakah form pada login.php variabelnya ada isinya
    $username = $_POST['username']; // isi varibel dengan mengambil data username pada form
    $password = $_POST['password'];
    echo $username;
    echo $password; // isi variabel dengan mengambil data password pada form

    try {
        $sql = "SELECT * FROM `user` WHERE username = ? AND password = SHA1(?)"; // buat queri select
        $q = $db->prepare($sql);
        $q->execute([$username, $password]); // jalankan query

        $count = $q->rowCount(); // mengecek row
        if($count == 1) { // jika rownya ada 
            
            header("Location: pagecrud.php"); // lempar variabel ke tampilan index.php
            return;
        }else{
            echo "Anda tidak dapat login";
        }
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="modul/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <script language="Javascript" src="modul/bootstrap-4.3.1-dist/js/bootstrap.min.js"> </script>
    <script src="modul/JQuery/jquery.min.js"></script>

    <!-- CSS dan JS DataTable -->
    <script src="modul/DataTable/datatables.min.js"></script>
    <script src="modul/DataTable/DataTables-1.10.23/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>
    <!-- buat class container -->
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <!-- membuat form -->
            <form class="col-lg-6" action="" method="POST">
                <center>
                    <h2>LOGIN</h2>
                </center>
                <center><p>Selamat Datang</p></center>
                <!-- baris ke 2 pada form -->
                <div class="form-group col-md-12">
                    <label for="contoh2">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="username">
                </div>
                <div class="form-group col-md-12">
                    <label for="contoh2">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="password">
                </div>
                <center><button name="login" type="submit" class="btn btn-primary col-md-6">Login</button></center>
                <p>Belum punya akun?<a href="register.php">Daftar disini</a></p>
        </div>
        <!-- end baris 2 pada form -->
        </form>
        <!-- end form -->
    </div>
    </div>
    <!-- end container -->
</body>

</html>