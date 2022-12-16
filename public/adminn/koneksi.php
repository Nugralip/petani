<?php
//data database
$servername = "localhost";
$database = "bus_smart";
$username = "root";
$password = "";
// Create koneksiection
$koneksi = mysqli_connect($servername, $username, $password, $database);

function tampil($table)
{
    global $koneksi;
    $result = mysqli_query($koneksi, "SELECT * FROM $table");
    return $result;
}

function tambah($table, $value)
{
    global $koneksi;
    $query = "INSERT INTO $table values $value";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function hapus($table, $kunci, $id)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM $table WHERE $kunci=$id");
    return mysqli_affected_rows($koneksi);
}

function update($table, $query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, "UPDATE $table SET $query");
    return mysqli_affected_rows($koneksi);
}
?>