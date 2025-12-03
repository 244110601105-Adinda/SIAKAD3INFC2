<?php
require_once "../config.php";
$keyword=$_POST['keyword'];
$category=$_POST['category'];

if($_POST['cari']){
    if($category=="prodi"){
        if($keyword=="INF"){
            $prodi=1;
        }
        $sql="select * from mhs2 where $category like '%$prodi%'";
    }else{
        $sql="select * from mhs2 where $category like '%$keyword%'";
    }
}else{
    $sql="select * from mhs2";
}
$data = $db->query($sql);
$jumlah = $data->num_rows;
?>

<main class="app-main">
  <!--begin::App Content Header-->
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">Data Mahasiswa</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Theme Customize</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!--begin::App Content-->
  <div class="app-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <a href='../mahasiswa?p=tambah_mahasiswa' class='btn btn-sm btn-success'>Tambah</a>
              <table><tr><td>
<a href="../mahasiswa?p=update-mahasiswa" class="btn btn-primary" style="width: 150px">+ Mahasiswa</a>
</td><td width="50"></td><td>
<form method="post" action="#">
<input type='text' name='keyword' placeholder='Masukkan Kata Kunci' value='<?=$keyword?>'>
<select name='category'>
<option value="nim" <?php if($category=="nim") echo"selected";?>>NIM</option>
<option value="nama" <?php if($category=="nama") echo"selected";?>>NAMA</option>
<option value="gender" <?php if($category=="gender") echo"selected";?>>Jenis Kelamin</option>
<option value="prodi" <?php if($category=="prodi") echo"selected";?>>Prodi</option>
</select>
<input type='submit' name='cari' value='Search' class='btn btn-default'>
</form>
</td></tr></table>
<?php if (isset($_POST['cari'])): ?>
  <?php if ($jumlah > 0): ?>
    <p style="color:green;">
      <i>Ditemukan <b><?= $jumlah ?></b> data dengan kata kunci 
      <b><?= htmlspecialchars($keyword) ?></b> pada kategori 
      <b><?= htmlspecialchars($category) ?></b>.</i>
    </p>
  <?php else: ?>
    <p style="color:red;">
      <i>Tidak ditemukan data dengan kata kunci 
      <b><?= htmlspecialchars($keyword) ?></b> pada kategori 
      <b><?= htmlspecialchars($category) ?></b>.</i>
    </p>
  <?php endif; ?>
<?php endif; ?>
              <table class="table table-striped table-hover">
                <thead>
                  <tr> 
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Gender</th>
                    <th>Alamat</th>
                    <th>Prodi</th>
                    <th>Waktu</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($data as $d) {

                    if ($d['prodi'] == 1) {
                      $prodi = "Informatika";
                    } elseif ($d['prodi'] == 2) {
                      $prodi = "Arsitektur";
                    } elseif ($d['prodi'] == 3) {
                      $prodi = "Ilmu Lingkungan";
                    } elseif ($d['prodi'] == 4) {
                      $prodi = "Perpustakaan Sains Informasi";
                    } else {
                      $prodi = "Tidak Diketahui";
                    }

                    echo "
                    <tr>
                      <td>{$no}</td> 
                      <td>{$d['nim']}</td>
                      <td>{$d['nama']}</td>
                      <td>{$d['gender']}</td>
                      <td>{$d['alamat']}</td>
                      <td>{$prodi}</td>
                      <td>{$d['waktu']}</td>
                      <td>
                        <a href='.?p=detail_mhs&id=$d[id]' class='btn btn-xs btn-info'>Detail</a>
                        <a href='.?p=edit_mahasiswa&id=$d[id]' class='btn btn-xs btn-warning'>Edit</a>
                        <a href='.?p=hapus_mahasiswa&id=$d[id]' class='btn btn-xs btn-danger'>Hapus</a>
                      </td>
                    </tr>";
                    $no++;
                  }
                  ?>
                </tbody>
              </table>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                  <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                  <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                </button>
                <button type="button" class="btn btn-tool" data-lte-toggle="card-remove" title="Remove">
                  <i class="bi bi-x-lg"></i>
                </button>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>