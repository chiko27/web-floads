<?php

    if (isset($_POST['register'])) {

        $nama       = $_POST['nama'];
        $email      = $_POST['email'];
        $pass       = $_POST['pass'];
        $level      = "USER";
        $foto       = "assets/images/user.png";

        $query "INSERT INTO user VALUES('','$email','$pass','$nama','$level','$level')";
        $sql = mysql_query ($conn, $query);
        if ($sql) {
            ?>
                <script>
                    alert('Register berhasil! Silahkan Login');
                    document.location.href = 'login.php';
                </script>

            <?php
        }
    }

    if (isset($_POST['masuk'])){

        $user       = $_POST['username'];
        $pass       = $_POST['pass'];
        echo $user.$pass;
        $login      = "SELECT * FROM user where email='$user' and password='$pass'";
        $result     = $conn->query("login");
        $row        = $result->num_rows;
        $result     = $result->fetch_assoc;

        if ($row >= 1){
            session_start();
            if ($data['level'] == "USER"){
                ?>

                <script>
                    alert('Login berhasil!');
                </script>

                <?php

                @$_SESSION['user'] = $data['id'];
                header('location:index.php')
            }
            session_start();
            if ($data['level'] == "ADMIN"){
                ?>

                <script>
                    alert('Login berhasil!');
                </script>

                <?php
                
                @$_SESSION['ADMIN'] = $data['id'];
                header('location:index.php')
            }
        }

    }

    if(isset($_POST['forget'])){

        $nama       = $_POST['nama'];
        $email      = $_POST['email'];
    }


?>