<h1>Arsitektur Folder & Filosofi Desain</h1>
<p class="lead" style="font-size: 18px; color: var(--text-pure); line-height: 1.8;">
    Canvas menerapkan pola arsitektur **Strict Separation of Concerns (SoC)**. Artinya, kode untuk tampilan (*frontend*), logika bisnis (*backend*), dan konfigurasi sistem dipisahkan secara tegas demi keamanan maksimal dan kemudahan kerja tim.
</p>

<div class="callout" style="border-color: #3b82f6; background: linear-gradient(90deg, rgba(59,130,246,0.08) 0%, rgba(0,0,0,0) 100%);">
    <h4 style="color: #60a5fa; margin-bottom: 8px; font-size: 16px;">🔒 Sistem Keamanan Public Root</h4>
    <p style="margin-bottom: 0; font-size: 15px;">
        Perhatikan bahwa hanya folder <code>public/</code> saja yang boleh diakses oleh browser luar. Semua file inti aplikasi seperti folder <code>app/</code>, <code>views/</code>, dan konfigurasi rahasia disembunyikan satu tingkat di atas root internet untuk mencegah kebocoran kode sumber (*source code exposure*).
    </p>
</div>

<hr style="border: 0; border-top: 1px solid var(--border-dark); margin: 40px 0;">

<h2>Anatomi Pohon Direktori (Tree Structure)</h2>
<p>Berikut adalah peta lengkap dari struktur bawaan saat pertama kali Anda melakukan instalasi Canvas:</p>

<pre><code><span class="purple">nama-project-kamu/</span>
├── 📁 <span class="purple">app/</span>                  <span class="comment"># Core Application Logic</span>
│   ├── 📁 Controllers/      <span class="comment"># Pengatur arus data antara Model dan View</span>
│   ├── 📁 Models/           <span class="comment"># Struktur data dan manipulasi Database</span>
│   └── 📄 Helpers.php       <span class="comment"># Fungsi utilitas global buatan Anda</span>
├── 📁 <span class="purple">canvas/</span>               <span class="comment"># Core Engine Framework (Jangan Diubah!)</span>
│   ├── 📁 Cli/              <span class="comment"># Skrip di balik layar perintah 'php canvas gas'</span>
│   └── 📄 Autoloader.php    <span class="comment"># Sistem pemuat kelas otomatis</span>
├── 📁 <span class="purple">components/</span>           <span class="comment"># Kumpulan UI Modular (Reusable Components)</span>
│   ├── 📄 Navbar.php        <span class="comment"># Navigasi Atas</span>
│   └── 📄 Footer.php        <span class="comment"># Kaki Halaman</span>
├── 📁 <span class="purple">public/</span>               <span class="comment"># Satu-satunya folder yang terbuka untuk publik</span>
│   ├── 📁 css/              <span class="comment"># Tempat menyimpan file stylesheet mentah</span>
│   ├── 📁 js/               <span class="comment"># Skrip JavaScript client-side</span>
│   └── 📄 index.php         <span class="comment"># Gerbang utama masuknya seluruh request (Routing Hub)</span>
├── 📁 <span class="purple">views/</span>                <span class="comment"># Representasi halaman web Anda</span>
│   ├── 📄 home.php          <span class="comment"># Halaman Utama</span>
│   └── 📄 404.php           <span class="comment"># Halaman Error jika URL tidak ditemukan</span>
├── 📄 canvas                <span class="comment"># Skrip biner pemicu CLI internal</span>
└── 📄 composer.json         <span class="comment"># Manajemen package pihak ketiga</span></code></pre>

<hr style="border: 0; border-top: 1px solid var(--border-dark); margin: 40px 0;">

<h2>Bedah Detail Fungsi Direktori</h2>
<p>Mari kita ulas peran krusial dari masing-masing folder utama untuk membantu Anda menaruh baris kode di tempat yang tepat:</p>

<table style="width: 100%; border-collapse: collapse; background: var(--bg-card); border-radius: 8px; overflow: hidden; border: 1px solid var(--border-dark); margin-bottom: 30px;">
    <thead>
        <tr style="border-bottom: 1px solid var(--border-dark); background: #13131f;">
            <th style="padding: 15px; text-align: left; color: var(--purple-glow); font-size: 14px; width: 30%;">Nama Folder / Berkas</th>
            <th style="padding: 15px; text-align: left; color: var(--purple-glow); font-size: 14px;">Tanggung Jawab Teknis</th>
        </tr>
    </thead>
    <tbody>
        <tr style="border-bottom: 1px solid var(--border-dark);">
            <td style="padding: 15px; font-weight: bold; font-size: 14px; color: #fff;"><code>public/index.php</code></td>
            <td style="padding: 15px; font-size: 14px; color: var(--text-muted);">Bertindak sebagai <strong>Front Controller</strong>. Semua request URL (seperti /profile atau /dashboard) akan diarahkan ke file ini untuk dibaca oleh router internal Canvas.</td>
        </tr>
        <tr style="border-bottom: 1px solid var(--border-dark);">
            <td style="padding: 15px; font-weight: bold; font-size: 14px; color: #fff;"><code>views/</code></td>
            <td style="padding: 15px; font-size: 14px; color: var(--text-muted);">Berisi kerangka utama halaman Anda. Di dalam folder ini, Anda bebas mengorganisir sub-folder baru (misal: <code>views/admin/dashboard.php</code>).</td>
        </tr>
        <tr style="border-bottom: 1px solid var(--border-dark);">
            <td style="padding: 15px; font-weight: bold; font-size: 14px; color: #fff;"><code>components/</code></td>
            <td style="padding: 15px; font-size: 14px; color: var(--text-muted);">Khusus untuk komponen UI kecil yang bersifat global dan dipanggil berulang kali di berbagai halaman view yang berbeda.</td>
        </tr>
        <tr>
            <td style="padding: 15px; font-weight: bold; font-size: 14px; color: #fff;"><code>canvas</code> (file biner)</td>
            <td style="padding: 15px; font-size: 14px; color: var(--text-muted);">Merupakan file skrip PHP murni tanpa ekstensi <code>.php</code> yang dikonfigurasi agar bisa dieksekusi langsung lewat terminal CLI sistem operasi Anda.</td>
        </tr>
    </tbody>
</table>