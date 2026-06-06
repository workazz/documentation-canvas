<h1>Visi & Pengenalan</h1>
<p class="lead" style="font-size: 18px; color: var(--text-pure); line-height: 1.8;">
    <strong>Canvas</strong> adalah *modern frontend engine* ultra-cepat yang dibangun khusus di atas PHP Native. Framework ini dirancang untuk memberikan pengalaman pengembangan UI yang deklaratif, modular, dan terstruktur layaknya ekosistem JavaScript modern (React atau Vite), namun tetap mempertahankan efisiensi murni dan kecepatan kompilasi *Server-Side Rendering* (SSR) bawaan PHP.
</p>

<div class="callout">
    <h4 style="color: var(--purple-glow); margin-bottom: 8px; font-size: 16px;">💡 Kenapa Canvas Diciptakan?</h4>
    <p style="margin-bottom: 0; font-size: 15px;">
        Banyak *developer* PHP terjebak dalam dilema besar: mengadopsi framework JS modern yang menambah beban *overhead* ukuran file serta kompleksitas *build tools*, atau kembali ke PHP murni namun berakhir dengan kode *spaghetti* yang sulit dirawat. Canvas hadir sebagai jembatan emas. Kami memberikan struktur komponen yang bersih, *zero runtime overhead*, dan dioptimasi penuh untuk skalabilitas jangka panjang.
    </p>
</div>

<hr style="border: 0; border-top: 1px solid var(--border-dark); margin: 40px 0;">

<h2>Filosofi Inti Canvas</h2>
<p>Arsitektur Canvas didasarkan pada tiga pilar utama untuk memastikan pengembang dapat fokus pada produk tanpa mengorbankan performa mesin:</p>

<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px; margin: 30px 0;">
    <div style="background-color: var(--bg-card); border: 1px solid var(--border-dark); padding: 20px; border-radius: 8px;">
        <h4 style="color: var(--text-pure); margin-bottom: 10px;">🧠 Developer Experience (DX) First</h4>
        <p style="font-size: 14px; margin-bottom: 0;">Menulis kode UI berbasis komponen di PHP kini semudah menulis fungsi di JavaScript. Sintaks yang intuitif membuat proses *onboarding* tim menjadi instan.</p>
    </div>
    <div style="background-color: var(--bg-card); border: 1px solid var(--border-dark); padding: 20px; border-radius: 8px;">
        <h4 style="color: var(--text-pure); margin-bottom: 10px;">📉 Zero Runtime Dependency</h4>
        <p style="font-size: 14px; margin-bottom: 0;">Canvas tidak membutuhkan Node.js, npm, atau bundler eksternal di server produksi Anda. Selama server Anda memiliki interpreter PHP, Canvas siap melesat.</p>
    </div>
    <div style="background-color: var(--bg-card); border: 1px solid var(--border-dark); padding: 20px; border-radius: 8px;">
        <h4 style="color: var(--text-pure); margin-bottom: 10px;">🔒 Secure Server-Side State</h4>
        <p style="font-size: 14px; margin-bottom: 0;">Semua manipulasi komponen terjadi di sisi server yang aman, meminimalisir celah keamanan manipulasi data di sisi *client-side* (browser).</p>
    </div>
</div>

<hr style="border: 0; border-top: 1px solid var(--border-dark); margin: 40px 0;">

<h2>Fitur Utama & Ekosistem Internal</h2>
<p>Meskipun berjalan di atas PHP Native, Canvas dilengkapi dengan ekosistem modern terintegrasi yang bisa langsung Anda gunakan tanpa instalasi tambahan:</p>

<ul style="list-style: none; padding-left: 0; margin-bottom: 30px;">
    <li style="margin-bottom: 20px; display: flex; align-items: start; gap: 15px;">
        <span style="background: rgba(168, 85, 247, 0.2); color: var(--purple-glow); padding: 4px 10px; border-radius: 4px; font-weight: bold; font-size: 14px;">01</span>
        <div>
            <strong style="color: var(--text-pure); display: block; font-size: 16px;">Sistem Komponen Deklaratif</strong>
            <span style="color: var(--text-muted); font-size: 15px;">Pisah elemen UI global seperti Navbar, Sidebar, Card, atau Modal ke dalam file mandiri. Gunakan kembali di halaman mana pun cukup dengan satu baris fungsi PHP.</span>
        </div>
    </li>
    <li style="margin-bottom: 20px; display: flex; align-items: start; gap: 15px;">
        <span style="background: rgba(168, 85, 247, 0.2); color: var(--purple-glow); padding: 4px 10px; border-radius: 4px; font-weight: bold; font-size: 14px;">02</span>
        <div>
            <strong style="color: var(--text-pure); display: block; font-size: 16px;">Native Asset Optimizing (CSS/JS)</strong>
            <span style="color: var(--text-muted); font-size: 15px;">Canvas secara cerdas mengelompokkan dan memuat aset statis hanya ketika komponen terkait dipanggil oleh halaman. Tidak ada lagi pemborosan kuota *bandwidth* untuk CSS yang tidak terpakai.</span>
        </div>
    </li>
    <li style="margin-bottom: 20px; display: flex; align-items: start; gap: 15px;">
        <span style="background: rgba(168, 85, 247, 0.2); color: var(--purple-glow); padding: 4px 10px; border-radius: 4px; font-weight: bold; font-size: 14px;">03</span>
        <div>
            <strong style="color: var(--text-pure); display: block; font-size: 16px;">Automated Clean URL Routing</strong>
            <span style="color: var(--text-muted); font-size: 15px;">Sistem routing bawaan yang langsung memetakan URL browser ke file view Anda tanpa perlu menulis file `.htaccess` atau konfigurasi Nginx yang berbelit-belit.</span>
        </div>
    </li>
    <li style="margin-bottom: 20px; display: flex; align-items: start; gap: 15px;">
        <span style="background: rgba(168, 85, 247, 0.2); color: var(--purple-glow); padding: 4px 10px; border-radius: 4px; font-weight: bold; font-size: 14px;">04</span>
        <div>
            <strong style="color: var(--text-pure); display: block; font-size: 16px;">Canvas CLI Engine (php canvas gas)</strong>
            <span style="color: var(--text-muted); font-size: 15px;">Konsol terminal internal untuk manajemen *development server*, pembersihan otomatis file *cache*, hingga generator otomatis untuk membuat komponen terstandarisasi dalam hitungan detik.</span>
        </div>
    </li>
</ul>

<hr style="border: 0; border-top: 1px solid var(--border-dark); margin: 40px 0;">

<h2>Ekspektasi Performa & Benchmark</h2>
<p>Karena tidak menggunakan lapisan abstraksi (*layer abstraction*) yang tebal, Canvas mampu mengeksekusi request dan menyusun struktur HTML dengan konsumsi memori yang sangat minim dibanding framework konvensional:</p>

<div style="background-color: var(--bg-card); border: 1px solid var(--border-dark); border-radius: 8px; padding: 25px; margin: 20px 0;">
    <div style="margin-bottom: 15px;">
        <div style="display: flex; justify-content: space-between; font-size: 14px; margin-bottom: 5px;">
            <span>Canvas Engine (Request per Second)</span>
            <span style="color: var(--purple-glow); font-weight: bold;">~9,450 Req/Sec</span>
        </div>
        <div style="background-color: #050508; height: 12px; border-radius: 6px; overflow: hidden; border: 1px solid var(--border-dark);">
            <div style="background: linear-gradient(90deg, var(--purple-neon), var(--purple-glow)); height: 100%; width: 95%;"></div>
        </div>
    </div>
    
    <div>
        <div style="display: flex; justify-content: space-between; font-size: 14px; margin-bottom: 5px;">
            <span>Framework Monolith Lain + JS Bundler</span>
            <span style="color: var(--text-muted);">~1,200 Req/Sec</span>
        </div>
        <div style="background-color: #050508; height: 12px; border-radius: 6px; overflow: hidden; border: 1px solid var(--border-dark);">
            <div style="background-color: #3f3f46; height: 100%; width: 25%;"></div>
        </div>
    </div>
</div>
<p style="font-size: 13px; font-style: italic; color: #64748b; text-align: center;">*Diuji menggunakan ApacheBenchmark (ab) pada arsitektur server single-core 2GHz lokal.</p>

<hr style="border: 0; border-top: 1px solid var(--border-dark); margin: 40px 0;">

<h2>Siapa yang Membutuhkan Canvas?</h2>
<p>Canvas didesain secara spesifik untuk skenario pengembangan perangkat lunak berikut:</p>
<ol style="padding-left: 20px; color: var(--text-muted); line-height: 1.8;">
    <li style="margin-bottom: 10px;"><strong style="color: var(--text-pure);">Solo Developer & Agensi Kecil:</strong> Yang membutuhkan kecepatan pembuatan MVP (Minimum Viable Product) secara instan tanpa kompleksitas konfigurasi dev-ops.</li>
    <li style="margin-bottom: 10px;"><strong style="color: var(--text-pure);">Sistem Aplikasi Korporat Internal:</strong> Yang mengutamakan performa pemrosesan data sisi server (*server-heavy operations*) dengan tampilan antarmuka yang dinamis dan terstruktur.</li>
    <li><strong style="color: var(--text-pure);">Pecinta PHP Native:</strong> Yang ingin naik kelas dalam teknik menulis struktur kode (*clean code pattern*) tanpa kehilangan esensi kecepatan asli PHP murni.</li>
</ol>