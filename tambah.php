<?php
$conn = new mysqli("localhost","root","","inventaris");
if ($conn -> connect_errno){
    $conn -> connect_error;
    die ("Failed to connect");
}

if (isset($_POST['simpan']))
{
    $nama   = $_POST["nama"];
    $angkatan   = $_POST["angkatan"];

    $query  = "INSERT INTO anggota VALUES ('','$nama','$angkatan')";
    $sql = mysqli_query($conn, $query);

    if($sql){
        ?>
            <script>
                alert('Data anggota berhasil ditambah');
                document.location.href = '?page=anggota&aksi';
            </script>
            <?php 
    }
}
echo <<<_END
 <div class="app-main_outer">
    div class="app-main_inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-box1 icon-gradient bg-plum-plate">
                        </i>
                    </div>
                    <div>Tambah Anggota
                        <div class="page-title-subheading">Tambah data anggota MIT+R
                        </div>
                    </div>
                </div>
            </div>
         </div>
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Tambah Anggota</h5>
                    <form class="needs-validation" role="form" method="POST" novalidate>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="nama">Nama</label>
                                <input class="form-control" type="varchar" name="nama" id="nama"/>
                            </div>
                            <div class="col-md-6">
                                <label for="angkatan">Angkatan</label>
                                <input class="form-control" type="varchar" name="angkatan" id="angkatan"/>
                            </div>
                        </div>
                        <div>
                        <br>
                            <input type="submit" name="simpan" value="simpan" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
_END;

?>
          