<?php
$idx = $_GET['id'];
require_once "../config.php";
$sql = "SELECT * FROM mhs2 WHERE id='$idx'";
$data=$db->query($sql);
?>
<main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <!--begin::Col-->
              <div class="col-sm-6"><h3 class="mb-0">Detail Mahasiswa</h3></div>
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
                    <table class="table table-bordered">
                    <?php
foreach ($data as $d) {
    if ($d['gender'] == "L") {
        $gender = "Laki-laki";
    } else {
        $gender = "Perempuan";
    }

    switch ($d['prodi']) {
        case '1': $prodi = "Informatika"; break;
        case '2': $prodi = "Arsitektur"; break;
        case '3': $prodi = "Ilmu Lingkungan"; break;
        case '4': $prodi = "Perpustakaan Sains Informasi"; break;
        default: $prodi = "Tidak dikenal"; break;
    }

    echo "<tr><td>NIM</td><td>$d[nim]</td></tr>";
    echo "<tr><td>NAMA</td><td>$d[nama]</td></tr>";
    echo "<tr><td>JENIS KELAMIN</td><td>$gender</td></tr>";
    echo "<tr><td>ALAMAT</td><td>$d[alamat]</td></tr>";
    echo "<tr><td>PRODI</td><td>$prodi</td></tr>";
}
?>
                        </table>
                        <a href="javascript:history.back(-1)" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>

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