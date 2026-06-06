<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canvas Engine - Langkah 0: Konfigurasi Composer</title>
    <style>
        :root {
            --text-muted: #94a3b8;
            --border-dark: #1e1b4b;
            --purple-glow: #c084fc;
            --purple-neon: #a855f7;
            --bg-dark: #0f0f1a;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #05050a;
            font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            padding: 2rem;
            color: #e2e8f0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: #0a0a10;
            border-radius: 24px;
            padding: 2rem;
            box-shadow: 0 20px 35px -10px rgba(0,0,0,0.5);
        }

        h2 {
            font-size: 1.8rem;
            margin-bottom: 1rem;
            color: #fff;
            border-left: 4px solid var(--purple-glow);
            padding-left: 1rem;
        }

        h3 {
            font-size: 1.4rem;
            margin: 1.5rem 0 1rem;
            color: #f1f5f9;
        }

        code {
            background: #0c0c14;
            padding: 0.2rem 0.4rem;
            border-radius: 6px;
            font-family: 'Fira Code', 'Cascadia Code', monospace;
            font-size: 0.85rem;
            color: #facc15;
        }

        pre {
            background: #050508;
            border: 1px solid var(--border-dark);
            border-radius: 12px;
            padding: 1rem;
            overflow-x: auto;
            margin: 1.2rem 0;
        }

        pre code {
            background: none;
            padding: 0;
            color: #c084fc;
            font-size: 0.85rem;
        }

        .comment {
            color: #6b7280;
            font-style: italic;
        }

        hr {
            border: 0;
            border-top: 1px solid var(--border-dark);
            margin: 2rem 0;
        }

        .callout {
            border-left: 4px solid;
            padding: 1rem 1.2rem;
            border-radius: 12px;
            margin: 1.5rem 0;
            background: rgba(0,0,0,0.3);
        }

        .grid-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            margin: 1.5rem 0;
        }

        .card {
            background-color: #0c0c14;
            border: 1px solid var(--border-dark);
            border-radius: 16px;
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card h4 {
            color: #fff;
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .card ol {
            padding-left: 1.2rem;
            font-size: 0.85rem;
            color: var(--text-muted);
        }

        .card ol li {
            margin-bottom: 0.5rem;
        }

        .badge {
            font-size: 0.7rem;
            color: #64748b;
            border-top: 1px solid #1e1b4b;
            padding-top: 0.8rem;
            margin-top: 1rem;
        }

        .lead {
            font-size: 1rem;
            color: var(--text-muted);
            margin-bottom: 1.5rem;
        }

        @media (max-width: 640px) {
            body {
                padding: 1rem;
            }
            .container {
                padding: 1.2rem;
            }
            h2 {
                font-size: 1.4rem;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Langkah 0: Cek & Konfigurasi Paket Manager (Composer)</h2>
    <p class="lead">
        Framework <strong>Canvas</strong> memanfaatkan infrastruktur modern berbasis <strong>Composer</strong> sebagai jantung pengelolaan pustaka (<em>dependency manager</em>), pemetaan ruang nama kelas (<em>PSR-4 Autoloading</em>), serta manajemen skrip otomasi eksternal. Sebelum Anda mengeksekusi perintah instalasi framework, sistem Anda wajib memiliki Composer yang terkonfigurasi secara global.
    </p>

    <div style="background-color: #0c0c14; border: 1px solid var(--border-dark); padding: 1.5rem; border-radius: 16px; margin: 1.5rem 0;">
        <h4 style="color: var(--purple-glow); margin-top: 0; margin-bottom: 0.75rem;">📦 Bagaimana Composer Bekerja pada Canvas Engine?</h4>
        <p style="font-size: 0.9rem; color: var(--text-muted); margin-bottom: 0;">
            Saat Anda menjalankan perintah pembuatan proyek, Composer tidak sekadar mengunduh file. Ia menganalisis manifest <code>composer.json</code>, mengunduh komponen core Canvas, memverifikasi kecocokan versi ekstensi PHP pada komputer Anda, lalu membangun sebuah file bernama <code>vendor/autoload.php</code>. File inilah yang membuat Anda bisa memanggil seluruh komponen UI Canvas secara instan tanpa perlu menulis fungsi <code>include</code> manual di setiap file.
        </p>
    </div>

    <h3>1. Validasi Kesiapan Environment PHP</h3>
    <p>Composer adalah aplikasi berbasis PHP. Oleh karena itu, langkah paling pertama adalah memastikan bahwa biner PHP Anda sudah terdaftar di sistem operasi dan versinya memenuhi syarat minimum (<strong style="color: var(--purple-glow);">PHP 8.1 atau lebih baru</strong>).</p>
    <p>Buka terminal, Command Prompt, atau PowerShell Anda, lalu jalankan perintah berikut:</p>
    <pre><code><span class="comment"># Memeriksa versi PHP aktif di CLI</span>
php -v</code></pre>
    <p style="font-size: 0.85rem; color: var(--text-muted);">
        Jika terminal menampilkan informasi versi PHP (misal: <em>PHP 8.2.x</em>), Anda bisa langsung lanjut ke tahap pengecekan Composer. Namun, jika muncul error <em>"php is not recognized"</em>, pastikan Anda sudah menginstal bundler seperti XAMPP/Laragon dan telah memasukkan folder instalasi PHP-nya ke dalam variabel lingkungan sistem (PATH).
    </p>

    <hr>

    <h3>2. Uji Status Aktif Composer</h3>
    <p>Setelah PHP dipastikan aman, periksa apakah Composer sudah terpasang di sistem operasi Anda dengan mengeksekusi perintah biner global berikut:</p>
    <pre><code><span class="comment"># Memeriksa status dan versi Composer global</span>
composer --version</code></pre>

    <div class="callout" style="border-color: var(--purple-neon);">
        <h4 style="color: #fff; margin-top: 0; margin-bottom: 0.5rem;">💡 Terminal Menampilkan Pesan Error / Command Not Found?</h4>
        <p style="margin-bottom: 0; font-size: 0.85rem;">
            Jangan panik. Itu tandanya utilitas Composer belum terpasang atau jalurnya belum terdaftar di sistem komputer Anda. Silakan ikuti instruksi instalasi mendalam di bawah ini sesuai dengan jenis sistem operasi yang Anda gunakan:
        </p>
    </div>

    <div class="grid-cards">
        <div class="card">
            <div>
                <h4>🪟 Microsoft Windows Setup</h4>
                <p style="font-size: 0.8rem; margin-bottom: 0.8rem; color: var(--text-muted);">Prosedur instalasi otomatis menggunakan berkas eksekusi biner resmi.</p>
                <ol>
                    <li>Akses laman unduhan resmi dan ambil berkas <a href="https://getcomposer.org/Composer-Setup.exe" style="color: var(--purple-glow);">Composer-Setup.exe</a>.</li>
                    <li>Klik ganda pada file yang diunduh. Pilih opsi <strong>"Install for all users"</strong>.</li>
                    <li>Installer akan otomatis mendeteksi lokasi <code>php.exe</code> Anda (XAMPP/Laragon). Pastikan jalurnya benar.</li>
                    <li>Lewati konfigurasi Proxy, klik <em>Next</em> hingga selesai.</li>
                </ol>
            </div>
            <div class="badge">📌 Cocok untuk: Windows 10 & 11</div>
        </div>
        <div class="card">
            <div>
                <h4>🍏 Apple macOS Setup</h4>
                <p style="font-size: 0.8rem; margin-bottom: 0.8rem; color: var(--text-muted);">Menggunakan Homebrew, bersih dan otomatis.</p>
                <ol>
                    <li>Buka <strong>Terminal</strong>.</li>
                    <li>Jika Homebrew terpasang, jalankan:
                        <pre style="margin: 0.5rem 0; padding: 0.4rem;"><code style="color:#c084fc;">brew install composer</code></pre>
                    </li>
                    <li>Homebrew akan mengunduh PHP dan menautkan symlink biner Composer.</li>
                </ol>
            </div>
            <div class="badge">📌 Cocok untuk: Mac Intel & Apple Silicon (M1/M2/M3)</div>
        </div>
        <div class="card">
            <div>
                <h4>🐧 GNU/Linux Setup</h4>
                <p style="font-size: 0.8rem; margin-bottom: 0.8rem; color: var(--text-muted);">Distro Debian/Ubuntu/Mint/Pop!_OS.</p>
                <ol>
                    <li>Update repositori:
                        <pre style="margin: 0.5rem 0; padding: 0.4rem;"><code style="color:#c084fc;">sudo apt update</code></pre>
                    </li>
                    <li>Install Composer:
                        <pre style="margin: 0.5rem 0; padding: 0.4rem;"><code style="color:#c084fc;">sudo apt install composer -y</code></pre>
                    </li>
                    <li>Masukkan password sudo jika diminta.</li>
                </ol>
            </div>
            <div class="badge">📌 Cocok untuk: Server VPS & Ubuntu Desktop</div>
        </div>
    </div>

    <div class="callout" style="border-color: #eab308; background: linear-gradient(90deg, rgba(234,179,8,0.06) 0%, rgba(0,0,0,0) 100%);">
        <strong style="color: #eab308; display: block; margin-bottom: 0.3rem;">⚠️ Prosedur Wajib Setelah Instalasi Baru:</strong>
        <p style="margin-bottom: 0; font-size: 0.85rem;">
            Setelah proses instalasi Composer di atas selesai dinyatakan sukses, sistem operasi komputer Anda tidak akan langsung mengenali perintah tersebut pada jendela terminal yang sedang aktif saat ini. Anda <strong>wajib menutup aplikasi terminal tersebut (Close/Exit)</strong> lalu membukanya kembali. Langkah ini memaksa sistem operasi membaca ulang variabel lingkungan (<em>reload PATH configuration</em>) yang baru saja diperbarui oleh installer Composer.
        </p>
    </div>

    <hr>

    <h3>3. Jalankan Mode Diagnostik (Opsional)</h3>
    <p>Jika Anda ingin memastikan bahwa instalasi Composer Anda berjalan sempurna tanpa ada malfungsi internal atau korup file, eksekusi skrip diagnosa internal berikut:</p>
    <pre><code><span class="comment"># Melakukan verifikasi kesehatan lingkungan kerja Composer</span>
composer diagnose</code></pre>
    <p style="font-size: 0.85rem; color: var(--text-muted);">
        Jika semua parameter menunjukkan status <span style="color: #10b981; font-weight: bold;">[OK]</span>, berarti paket manajemen Anda sudah siap bertempur. Anda bisa langsung bergeser ke langkah berikutnya untuk meluncurkan proyek framework Canvas baru Anda!
    </p>

    <hr>

    <h3>4. 🚀 Membuat & Menjalankan Proyek Canvas Pertama Anda</h3>
    <p style="font-size: 0.9rem; color: var(--text-muted);">
        Jika Anda <strong>belum menginstal Composer</strong>, silakan ikuti panduan instalasi untuk sistem operasi Anda di atas (Windows, macOS, atau Linux). Pastikan Composer sudah terpasang dengan benar dengan mengetik <code>composer --version</code> di terminal.
    </p>
    <p style="font-size: 0.9rem; color: var(--text-muted);">
        Setelah Composer siap, buka terminal/command prompt, lalu jalankan perintah berikut untuk membuat proyek baru menggunakan package resmi <strong style="color: var(--purple-glow);">workazz/canvas</strong>:
    </p>
    <pre><code><span class="comment"># Ganti "nama-project-kamu" sesuai keinginan</span>
composer create-project workazz/canvas nama-project-kamu</code></pre>
    <p style="font-size: 0.9rem; color: var(--text-muted);">
        Perintah di atas akan mengunduh seluruh struktur framework Canvas beserta dependensinya. Setelah proses selesai, masuk ke direktori proyek:
    </p>
    <pre><code>cd nama-project-kamu</code></pre>
    <p style="font-size: 0.9rem; color: var(--text-muted);">
        Terakhir, jalankan server bawaan Canvas dengan perintah khas berikut:
    </p>
    <pre><code><span class="comment"># Menjalankan aplikasi Canvas di localhost</span>
php canvas gas</code></pre>

    <div class="callout" style="border-color: #10b981; background: linear-gradient(90deg, rgba(16,185,129,0.06) 0%, rgba(0,0,0,0) 100%); margin-top: 1rem;">
        <strong style="color: #10b981; display: block; margin-bottom: 0.3rem;">✅ Hasil yang Diharapkan:</strong>
        <p style="margin-bottom: 0; font-size: 0.85rem;">
            Setelah menjalankan <code>php canvas gas</code>, terminal akan menampilkan alamat server seperti <strong>http://localhost:8000</strong>. Buka alamat tersebut di peramban Anda, dan halaman selamat datang Canvas Engine akan tampil. Selamat, Anda telah berhasil menginstal dan menjalankan framework Canvas!
        </p>
    </div>

    <hr style="margin-top: 2rem;">
    <p style="text-align: center; font-size: 0.75rem; color: #4b5563;">© 2025 Canvas Engine — Dokumentasi Profesional</p>
</div>
</body>
</html>