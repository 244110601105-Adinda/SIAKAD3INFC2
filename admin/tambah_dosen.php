<?php
if (isset($_POST['simpan'])) {
    $nidn     = $_POST['nidn'];
    $nama    = $_POST['nama'];
    $gender  = $_POST['gender'];
    $alamat  = $_POST['alamat'];
    $prodi   = $_POST['prodi'];
    $noHP    = $_POST['noHP'];

    require_once "../config.php";
    $waktu = date("Y-m-d H:i:s");

    // pastikan nama tabel sesuai dengan yang ada di phpMyAdmin (misal: mhs)
    $sql = "INSERT INTO dosen (nidn, nama, gender, alamat, prodi, noHP, waktu)
            VALUES ('$nidn', '$nama', '$gender', '$alamat', '$prodi', '$noHP', '$waktu')";

    $tes = $db->query($sql);

    if ($tes) {
        echo "<script> alert('Data berhasil disimpan!');
                window.location='?p=dosen';
              </script";
    } else {
        echo "<div class='alert alert-danger'>
                Gagal menyimpan data: " . $db->error . "
              </div>";
    }
}
?>

<form method="post" action="#">
    <table>
        <tr>
            <td>NIDN</td>
            <td><input type="number" name="nidn" class="form-control" required></td>
        </tr>
        <tr>
            <td>Nama Lengkap</td>
            <td><input type="text" name="nama" class="form-control" required></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>
                <input type="radio" name="gender" value="L" id="genderL"> <label for="genderL">Laki-laki</label>
                <input type="radio" name="gender" value="P" id="genderP"> <label for="genderP">Perempuan</label>
            </td>
        </tr>
        <tr>
            <td valign="top">Alamat</td>
            <td><textarea name="alamat" class="form-control" style="width:300px" required></textarea></td>
        </tr>
       <tr>
    <td>Program Studi</td>
    <td>
        <select class="form-control" name="prodi" required>
            <option value="">-- Pilih Prodi --</option>
            <option value="1">Informatika</option>
            <option value="2">Arsitektur</option>
            <option value="3">Ilmu Lingkungan</option>
            <option value="4">Perpustakaan Sains dan Informasi</option>
        </select>
    </td>
            <td>No HP</td>
            <td><input type="text" name="noHP" class="form-control" required></td>  
</tr>
        <tr>
            <td></td>
            <td><input type="submit" name="simpan" value="Simpan" class="btn btn-primary"></td>
        </tr>
    </table>
</form>