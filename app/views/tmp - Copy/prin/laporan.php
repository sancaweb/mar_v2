<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Laporan Pembayaran</title>
		<link rel="stylesheet" href="<?php echo $this->uri->baseUri.PRIN; ?>laporan.css">
	</head><!--
	<body onload="window.print()"> -->
	<body >
	
		<header>
      <img width="75px" src="data:image/jpg;base64,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">
			<h1>KSP SUMBER BAROKAH</h1>
      <p>Badan Hukum : 36 / BH / XIII.10 / V / III / 2008</p>
      <p>Jl. Syeh Quro Gg. Buana  II Johar Utara Rt 02/18 Karawang Wetan</p>
		</header>
    <article>
	<h1>Rincian Cicilan</h1>
      <table class="meta">
        <tbody>
          <tr>
            <td class="a"><span>Tgl. Registrasi</span></td>
            <td class="b"><span>13102014-nas-4</span></td>
            <td class="c"></td>
            <td class="d"><span>Jumlah Pinjaman</span></td>
            <td class="e"><span>Rp. 8.000.000,-</span></td>
          </tr>
          <tr>
            <td class="a"><span>Nama Nasabah</span></td>
            <td class="b"><span>HERY IRAWANSYAH</span></td>
            <td class="c"></td>
            <td class="d"><span>Tenor</span></td>
            <td class="e"><span>10</span></td>
          </tr>
          <tr>
            <td class="a"><span>ID Pinjaman</span></td>
            <td class="b"><span>22102014-pin-2</span></td>
            <td class="c"></td>
            <td class="d"><span>Cicilan</span></td>
            <td class="e"><span>Rp. 1.200.000,-</span></td>
          </tr>
          <tr>
            <td class="a"><span>Tgl. Pinjaman</span></td>
            <td class="b"><span>2014-10-22</span></td>
            <td class="c"></td>
            <td class="d"><span></span></td>
            <td class="e"><span></span></td>
          </tr>
        </tbody>
      </table>
      <table class="inventory">
        <thead>
          <tr>
            <td colspan="2"><span>Jumlah Awal</span></td>
            <td class="right"><span>Rp. 8.000.000,-</span></td>
            <td class="right"><span>Rp. 4.000.000,-</span></td>
            <td class="right"><span>Rp. 24.000,-</span></td>
            <td colspan="2"><span></span></td>
            <td class="right"><span>Rp. 12.000.000,-</span></td>
            <td><span></span></td>
          </tr>
          <tr>
            <td class="a"><span>Cicilan Ke</span></td>
            <td class="b"><span>Tgl. Bayar</span></td>
            <td class="c"><span>Pokok</span></td>
            <td class="d"><span>Bunga/Jasa</span></td>
            <td class="e"><span>Denda</span></td>
            <td class="f"><span>Total</span></td>
            <td class="g"><span>Pembayaran</span></td>
            <td class="h"><span>Saldo Akhir</span></td>
            <td class="i"><span>Petugas</span></td>
          </tr>
          <tr>
            <td class="a"><span>1</span></td>
            <td class="b"><span>1-Agu-2014</span></td>
            <td class="c"><span>Rp. 800.000,-</span></td>
            <td class="d"><span>Rp. 400.000,-</span></td>
            <td class="e"><span>-</span></td>
            <td class="f"><span>Rp. 1.200.000,-</span></td>
            <td class="g"><span>Rp. 1.200.000,-</span></td>
            <td class="h"><span>-</span></td>
            <td class="i"><span>Hery</span></td>
          </tr>
          <tr>
            <td class="a"><span>2</span></td>
            <td class="b"><span>2-Sep-2014</span></td>
            <td class="c"><span>Rp. 800.000,-</span></td>
            <td class="d"><span>Rp. 400.000,-</span></td>
            <td class="e"><span>Rp. 24.000,-</span></td>
            <td class="f"><span>Rp. 1.200.000,-</span></td>
            <td class="g"><span>Rp. 1.224.000,-</span></td>
            <td class="h"><span>-</span></td>
            <td class="i"><span>Hery</span></td>
          </tr>
          <tr>
            <td class="a"><span>3</span></td>
            <td class="b"><span>3-Sep-2014</span></td>
            <td class="c"><span>Rp. 800.000,-</span></td>
            <td class="d"><span>Rp. 400.000,-</span></td>
            <td class="e"><span>Rp. 24.000,-</span></td>
            <td class="f"><span>Rp. 1.200.000,-</span></td>
            <td class="g"><span>Rp. 1.224.000,-</span></td>
            <td class="h"><span>-</span></td>
            <td class="i"><span>Hery</span></td>
          </tr>
          <tr>
            <td class="a"><span>4</span></td>
            <td class="b"><span>-</span></td>
            <td class="c"><span>-</span></td>
            <td class="d"><span>-</span></td>
            <td class="e"><span>-</span></td>
            <td class="f"><span>-</span></td>
            <td class="g"><span>-</span></td>
            <td class="h"><span>-</span></td>
            <td class="i"><span>-</span></td>
          </tr>
          <tr>
            <td class="a"><span>5</span></td>
            <td class="b"><span>-</span></td>
            <td class="c"><span>-</span></td>
            <td class="d"><span>-</span></td>
            <td class="e"><span>-</span></td>
            <td class="f"><span>-</span></td>
            <td class="g"><span>-</span></td>
            <td class="h"><span>-</span></td>
            <td class="i"><span>-</span></td>
          </tr>
          <tr>
            <td class="a"><span>6</span></td>
            <td class="b"><span>-</span></td>
            <td class="c"><span>-</span></td>
            <td class="d"><span>-</span></td>
            <td class="e"><span>-</span></td>
            <td class="f"><span>-</span></td>
            <td class="g"><span>-</span></td>
            <td class="h"><span>-</span></td>
            <td class="i"><span>-</span></td>
          </tr>
          <tr>
            <td class="a"><span>7</span></td>
            <td class="b"><span>-</span></td>
            <td class="c"><span>-</span></td>
            <td class="d"><span>-</span></td>
            <td class="e"><span>-</span></td>
            <td class="f"><span>-</span></td>
            <td class="g"><span>-</span></td>
            <td class="h"><span>-</span></td>
            <td class="i"><span>-</span></td>
          </tr>
          <tr>
            <td class="a"><span>8</span></td>
            <td class="b"><span>-</span></td>
            <td class="c"><span>-</span></td>
            <td class="d"><span>-</span></td>
            <td class="e"><span>-</span></td>
            <td class="f"><span>-</span></td>
            <td class="g"><span>-</span></td>
            <td class="h"><span>-</span></td>
            <td class="i"><span>-</span></td>
          </tr>
          <tr>
            <td class="a"><span>9</span></td>
            <td class="b"><span>-</span></td>
            <td class="c"><span>-</span></td>
            <td class="d"><span>-</span></td>
            <td class="e"><span>-</span></td>
            <td class="f"><span>-</span></td>
            <td class="g"><span>-</span></td>
            <td class="h"><span>-</span></td>
            <td class="i"><span>-</span></td>
          </tr>
          <tr>
            <td class="a"><span>10</span></td>
            <td class="b"><span>-</span></td>
            <td class="c"><span>-</span></td>
            <td class="d"><span>-</span></td>
            <td class="e"><span>-</span></td>
            <td class="f"><span>-</span></td>
            <td class="g"><span>-</span></td>
            <td class="h"><span>-</span></td>
            <td class="i"><span>-</span></td>
          </tr>
        </thead>
      </table>
    </article>
	</body>
</html>