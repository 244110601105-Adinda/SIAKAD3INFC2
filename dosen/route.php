<?php

$p=$_GET['p']; //URL

switch ($p) {
    case 'detail_mhs':
        require_once "detail_mhs.php";
        break;
    case 'detail_dosen':
        require_once "detail_dosen.php";
        break;
    case 'hapus_mahasiswa': 
        require_once "hapus_mahasiswa.php"; 
        break;
    case 'hapus_dosen': 
        require_once "hapus_dosen.php";
        break;
    case 'edit_mahasiswa': 
        require_once "edit_mahasiswa.php"; 
        break;
    case 'edit_dosen': 
        require_once "edit_dosen.php"; 
        break;
    case 'dosen':
        require_once "dosen.php";
        break;
    case 'mahasiswa':
        require_once "mahasiswa.php";
        break;
    case 'update-mahasiswa':
        require_once "update-mahasiswa.php";
        break;
    case 'pegawai':
        require_once "pegawai.php";
        break;
    case 'password':
        require_once "password.php";
        break;
    case 'tambah_mahasiswa':
        require_once "tambah_mahasiswa.php";
        break;
    case 'tambah_dosen':
        require_once "tambah_dosen.php";
        break;
    default:
        require_once "dashboard.php";
        break;
}