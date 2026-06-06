<h1>Sistem Komponen (Modular UI)</h1>
<p class="lead" style="font-size: 18px; color: var(--text-pure); line-height: 1.8;">
    Canvas menganut paradigma **Component-Driven Development**. Dengan sistem ini, Anda dapat memecah antarmuka *front-end* yang kompleks menjadi potongan-potongan kode kecil, mandiri, dan *reusable* (dapat digunakan kembali) tanpa merusak tatanan global aplikasi.
</p>

<div class="callout">
    <h4 style="color: var(--purple-glow); margin-bottom: 8px; font-size: 16px;">🧩 Mengapa Berbasis Komponen?</h4>
    <p style="margin-bottom: 0; font-size: 15px;">
        Pada pengembangan PHP tradisional, Anda sering kali melakukan *copy-paste* struktur HTML yang sama (seperti desain kartu, tombol, atau alert) di berbagai file. Jika terjadi perubahan desain, Anda harus mengubahnya satu per satu. Di Canvas, Anda hanya perlu mengubahnya di **satu file komponen**, dan seluruh aplikasi akan ter-update otomatis.
    </p>
</div>

<hr style="border: 0; border-top: 1px solid var(--border-dark); margin: 40px 0;">

<h2>1. Cara Membuat Komponen Baru</h2>
<p>Semua file komponen wajib disimpan di dalam direktori <code>components/</code> dengan format penulisan nama file menggunakan huruf kapital di awal (*PascalCase*). Mari kita buat komponen kartu informasi sederhana.</p>

<p style="font-size: 14px; color: var(--purple-glow); margin-bottom: 5px;">📍 File: <code>components/Card.php</code></p>
<pre><code>&lt;?php
/**
 * Komponen Card Global
 * @param string $title - Judul Kartu
 * @param string $description - Isi Konten Kartu
 * @param string $badge - Label Opsional (Default: 'New')
 */
function Card($title, $description, $badge = "New") {
    return "
    &lt;div class='canvas-card' style='background: #0f0f16; border: 1px solid #1e1b4b; padding: 24px; border-radius: 8px; margin-bottom: 15px;'&gt;
        &lt;div style='display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;'&gt;
            &lt;h3 style='color: #ffffff; margin: 0;'&gt;{$title}&lt;/h3&gt;
            &lt;span style='background: #a855f7; color: #fff; font-size: 12px; padding: 2px 8px; border-radius: 4px;'&gt;{$badge}&lt;/span&gt;
        &lt;/div&gt;
        &lt;p style='color: #94a3b8; font-size: 14px; margin: 0; line-height: 1.6;'&gt;{$description}&lt;/p&gt;
    &lt;/div&gt;
    ";
}
?&gt;</code></pre>

<hr style="border: 0; border-top: 1px solid var(--border-dark); margin: 40px 0;">

<h2>2. Memanggil Komponen secara Deklaratif</h2>
<p>Untuk merendernya ke dalam halaman utama (*views*), Anda tidak perlu melakukan <code>include</code> atau <code>require</code> manual per file. Core Engine Canvas secara otomatis melakukan *autoloading* komponen yang ada. Cukup panggil nama fungsinya secara langsung.</p>

<p style="font-size: 14px; color: var(--purple-glow); margin-bottom: 5px;">📍 File: <code>views/home.php</code></p>
<pre><code>&lt;div class="container" style="padding: 40px 0;"&gt;
    &lt;h2&gt;Fitur Terbaru Aplikasi Kami&lt;/h2&gt;
    &lt;p&gt;Berikut adalah data yang dipanggil menggunakan engine komponen Canvas:&lt;/p&gt;

    &lt;?php 
    <span class="comment">// Memanggil komponen dengan data berbeda (Reusable)</span>
    echo Card("Inovasi Baru", "Membangun web dengan Canvas sangatlah instan.", "Hot"); 
    
    echo Card("Performa Ekstrem", "Dioptimasi langsung oleh core server PHP Native tanpa beban JS.", "Speed");
    
    echo Card("Keamanan Berlapis", "Sistem enkripsi dan routing ketat di sisi server.", "Secure");
    ?&gt;
&lt;/div&gt;</code></pre>

<hr style="border: 0; border-top: 1px solid var(--border-dark); margin: 40px 0;">

<h2>3. Advanced: Komponen Bersarang (Nested Components)</h2>
<p>Sistem arsitektur Canvas juga mendukung pembuatan komponen di dalam komponen lain (*nesting*). Fitur ini sangat berguna untuk membuat layout kompleks seperti struktur *Grid* atau *Lists*.</p>

<p style="font-size: 14px; color: var(--purple-glow); margin-bottom: 5px;">📍 File: <code>components/GridContainer.php</code></p>
<pre><code>&lt;?php
function GridContainer($content) {
    return "
    &lt;div class='canvas-grid' style='display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin: 20px 0;'&gt;
        {$content}
    &lt;/div&gt;
    ";
}
?&gt;</code></pre>

<p style="font-size: 14px; color: var(--purple-glow); margin-bottom: 5px;">📍 Cara Penggunaan di File View:</p>
<pre><code>&lt;?php
<span class="comment">// Menggabungkan beberapa komponen menjadi satu kesatuan layout</span>
$cards = Card("Modul A", "Deskripsi modul A") . Card("Modul B", "Deskripsi modul B");

echo GridContainer($cards);
?&gt;</code></pre>

<hr style="border: 0; border-top: 1px solid var(--border-dark); margin: 40px 0;">

<h2>Aturan & Best Practices</h2>
<p>Agar performa rendering komponen tetap berada di titik tertinggi dan kode Anda tetap rapi, ikuti standarisasi berikut:</p>
<table style="width: 100%; border-collapse: collapse; background: var(--bg-card); border-radius: 8px; overflow: hidden; border: 1px solid var(--border-dark);">
    <thead>
        <tr style="border-bottom: 1px solid var(--border-dark);">
            <th style="padding: 15px; text-align: left; color: var(--purple-glow); font-size: 14px;">Aturan Ringkas</th>
            <th style="padding: 15px; text-align: left; color: var(--purple-glow); font-size: 14px;">Penjelasan Teknis</th>
        </tr>
    </thead>
    <tbody>
        <tr style="border-bottom: 1px solid var(--border-dark);">
            <td style="padding: 15px; font-weight: bold; font-size: 14px; color: #fff;">Wajib Menggunakan Return</td>
            <td style="padding: 15px; font-size: 14px; color: var(--text-muted);">Jangan gunakan <code>echo</code> di dalam file komponen langsung. Gunakan <code>return</code> berupa string HTML agar output dapat dimanipulasi oleh sistem layouting global.</td>
        </tr>
        <tr style="border-bottom: 1px solid var(--border-dark);">
            <td style="padding: 15px; font-weight: bold; font-size: 14px; color: #fff;">Gunakan Inline atau Scoped Style</td>
            <td style="padding: 15px; font-size: 14px; color: var(--text-muted);">Disarankan menyisipkan style langsung atau menggunakan utility kelas agar CSS tidak bentrok dengan komponen lain di halaman yang berbeda.</td>
        </tr>
        <tr>
            <td style="padding: 15px; font-weight: bold; font-size: 14px; color: #fff;">Gunakan Type Hinting</td>
            <td style="padding: 15px; font-size: 14px; color: var(--text-muted);">Manfaatkan fitur PHP 8+ dengan memberikan tipe data pada parameter fungsi (misal: <code>string $title</code>) demi mencegah terjadinya *error runtime*.</td>
        </tr>
    </tbody>
</table>