<?php
$conn = new mysqli("localhost","root","","inventaris");
if ($conn -> connect_errno){
    $conn -> connect_error;
    die ("Failed to connect");
}

// Untuk Delete
if (isset($_POST['delete'])&&
    isset($_POST['kode']))
{
    $kode = $_POST['kode'];
    echo $kode;
    $hapus = "DELETE FROM anggota WHERE Id=$kode";
    $result = mysqli_query($conn, $hapus);
    if (!$result) echo "Delete Failed <br><br>";
}
?>
<link rel="stylesheet" href="assets/dataTables/dataTables.bootstrap.css">
 <div class="app-main_outer">
                    <div class="app-main_inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-box1 icon-gradient bg-plum-plate">
                                        </i>
                                    </div>
                                    <div>Data Anggota
                                        <div class="page-title-subheading">Daftar Anggota MIT+R
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="col-md-12">
                                <div class="main-card mb-3 car">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="allign-middle mb-0 table table-borderless table-striped table-hover" id="
                                            dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nama</th>
                                                    <th>Angkatan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $tampil = "SELECT * FROM anggota";
                                                    $result = $conn -> query($tampil);

                                                    $rows = $result -> num_rows;

                                                    for ($j = 0; $j < $rows ; ++$j){
                                                        $row = $result->fetch_array(MYSQLI_NUM);

                                                        $r0 = htmlspecialchars($row[0]);
                                                        $r1 = htmlspecialchars($row[1]);
                                                        $r2 = htmlspecialchars($row[2]);
                                                ?>
                                                <tr>
                                                    <td><?php echo $r0 ?></td>
                                                    <td><?php echo $r1 ?></td>
                                                    <td><?php echo $r2 ?></td>
                                                    <td><a href="?page=anggota&aksi=ubah&id=<?php echo $r0 ?>" class="btn btn-info">
                                                    Ubah</a><br><br>
                                                        <form action="?page=anggota&aksi=", method="POST">
                                                        <input type='hidden' name='delete' value='yes'>
                                                        <input type='hidden' name='kode' value="<?php echo $r0 ?>">
                                                        <input type="Submit" name="hapus" value="btn btn-danger">
                                                        </form>
                                                    </td>
                                                </tr>
                                                <?php } 
                                                    $result->close();
                                                    $conn->close();
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                </div>
                            </div>