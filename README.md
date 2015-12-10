# SI-Keuangan

## Cara Install

* Buka git-bash kemudian pindah ke direktori dimana proyek akan disimpan (hint: xampp/htdocs)
* Ketikkan command berikut: `git clone https://github.com/dewirizqia/SI-Keuangan.git`
* Ketika sudah selesai, masuklah kedalam direktori dimana terdapat file artisan dan composer.json
* Buatlah database baru, kemudian masukkan nama database tersebut dalam file .env (kalau belum ada buatlah file .env baru)
* Kemudian ketikkan command berikut: `composer install`
* Command ini akan menginstall package-package yang dibutuhkan oleh proyek
* Selanjutnya ketikkan command berikut: `php artisan key:generate` untuk menggenerate key app pada .env
* Terakhir ketikkan command berikut: `php artisan migrate` untuk melakukan migrasi ke database
