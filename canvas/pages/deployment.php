<h1>Panduan Produksi & Deployment</h1>
<p class="lead" style="font-size: 18px; color: var(--text-pure); line-height: 1.8;">
    Memindahkan aplikasi Canvas dari komputer lokal Anda ke server produksi (internet live) sangatlah mudah karena Canvas tidak memerlukan mesin runtime khusus. Cukup pastikan server tujuan mendukung PHP versi terbaru.
</p>

<hr style="border: 0; border-top: 1px solid var(--border-dark); margin: 40px 0;">

<h2>1. Langkah Optimasi Wajib (Pre-Deployment)</h2>
<p>Sebelum mengunggah file Anda ke server, jalankan perintah optimasi Composer berikut di komputer lokal Anda untuk mengompres peta kelas (*classmap*) internal aplikasi agar loading web naik drastis:</p>

<pre><code><span class="comment"># Mematikan dependensi testing/dev dan mengoptimasi autoloading</span>
composer install --no-dev --optimize-autoloader</code></pre>

<div class="callout" style="border-color: #eab308; background: linear-gradient(90deg, rgba(234,179,8,0.06) 0%, rgba(0,0,0,0) 100%);">
    <strong style="color: #eab308;">⚠️ Perhatian:</strong> Setelah perintah di atas dijalankan, semua perkas development seperti unit testing tidak akan dimuat demi menghemat konsumsi memori RAM server produksi Anda.
</div>

<hr style="border: 0; border-top: 1px solid var(--border-dark); margin: 40px 0;">

<h2>2. Opsi A: Deployment ke Shared Hosting (cPanel)</h2>
<p>Jika Anda menggunakan hosting murah konvensional, ikuti trik struktur folder berikut untuk menjamin web Anda tetap aman:</p>
<ol style="padding-left: 20px; color: var(--text-muted); line-height: 1.8; margin-bottom: 20px;">
    <li style="margin-bottom: 8px;">Unggah folder <code>public/</code> milik Canvas ke dalam folder <code>public_html</code> bawaan hosting Anda.</li>
    <li style="margin-bottom: 8px;">Unggah seluruh folder sisanya (<code>app/</code>, <code>views/</code>, <code>components/</code>, <code>canvas/</code>) ke satu tingkat **di luar** folder <code>public_html</code>.</li>
    <li>Sesuaikan jalur pemanggilan skrip autoloader di file <code>public_html/index.php</code> agar mengarah dengan benar ke folder core luar Anda.</li>
</ol>

<p>Jika terpaksa menaruh seluruh folder di dalam <code>public_html</code>, pastikan Anda membuat file keamanan tambahan bernama <code>.htaccess</code> di folder root proyek Anda untuk memblokir akses pengunjung asing:</p>

<p style="font-size: 14px; color: var(--purple-glow); margin-bottom: 5px;">📍 Konfigurasi File: <code>.htaccess</code></p>
<pre><code>&lt;IfModule mod_rewrite.c&gt;
    RewriteEngine On
    # Mengarahkan seluruh lalu lintas otomatis ke folder public/
    RewriteRule ^$ public/ [L]
    RewriteRule (.*) public/$1 [L]
&lt;/IfModule&gt;</code></pre>

<hr style="border: 0; border-top: 1px solid var(--border-dark); margin: 40px 0;">

<h2>3. Opsi B: Deployment ke VPS (Nginx Konfigurasi)</h2>
<p>Bagi Anda yang menggunakan Virtual Private Server berbasis Ubuntu/Debian dengan Nginx, gunakan blok konfigurasi *server block* profesional di bawah ini untuk mengunci performa terbaik Canvas:</p>

<p style="font-size: 14px; color: var(--purple-glow); margin-bottom: 5px;">📍 Berkas Konfigurasi: <code>/etc/nginx/sites-available/canvas-app</code></p>
<pre><code>server {
    listen 80;
    server_name domainkamu.com;
    
    # CRUCIAL: Arahkan root langsung ke folder public bawaan Canvas
    root /var/www/nama-project-kamu/public;
    index index.php index.html;

    location / {
        # Mengizinkan URL Cantik (Pretty URLs) Canvas bekerja penuh
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
    }

    location ~ /\.ht {
        deny all;
    }
}</code></pre>

<p style="font-size: 15px;">Setelah menyimpan konfigurasi di atas, jangan lupa untuk melakukan uji coba dan merestart layanan web server Anda:</p>
<pre><code>sudo nginx -t
sudo systemctl restart nginx</code></pre>