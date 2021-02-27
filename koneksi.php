<?php
  $host ="localhost"; //host server
  $user ="root"; //user login phpMyAdmin
  $pass =""; //pass login phpMyAdmin
  $db ="web1"; //nama database
  $koneksi = mysqli_connect($host, $user, $pass, $db) or die ("Koneksi gagal");

  function base_url($url = null) {
  	$base_url = "http://localhost/web1";
  	if ($url != null) {
  		return $base_url."/".$url;
  	}else{
  		return $base_url;
  	}
  }
?>