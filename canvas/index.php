<?php
// Pengaturan routing halaman dokumentasi
$page = isset($_GET['page']) ? $_GET['page'] : 'pengenalan';
$allowed_pages = ['pengenalan', 'instalasi', 'arsitektur', 'komponen', 'deployment'];

// Cek keamanan agar tidak terjadi file traversal
if (!in_array($page, $allowed_pages)) {
    $page = 'pengenalan';
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canvas Engine — Dokumentasi Resmi PHP Framework</title>
    <link rel="stylesheet" href="assets/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code&family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
</head>
<body>

    <?php include 'components/navbar.php'; ?>

    <div class="wrapper">
        <nav class="sidebar">
            <div class="menu-group">
                <div class="menu-title">Memulai</div>
                <ul>
                    <li><a href="index.php?page=pengenalan" class="<?= $page == 'pengenalan' ? 'active' : '' ?>">Pengenalan</a></li>
                    <li><a href="index.php?page=instalasi" class="<?= $page == 'instalasi' ? 'active' : '' ?>">Instalasi & Run</a></li>
                </ul>
            </div>

            <div class="menu-group">
                <div class="menu-title">Konsep Utama</div>
                <ul>
                    <li><a href="index.php?page=arsitektur" class="<?= $page == 'arsitektur' ? 'active' : '' ?>">Arsitektur Folder</a></li>
                    <li><a href="index.php?page=komponen" class="<?= $page == 'komponen' ? 'active' : '' ?>">Sistem Komponen</a></li>
                </ul>
            </div>

            <div class="menu-group">
                <div class="menu-title">Produksi</div>
                <ul>
                    <li><a href="index.php?page=deployment" class="<?= $page == 'deployment' ? 'active' : '' ?>">Build & Deploy</a></li>
                </ul>
            </div>
        </nav>

        <main class="content">
            <?php include "pages/" . $page . ".php"; ?>
        </main>
    </div>

    <?php include 'components/footer.php'; ?>

</body>
</html>