<?php
include('fragment/header.php');
include('fragment/sidebar.php');
?>

<!--- Content ------------------------------->
			<div id="main">

				<div class="header">
					<h2>Prediksi</h2>

				</div>

				<div class="content">
					<p>
						<!-- cek apakah sudah login -->
						<?php
						session_start();
						if($_SESSION['status']!="login"){
						header("location:home.php?pesan=belum_login");
						}
						?>


					<div style="border:1; padding:10px; width:760px; height:auto;">
						<form action="action-input-data.php" method="POST" name="form-input-data">
    			<table width="760" border="0" cellpadding="0" cellspacing="0">
        	<tr height="60">
                <td width="10%"> </td>
                <td width="25%"> </td>
                <td width="65%"><font color="black" size="4">Input Data Prediksi</font></td>
        	</tr>
        <tr height="40">
            <td> </td>
            <td>Nama</td>
            <td><input type="text" name="nama" size="35" maxlength="50" /></td>
        </tr>
        <tr height="40">
            <td> </td>
            <td>Usia</td>
            <td><select name="usia">
                    <option value="-">- Pilih -
                    <option value="20-29tahun">20-29tahun
                    <option value="30-39tahun">30-39tahun
                    <option value="40-49tahun">40-49tahun
                </select></td>
        </tr>
        <tr height="30">
            <td> </td>
            <td>Jenis Kelamin</td>
            <td><input type="radio" name="gender" value="male">L
								<input type="radio" name="gender" value="female">P
						</td>
        </tr>
				<tr height="40">
					<td> </td>
					<td>Status</td>
					<td><select name="status">
									<option value="-">- Pilih -
									<option value="menikah">Menikah
									<option value="belum menikah">Belum Menikah
							</select></td>
        </tr>
				<tr height="30">
            <td> </td>
            <td>Pekerjaan</td>
            <td><input type="checkbox" name="pekerjaan" value="pegawaiswasta">Pegawai Swasta<span class="checkmark"></span>
							  <input type="checkbox" name="pekerjaan" value="pns">PNS<span class="checkmark"></span>
							  <input type="checkbox" name="pekerjaan" value="wirausaha">Wirausaha<span class="checkmark"></span>
						</td>
        </tr>
				<tr height="40">
					<td> </td>
					<td>Penghasilan Per Tahun</td>
					<td><select name="penghasilan">
									<option value="-">- Pilih-
									<option value="cukup"> >Rp 25Juta-50Juta
									<option value="baik"> >Rp 50Juta-100Juta
									<option value="sangat baik"> >Rp 100Juta-300Juta
									<option value="terlalu baik"> >Rp 300Juta
							</select></td>
        </tr>
				<tr height="30">
            <td> </td>
            <td>Jumlah Tanggungan</td>
            <td><input type="radio" name="tanggungan" value="tidakada">Tidak ada
								<input type="radio" name="tanggungan" value="sedikit">1-2orang
								<input type="radio" name="tanggungan" value="banyak"> >2orang
						</td>
        </tr>
				<tr height="30">
            <td> </td>
            <td>Status Rumah</td>
            <td><input type="checkbox" name="rumah" value="sewakos">Sewa/Kos<span class="checkmark"></span>
							  <input type="checkbox" name="rumah" value="sendiri">Milik Sendiri<span class="checkmark"></span>
							  <input type="checkbox" name="rumah" value="keluarga">Milik Keluarga<span class="checkmark"></span>
						</td>
        </tr>
				<tr height="40">
					<td> </td>
					<td>Pre Existing Disease</td>
					<td><select name="prexdis">
									<option value="-">- Pilih-
									<option value="cukup"> >Rp 25Juta-50Juta
									<option value="baik"> >Rp 50Juta-100Juta
									<option value="sangat baik"> >Rp 100Juta-300Juta
									<option value="terlalu baik"> >Rp 300Juta
							</select></td>
        </tr>
				<tr height="30">
            <td> </td>
            <td>Jenis Produk</td>
            <td><input type="checkbox" name="produk" value="sse">SSE<span class="checkmark"></span>
							  <input type="checkbox" name="produk" value="ssg">SSG<span class="checkmark"></span>
							 </td>
        </tr>
				<tr height="40">
					<td> </td>
					<td>Plan</td>
					<td><select name="plan">
									<option value="-">- SSE -
									<option value="plansse"> D
									<option value="plansse"> E
									<option value="plansse"> F
									<option value="plansse"> G
									<option value="plansse"> H
									<option value="plansse"> I
							</select>
							<select name="plan">
							<option value="-">- SSG -
							<option value="planssg"> B
							<option value="planssg"> D
								<option value="planssg"> G
								<option value="planssg"> H
							</select>
							*pilih salah satu
					</td>
        </tr>
				<tr height="30">
            <td> </td>
            <td>Permohonan</td>
            <td><input type="checkbox" name="permohonan" value="sse">Diterima<span class="checkmark"></span>
							  <input type="checkbox" name="permohonan" value="ssg">Ditolak<span class="checkmark"></span>
							 </td>
        </tr>

        <tr height="60">
            <td> </td>
            <td> </td>
            <td><input type="submit" name="Submit" value="Submit">
                <input type="reset" name="reset" value="Cancel"></td>
        </tr>
    </table>
  </form>
</div>

<?php
include('fragment/footer.php');
?>
