<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  
  text-align: left;
  padding: 3px;
}

.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   text-align: center;
}


</style>
</head>
<body>
<table width="100%">
<tr>
<td width="5" ><img src="assets/mpk.png"  width="100"></td>
<td><h2 align="center">RESUME DATA/ INFORMASI SISTEM MONITORING</h2><p align="center">Jl. Soekarno Hatta No.10, Rajabasa Raya, Kec. Rajabasa,Lampung 35141</p><p align="center">Email : admin@ilham.id </p></td>
</tr>

</table>
<hr size="4px" width="100%" align="left">


<table>
   <tr>
    <td>Nama Proyek </td>
    <td>:</td>
    <td><?= $detailproyek->nama_proyek; ?></td>
  </tr>
  <tr>
    <td>Unit Bisnis/ Cabang</td>
    <td>:</td>
    <td><?= $detailproyek->unit_name; ?></td>
  </tr>
  <tr>
    <td>Nilai Kontrak</td>
    <td>:</td>
    <td><?php echo $hasil_rupiah = "Rp " . number_format($detailproyek->nilai_proyek,2,',','.'); ?></td>
  </tr>
  <tr>
    <td>Waktu</td>
    <td>:</td>
    <td><?= $detailproyek->tgl_mulai; ?> s/d <?= $detailproyek->tgl_perencanaan_selesai; ?></td>
  </tr>
  <tr>
    <td>Progress Pekerjaan</td>
    <td>:</td>
    <td><?= $persentasiselesai->persentase ?> %</td>
  </tr>
  <tr>
    <td>Tanggal cetak</td>
    <td>:</td>
    <td><?php echo date_create('now', timezone_open('Asia/Jakarta'))->format('Y-m-d H:i:s'); ?></td>
  </tr>

  
  
</table>
<hr>
<table border="1">
  <tr>
    <th rowspan="2">No</th>
    <th rowspan="2">Uraian Kegiatan</th>
    <th colspan="4">Uraian Kegiatan</th>
    <th colspan="3">Realisasi Pekerjaan</th>
  </tr>
  <tr>
        <td>Tanggal Mulai</td>
        <td>Tanggal Rencana Selesai</td>
        <td>bobot</td>
        <td>deskripsi</td>
        <td>Status</td>
        <td>tgl selesai</td>
        <td>id lampiran</td>
      </tr>
<?php foreach($printjeniskegiatan as $jeniskategori) : ?>
  <tr bgcolor="#1aa3ff">
    <th colspan="9"><?= $jeniskategori['namajenis_kegiatan']; ?></th>
  </tr>
    <?php $no=1;  foreach($printkegiatan as $listkegiatan) : ?>
      <?php if($listkegiatan['jenis_kegiatan'] == $jeniskategori['jenis_kegiatan']) : ?>
      <tr>
        <td><?php echo $no; $no++ ?></td>
        <td><?=$listkegiatan['nama_kegiatan'];?></td>
        <td><?=$listkegiatan['tgl_mulai_kegiatan'];?></td>
        <td><?=$listkegiatan['tgl_rencanaselesai'];?></td>
        <td><?=$listkegiatan['bobot_kegiatan'];?></td>
        <td><?=$listkegiatan['deskripsi_kegiatan'];?></td>
        <td><?php if($listkegiatan['id_status_kegiatan']=="1"){ 
          echo "open";}
          elseif($listkegiatan['id_status_kegiatan']=="2"){ 
            echo "Progress";}
            else{ echo "finish";} ?></td>
        <td><?=$listkegiatan['tgl_selesai_kegiatan'];?></td>
        <td><?php
        $idjeniskegiatan = $listkegiatan['id_kegiatan'];
        $lampiran="SELECT * FROM bukti_lampiran WHERE id_kegiatan='$idjeniskegiatan'";
        $vievlampiran = $this->db->query($lampiran)->result_array();
        foreach($vievlampiran as $listlampiran){ 
          echo $listlampiran['id_jenislampiran'];
          echo ",";
        }
        ?></td>
      </tr>
      <?php endif;?>
    <?php endforeach;?>
<?php endforeach; ?>
<tr bgcolor="#007acc">
    <th colspan="9"></th>
  </tr>
</table>

<br>
1. Laporan Pendahuluan 2. Rencana Kerja 3. Berita Acara 4. Notulen 5. Absen 6. Log Book 7. Lainnya

<div class="footer">
  <p>©PT SURVEYOR INDONESIA 2019</p>
</div>

</body>
</html>
