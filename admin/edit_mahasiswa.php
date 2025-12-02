<?php
$idx = $_GET['id'];
require_once "../config.php";
$sql = "SELECT * FROM mhs2 WHERE id='$idx'";
$data = $db->query($sql);
?>
<main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <!--begin::Col-->
              <div class="col-sm-6"><h3 class="mb-0">Edit Data Mahasiswa</h3></div>
              <!--end::Col-->
              <!--begin::Col-->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Theme Customize</li>
                </ol>
              </div>
              <!--end::Col-->
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <!--begin::Col-->
              <div class="col-12">
                <!--begin::Card-->
                <div class="card">
                  <!--begin::Card Header-->
                  <div class="card-header">
                    <!--begin::Card Title-->
                    <main class="app-main">
                <?php
                if(isset($_POST['simpanEdit'])){
    //$idx     = $_POST['id'];
    $nim     = $_POST['nim'];
    $nama    = $_POST['nama'];
    $gender  = $_POST['gender'];
    $alamat  = $_POST['alamat'];
    $prodi   = $_POST['prodi'];
    $sql = "UPDATE mhs2 SET nim='$nim', nama='$nama', gender  ='$gender', alamat='$alamat', prodi='$prodi' WHERE id='$idx'";
    $hasil = $db->query($sql);
    if($hasil){
        echo "<div class='alert alert-success'>Data berhasil diedit!</div>";
    } else {
        echo "<div class='alert alert-danger'>Data gagal diedit ".$db->error."</div>";
                }
}
                ?>
                <form method="POST">
                <table class="table table-bordered">
<?php
foreach ($data as $d) {
    if ($d['gender'] == "L") {
        $gender = "checked";
    } else {
        $gender = "checked";
    }
    switch ($d['prodi']) {
        case '1': $prodi = "Informatika"; break;
        case '2': $prodi = "Arsitektur"; break;
        case '3': $prodi = "Ilmu Lingkungan"; break;
        case '4': $prodi = "Perpustakaan Sains Informasi"; break;
        default: $prodi = "Tidak dikenal"; break;
}
echo"<tr><td>NIM</td><td><input type='number' name='nim' value='$d[nim]' class='form-control'></td></tr>";
echo"<tr><td>NAMA</td><td><input type='text' name='nama' value='$d[nama]' class='form-control'></td></tr>";
echo"<tr><td>JENIS KELAMIN</td><td><input type='radio' name='gender' value='L' "; if($gender=='L'){echo"checked";} echo"> Laki-laki
<input type='radio' name='gender' value='P' "; if($gender=='P'){echo"checked";} echo"> Perempuan</td></tr>";
echo"<tr><td>ALAMAT</td><td><textarea class='form-control' name='alamat'>$d[alamat]</textarea></td></tr>";
echo"<tr><td>PRODI</td><td><select name='prodi' class='form-control'>
<option></option>
<option value='1' "; if($d['prodi']=='1'){echo"selected";} echo">Informatika</option>
<option value='2' "; if($d['prodi']=='2'){echo"selected";} echo">Arsitektur</option>
<option value='3' "; if($d['prodi']=='3'){echo"selected";} echo">Ilmu Lingkungan</option>
<option value='4' "; if($d['prodi']=='4'){echo"selected";} echo">Perpustakaan Sains Informasi</option>
</select></td></tr>";
echo"<tr><td></td><td>
<input type='submit' name='simpanEdit' value='Simpan Perubahan' class='btn btn-primary'>
</td></tr>";
}
?>
</table>
<a href="./?p=mahasiswa" class="btn btn-secondary">Kembali</a>
</div>
</form>

                    <!--end::Card Title-->
                    <!--begin::Card Toolbar-->
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                        <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                        <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                      </button>
                      <button
                        type="button"
                        class="btn btn-tool"
                        data-lte-toggle="card-remove"
                        title="Remove"
                      >
                        <i class="bi bi-x-lg"></i>
                      </button>
                    </div>
                    <!--end::Card Toolbar-->
                  </div>
                  <!--end::Card Header-->
                  <!--begin::Card Body-->
              </div>
              <!--end::Col-->
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>