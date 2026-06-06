<?php
// Logika routing sederhana
$page = isset($_GET['page']) ? $_GET['page'] : 'pengenalan';
$allowed_pages = ['pengenalan', 'instalasi'];

// Proteksi file traversal
if (!in_array($page, $allowed_pages)) {
    $page = 'pengenalan';
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canvas Framework Documentation</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

    <div class="sidebar">
        <h2>Canvas Framework</h2>
        <ul>
            <li>
                <a href="index.php?page=pengenalan" class="<?php echo $page == 'pengenalan' ? 'active' : ''; ?>">
                    🚀 Pengenalan
                </a>
            </li>
            <li>
                <a href="index.php?page=instalasi" class="<?php echo $page == 'instalasi' ? 'active' : ''; ?>">
                    📦 Instalasi & Run
                </a>
            </li>
        </ul>
    </div>

    <div class="content">
        <?php 
            // Memanggil konten halaman secara dinamis
            include("pages/" . $page . ".php"); 
        ?>
    </div>

</body>
</html>