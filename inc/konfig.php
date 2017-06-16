<?php

class chat {
	public function __construct() {
		$this->koneksi();
	}

	public function koneksi() {
		$this->host = "localhost";
		$this->user = "root";
		$this->pass = "";
		$this->nama = "chat";

		$this->konek = new mysqli($this->host, $this->user, $this->pass, $this->nama);
		return $this->konek;
	}

	public function gabungObrolan($id, $nama) {
		$q = mysqli_query($this->konek, "SELECT * FROM obrolan WHERE idobrolan = '$id'");
		$cek = mysqli_num_rows($q);
		if($cek != NULL) {
			session_start();
			$_SESSION['chatting']=$nama;
			$r = mysqli_fetch_array($q);
			$memBaru = $r['anggota'].",".$nama;
			$update = mysqli_query($this->konek, "UPDATE obrolan SET anggota = '$memBaru' WHERE idobrolan = '$id'");
			$updt = mysqli_query($this->konek, "UPDATE obrolan SET slotuser = slotuser - 1 WHERE idobrolan = '$id'");
			$idpesan = rand(1,999999999);
			$waktu = time();
			$pesan = $nama." bergabung ke obrolan";
			$masuk = mysqli_query($this->konek, "INSERT INTO chatting VALUES('$idpesan','$id','$nama','$pesan','$waktu','')");
		}else {
			setcookie('kukichat','Obrolan tidak ditemukan',time() + 38, "/");
		}
	}

	public function buatObrolan($idobrolan, $namaObrolan, $maxuser, $namamu) {
		$maxusers = $maxuser-1;
		$q = mysqli_query($this->konek, "INSERT INTO obrolan VALUES('$idobrolan','$namaObrolan','$maxusers','$namamu')");
		if($q) {
			session_start();
			$_SESSION['chatting']=$namamu;
		}else {
			setcookie('kukichat','Gagal membuat obrolan',time() + 39, "/");
		}
	}

	public function getData($id, $struktur) {
		$q = mysqli_query($this->konek, "SELECT * FROM obrolan WHERE idobrolan = '$id'");
		$row = mysqli_fetch_array($q);
		return $row[$struktur];
	}

	public function loadAllChat($id) {
		$q = mysqli_query($this->konek, "SELECT * FROM chatting WHERE idobrolan = '$id' ORDER BY waktu DESC LIMIT 10");
		$ada = mysqli_num_rows($q);
		if($ada == 0) {
			echo "Obrolan kosong";
			exit();
		}
		while($row = mysqli_fetch_array($q)) {
			$hasil[] = $row;
		}
		return $hasil;
	}

	public function keluarGrup($idobrolan, $nama) {
		$q = mysqli_query($this->konek, "SELECT * FROM obrolan WHERE idobrolan = '$idobrolan'");
		$r = mysqli_fetch_array($q);

		$mem = $r['anggota'];
		$array = explode(",", $mem);

		$idpesan = rand(1,999999999);
		$waktu = time();
		$pesan = $nama." keluar dari obrolan";
		$masuk = mysqli_query($this->konek, "INSERT INTO chatting VALUES('$idpesan','$idobrolan','$nama','$pesan','$waktu','')");

		foreach ($array as $key => $value) {
			if($value == $nama) {
				unset($array[$key]);
			}
		}

		$memBaru = implode(",", $array);
		$ubah = mysqli_query($this->konek, "UPDATE obrolan SET anggota = '$memBaru' WHERE idobrolan = '$idobrolan'");
		$updt = mysqli_query($this->konek, "UPDATE obrolan SET slotuser = slotuser + 1 WHERE idobrolan = '$idobrolan'");
		if($ubah) {
			session_start();
			session_destroy();
		}
	}

	public function membaca($id, $nama) {
		$q = mysqli_query($this->konek, "SELECT * FROM chatting WHERE idobrolan = '$id'");
		$r = mysqli_fetch_array($q);
		$p = explode(",", $r['dibaca']);
		if(!in_array($nama, $p)) {
			$tambah = $r['dibaca'].",".$nama;
			$updt = mysqli_query($this->konek, "UPDATE chatting SET dibaca = '$tambah' WHERE idobrolan = '$id'");
		}
	}

	public function mengirim($id, $ido, $nama, $pesan, $waktu, $dibaca) {
		$q = mysqli_query($this->konek, "INSERT INTO chatting VALUES('$id','$ido','$nama','$pesan','$waktu','$dibaca')");

	}

	public function hapus($id) {
		$q = mysqli_query($this->konek, "DELETE FROM chatting WHERE idpesan = '$id'");
	}
}

?>