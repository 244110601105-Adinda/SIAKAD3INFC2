<?php
require_once "../config.php";
$data = $db->query("SELECT * FROM dosen");
?>

<main class="app-main">
  <!--begin::App Content Header-->
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">Data Dosen</h3>
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
              <a href='../dosen?p=tambah_dosen' class='btn btn-sm btn-success'>Tambah</a>
              
              <table class="table table-striped table-hover">
                <thead>
                  <tr> 
                    <th>No</th>
                    <th>NIDN</th>
                    <th>Nama</th>
                    <th>Gender</th>
                    <th>Alamat</th>
                    <th>Prodi</th>
                    <th>noHP</th>
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
                      <td>{$d['nidn']}</td>
                      <td>{$d['nama']}</td>
                      <td>{$d['gender']}</td>
                      <td>{$d['alamat']}</td>
                      <td>{$prodi}</td>
                      <td>{$d['noHP']}</td>
                      <td>{$d['waktu']}</td>
                      <td>
                        <a href='.?p=detail_dosen&id=$d[id]' class='btn btn-xs btn-info'>Detail</a>
                        <a href='.?p=edit_dosen&id=$d[id]' class='btn btn-xs btn-warning'>Edit</a>
                        <a href='.?p=hapus_dosen&id=$d[id]' class='btn btn-xs btn-danger'>Hapus</a>
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