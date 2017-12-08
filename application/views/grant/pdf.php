<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>DOM-PDF CODEIGNITER 3</title>

	<style type="text/css">
	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }
	body {
		background-color: #fff;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}
	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}
	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}
	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}
	#body {
		margin: 0 15px 0 15px;
	}
	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	#container {
		margin: 10px;
		box-shadow: 0 0 8px #D0D0D0;
	}
	
  table.gridtable {
    font-family: verdana,arial,sans-serif;
    font-size:11px;
    border-width: 1px;
    border-collapse: collapse;
    width:100%;
  }
  table.gridtable th {
    border-width: 1px;
    border-style: solid;
    text-align: left;
  }
  table.gridtable td {
    border-width: 1px;
    border-style: solid;
  }

  table {
    border-collapse: collapse;
    border: 1px solid #000;
  }
  table th, table td {
    border: 1px solid #000;
  }

	</style>
</head>
<body>

<div id="container">
  <table class="gridtable">
  <tr>
    <th>Judul Proposal</th>
    <td colspan="3"><?php echo $grant->proyek_judul ?></td>
  </tr>
  <tr>
    <th>Lembaga Pengusul</th>
    <td></td>
    <td>Tanggal proposal diterima</td>
    <td></td>
  </tr>
  <tr>
    <th>Alamat</th>
    <td></td>
    <td>Tanggal Final Proposal diperiksa Technical Committee</td>
    <td></td>
  </tr>
  <tr>
    <th>Landscape</th>
    <td><?php echo $grant->proyek_lansekap ?></td>
    <td>Tanggal direview Investment Committee</td>
    <td></td>
  </tr>
  <tr>
    <th>Lokasi Kegiatan</th>
    <td colspan="3">Desa <?php echo $grant->proyek_desa ?>, Kecamatan <?php echo $grant->proyek_kecamatan ?>, Kabupaten <?php echo $grant->proyek_kota ?>, Provinsi <?php echo $grant->proyek_provinsi ?> </td>
  </tr>
  <tr>
    <th>Penerima Manfaat</th>
    <td colspan="3"><?php echo $grant->proyek_manfaat ?></td>
  </tr>
  <tr>
    <th>Indikator Capaian Keberhasilan</th>
    <td colspan="3"><?php echo $grant->indikator_nama ?></td>
  </tr>
  <tr>
    <th>Durasi Project</th>
    <td colspan="2"><?php echo $grant->proyek_durasi ?> tahun</td>
    <td></td>
  </tr>
  <tr>
    <th>Jumlah dana</th>
    <td colspan="2">
        Rp. 
        <?php 
          $dana= get_grant_kegiatan_dana_jumlah($grant->id_kegiatan_dana);
          echo number_format ($dana->jumlah_dana, 2, ',', '.');
        ?>
      </td>
    <td></td>
  </tr>
  <tr>
    <th>Dana Per Kegiatan</th>
    <td colspan="2">
      <ul>
      <?php 
      $rst =  get_grant_kegiatan_dana_lanjut($grant->id_kegiatan_dana);
      foreach ($rst->result() as $row){
          echo "<li>".$row->nama." : Rp. ".number_format ($row->jumlah, 2, ',', '.')." </li>";
      } 
      ?>
      </ul>
    </td>
    <td></td>
  </tr>
  <tr>
    <th>Jenis Kegiatan</th>
    <td colspan="3"><?php echo $grant->kegiatan_dana_jenis ?></td>
  </tr>

  <tr>
    <th>Risalah Proposal</th>
    <td colspan="3">
      <b>Latar Belakang</b>
      <p><?php echo $grant->risalah_latar_belakang ?></p>
      <b>Tujuan</b>
      <p><?php echo $grant->risalah_tujuan ?></p>
      <b>Perubahan</b>
      <p><?php echo $grant->risalah_perubahan ?></p>
      <b>Metode</b>
      <p><?php echo $grant->risalah_metode ?></p>
    </td>
  </tr>
  </table>

</div>

</body>
</html>