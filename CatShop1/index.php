<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="icon" href="assets/icon.png" />
	<title>Home</title>
	<link rel="stylesheet" href="css/style.css" />
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link
		href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&family=Roboto:wght@500;700&display=swap"
		rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
	<div class="container">
		<header>
			<nav>
				<div class="logo">
					<img src="assets/logo.png" alt="" />
				</div>
				<input type="checkbox" id="click" />
				<label for="click" class="menu-btn">
					<i class="fas fa-bars"></i>
				</label>
				<ul>
					<li><a href="">Home</a></li>
					<li><a href="categories.php">Categories</a></li>
					<li><a href="login.php" class="btn_login">Login</a></li>
				</ul>
			</nav>
		</header>
		<main>
			<div class="jumbotron">
				<div class="jumbotron-text">
					<h1>Find Your New Little Cat, Make a New Friend</h1>
					<p> Teman barumu yang lucu menunggu mu, ayo temukan mereka sekarang
					</p>
					<button type="button" class="btn_getStarted">Get Started</button>
				</div>
				<div class="jumbotron-img">
					<img src="assets/jumbotron.png" alt="" />
				</div>
			</div>
			<div class="cards-categories">
				<h2>Cat Categories</h2>
				<div class="card-categories">
					<div class="card">
						<div class="card-image">
							<img src="assets/anggora.png" alt="gambar tidak ditemukan" />
						</div>
						<div class="card-content">
							<h5>Anggora</h5>
							<p class="description">Anggora turki adalah salah satu ras kucing domestik alami tertua. Ras
								ini berasal dari Ankara, Turki. Kucing ini sangat populer dan terkenal di Indonesia.</p>
							<p class="price"><span>Rp.</span>50,000</p>
							<button class="btn_belanja" type="submit" onclick="bukaModal('Anggora')">Beli</button>
						</div>
					</div>
					<div class="card">
						<div class="card-image">
							<img src="assets/persia.png" alt="gambar tidak ditemukan" />
						</div>
						<div class="card-content">
							<h5>Persia</h5>
							<p class="description">Kucing persia adalah ras kucing domestik berbulu panjang dengan
								karakter wajah bulat dan moncong pendek. Namanya mengacu pada Persia.</p>
							<p class="price"><span>Rp.</span>50,000</p>
							<button class="btn_belanja" type="submit" onclick="bukaModal('Persia')">Beli</button>
						</div>
					</div>
					<div class="card">
						<div class="card-image">
							<img src="assets/british.png" alt="gambar tidak ditemukan" />
						</div>
						<div class="card-content">
							<h5>British Shorthair</h5>
							<p class="description">Kucing bulu pendek britania adalah salah satu ras kucing tertua di
								inggris. Kucing ini adalah kucing berbadan sedang dengan bulu yang pendek. </p>
							<p class="price"><span>Rp.</span>50,000</p>
							<button class="btn_belanja" type="submit"
								onclick="bukaModal('British Shorthair')">Beli</button>
						</div>
					</div>
				</div>

			</div>
			<!-- Form Pemesanan Produk: validasi if-else dan hasil perhitungan -->
			<div id="myModal" class="modal-container" onclick="tutupModal()">
				<div class="modal-dialog" onclick="event.stopPropagation()">
					<div class="modal-content">
						<div class="modal-header">
							<h1 class="modal-title" style="color:#ffb72b;">Form Pemesanan Produk</h1>
							<button type="button" class="btn-close" aria-label="Tutup" onclick="tutupModal()"></button>
						</div>
						<div class="modal-body">
							<form id="form-pemesanan" onsubmit="prosesPemesanan(event)">
								<div class="form-group"><label class="labelmodal" for="recipient-name">Nama Pembeli:</label><input class="inputdata" type="text" id="recipient-name" placeholder="Masukkan nama" required></div>
								<div class="form-group"><label class="labelmodal" for="handphone">No. HP:</label><input class="inputdata" type="tel" id="handphone" placeholder="Masukkan nomor HP" required></div>
								<div class="form-group"><label class="labelmodal" for="alamat-text">Alamat:</label><textarea class="inputalamat" id="alamat-text" placeholder="Masukkan alamat" required></textarea></div>
								<div class="form-group"><label class="labelmodal" for="produk">Produk:</label><select class="inputdata" id="produk" required onchange="aturHargaProduk()"><option value="">-- Pilih produk --</option><option value="Anggora" data-harga="50000">Anggora</option><option value="Persia" data-harga="50000">Persia</option><option value="British Shorthair" data-harga="50000">British Shorthair</option></select></div>
								<div class="form-group"><label class="labelmodal" for="harga">Harga satuan (Rp):</label><input class="inputdata" type="number" id="harga" min="1" step="1" placeholder="Harga produk" required></div>
								<div class="form-group"><label class="labelmodal" for="jumlah">Jumlah:</label><input class="inputdata" type="number" id="jumlah" min="1" step="1" placeholder="Jumlah produk" required></div>
								<div class="modal-footer"><button type="button" class="btn btn-secondary" onclick="tutupModal()">Batal</button><button type="submit" class="btn btn-yellow">Hitung Total</button></div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- Tabel hasil pemesanan ditampilkan setelah data valid -->
			<section id="hasil-pemesanan" style="display:none; margin:30px 0; overflow-x:auto;">
				<h2>Hasil Pemesanan</h2>
				<table style="width:100%; border-collapse:collapse; background:#fff; text-align:left;">
					<thead><tr style="background:#ffb72b; color:#222;"><th style="padding:10px; border:1px solid #ddd;">Nama</th><th style="padding:10px; border:1px solid #ddd;">No. HP</th><th style="padding:10px; border:1px solid #ddd;">Alamat</th><th style="padding:10px; border:1px solid #ddd;">Produk</th><th style="padding:10px; border:1px solid #ddd;">Jumlah</th><th style="padding:10px; border:1px solid #ddd;">Harga Satuan</th><th style="padding:10px; border:1px solid #ddd;">Subtotal</th><th style="padding:10px; border:1px solid #ddd;">Diskon</th><th style="padding:10px; border:1px solid #ddd;">Total Bayar</th></tr></thead>
					<tbody id="hasil-tabel"></tbody>
				</table>
			</section>
		</main>
		<footer>
			<h4>&copy; Lab Pemrograman Komputer 2024</h4>
		</footer>
	</div>
	<script>
		// Menyimpan produk yang dipilih agar harga satuan dapat diisi otomatis.
		function bukaModal(kategori) {
			document.getElementById("myModal").style.display = "flex";
			const produk = document.getElementById("produk");
			produk.value = kategori;
			aturHargaProduk();
		}

		function tutupModal() {
			document.getElementById("myModal").style.display = "none";
		}

		// Mengatur harga awal berdasarkan produk yang dipilih.
		function aturHargaProduk() {
			const produk = document.getElementById("produk");
			const pilihan = produk.options[produk.selectedIndex];
			if (pilihan && pilihan.dataset.harga) {
				document.getElementById("harga").value = pilihan.dataset.harga;
			} else {
				document.getElementById("harga").value = "";
			}
		}

		// Function untuk menghitung subtotal, diskon 10% (jika subtotal > Rp100.000), dan total akhir.
		function hitungTotal(harga, jumlah) {
			const subtotal = harga * jumlah;
			let diskon = 0;
			if (subtotal > 100000) {
				diskon = subtotal * 0.10;
			} else {
				diskon = 0;
			}
			return { subtotal: subtotal, diskon: diskon, total: subtotal - diskon };
		}

		// Validasi menggunakan if-else. Semua field wajib diisi; harga dan jumlah harus lebih dari nol.
		function prosesPemesanan(event) {
			event.preventDefault();
			const nama = document.getElementById("recipient-name").value.trim();
			const nomorhp = document.getElementById("handphone").value.trim();
			const alamat = document.getElementById("alamat-text").value.trim();
			const produk = document.getElementById("produk").value;
			const harga = Number(document.getElementById("harga").value);
			const jumlah = Number(document.getElementById("jumlah").value);

			if (nama === "" || nomorhp === "" || alamat === "" || produk === "" || document.getElementById("harga").value === "" || document.getElementById("jumlah").value === "") {
				alert("Semua field wajib diisi!");
			} else if (!Number.isFinite(harga) || harga <= 0) {
				alert("Harga harus berupa angka dan lebih besar dari nol!");
			} else if (!Number.isInteger(jumlah) || jumlah <= 0) {
				alert("Jumlah harus berupa bilangan bulat dan lebih besar dari nol!");
			} else {
				const hasil = hitungTotal(harga, jumlah);
				const formatRupiah = angka => new Intl.NumberFormat("id-ID", { style: "currency", currency: "IDR", maximumFractionDigits: 0 }).format(angka);
				document.getElementById("hasil-tabel").innerHTML = `<tr>
					<td style="padding:10px;border:1px solid #ddd;">${aman(nama)}</td>
					<td style="padding:10px;border:1px solid #ddd;">${aman(nomorhp)}</td>
					<td style="padding:10px;border:1px solid #ddd;">${aman(alamat)}</td>
					<td style="padding:10px;border:1px solid #ddd;">${aman(produk)}</td>
					<td style="padding:10px;border:1px solid #ddd;">${jumlah}</td>
					<td style="padding:10px;border:1px solid #ddd;">${formatRupiah(harga)}</td>
					<td style="padding:10px;border:1px solid #ddd;">${formatRupiah(hasil.subtotal)}</td>
					<td style="padding:10px;border:1px solid #ddd;">${formatRupiah(hasil.diskon)}</td>
					<td style="padding:10px;border:1px solid #ddd;font-weight:bold;">${formatRupiah(hasil.total)}</td>
				</tr>`;
				document.getElementById("hasil-pemesanan").style.display = "block";
				tutupModal();
				document.getElementById("hasil-pemesanan").scrollIntoView({ behavior: "smooth" });
				alert("Pemesanan berhasil dihitung. Silakan periksa tabel hasil pemesanan.");
			}
		}

		// Mengamankan teks yang dimasukkan pengguna sebelum ditampilkan di tabel.
		function aman(teks) {
			return String(teks).replace(/[&<>"']/g, karakter => ({ "&": "&amp;", "<": "&lt;", ">": "&gt;", '"': "&quot;", "'": "&#039;" }[karakter]));
		}
	</script>
</body>

</html>
