<?php

$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'travel';

$koneksi = mysqli_connect($server, $user, $pass, $db);

if(!$koneksi){
    die ('koneksi gagal : ' . mysqli_connect_error());
}

?>