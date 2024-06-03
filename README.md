# Sistem Manajemen Klinik

Ini adalah Sistem Manajemen Klinik yang dibangun menggunakan framework Laravel dan Tailwind CSS. Sistem ini memiliki tiga peran: Pengguna, Admin, dan Dokter. Setiap peran memiliki fungsionalitas spesifik yang disesuaikan dengan kebutuhan mereka.

## Fitur

### Peran Pengguna
- **Reservasi**: Pengguna dapat melakukan reservasi untuk janji temu di klinik.
- **Data Dokter**: Pengguna dapat melihat informasi tentang dokter yang tersedia di klinik.
- **Data Obat**: Pengguna dapat melihat daftar obat yang tersedia di klinik.
- **Akun Saya**:
  - **Catatan Pemeriksaan**: Pengguna dapat melihat catatan pemeriksaan medis mereka.
  - **Data Reservasi**: Pengguna dapat melihat riwayat dan detail reservasi mereka.

### Peran Admin
- **Manajemen Akun**: Admin dapat melihat dan mengelola akun pengguna.
- **Manajemen Obat**: Admin dapat menambahkan obat baru ke inventaris klinik.
- **Manajemen Dokter**: Admin dapat menambahkan dokter baru ke daftar klinik.
- **Pendaftaran Pasien**: Admin dapat melihat daftar pasien yang telah mendaftar di sistem.

### Peran Dokter
- **Data Pasien**: Dokter dapat melihat data pasien yang akan diperiksa dan memberikan hasil pemeriksaan dan obat untuk pasien.

## Instalasi

Untuk menginstal dan menjalankan proyek ini secara lokal, ikuti langkah-langkah berikut:

1. **Clone repositori**:
   ```bash
   git clone https://github.com/asans22/Sistem-Manajemen-klinik.git
   cd sistem-manajemen-klinik
   ```

2. **Instal dependensi**:
   ```bash
   composer install
   npm install
   ```

3. **Salin file environment contoh dan konfigurasikan variabel lingkungan Anda**:
   ```bash
   cp .env.example .env
   ```

4. **Generate kunci aplikasi**:
   ```bash
   php artisan key:generate
   ```

5. **Jalankan migrasi database**:
   ```bash
   php artisan migrate
   ```

6. **Seed database (opsional)**:
   ```bash
   php artisan db:seed
   ```

7. **Kompilasi aset**:
   ```bash
   npm run dev
   ```

8. **Mulai server pengembangan lokal**:
   ```bash
   php artisan serve
   ```

## Penggunaan

Setelah menyelesaikan langkah-langkah instalasi, Anda dapat mengakses aplikasi di `http://localhost:8000`. Bergantung pada peran yang diberikan kepada akun Anda, Anda akan memiliki akses ke fungsionalitas yang berbeda seperti yang dijelaskan di atas.

## Kontribusi

Jika Anda ingin berkontribusi pada proyek ini, silakan ikuti langkah-langkah berikut:

1. Fork repositori.
2. Buat branch baru (`git checkout -b fitur/FiturAnda`).
3. Commit perubahan Anda (`git commit -am 'Tambahkan fitur baru'`).
4. Push ke branch (`git push origin fitur/FiturAnda`).
5. Buat Pull Request baru.

## Team members:
1. Ahmad Syah Ramadhan 2208107010033
2. Agil Mughni 2208107010025


## Kontak

Untuk pertanyaan atau saran, silakan hubungi saya di [ahmadsyahrmdn@gmail.com] atau rekan saya [agilmughni1@gmail.com].

---

README ini memberikan gambaran umum tentang Sistem Manajemen Klinik, instruksi instalasi, dan detail tentang cara menggunakan dan berkontribusi pada proyek ini. Jika Anda memiliki pertanyaan tambahan atau memerlukan bantuan lebih lanjut, jangan ragu untuk menghubungi saya.