# Contributing Guidelines

> Harap baca panduan ini sebelum berkontribusi ke proyek ini.

## Branching

-   Gunakan branch `master` untuk branch utama.
-   Buat branch baru dari branch `master` untuk setiap fitur yang akan dikerjakan.
-   Format nama branch: `feat/nama-fitur` atau `fix/nama-fitur`.
-   Contoh: `feat/login` atau `fix/login`.
<!-- (Kondisi brancing jika membuat feature baru yang perlu di review dan pull request) -->

## Commit Message

-   Gunakan bahasa Inggris.
-   Gunakan format: `enhance(nama-fitur): deskripsi-fitur` atau `fix(nama-fitur): deskripsi-fitur`.
-   Contoh: `enhance(login): add-validation-on-login-form`.
-   Gunakan kata kerja yang sesuai dengan perubahan yang dilakukan.
<!-- (Kondisi jika hanya menigkatkan feature pada salah satu branch) -->

## Code Style

<!-- cek phpcs -->
<!-- jalankan -->

composer phpcbf

<!-- jika belum install silahkan install phpcs -->
<!-- jalankan dua perintah ini -->

composer require --dev squizlabs/php_codesniffer
composer require --dev friendsofphp/php-cs-fixer

-   Gunakan standar penulisan kode PHP PSR-12.
-   Jalan kan `./vendor/bin/php-cs-fixer fix --config=php-cs-fixer.php` untuk unit test.
-   Jalan kan `./vendor/bin/phpcbf --standard=PSR12 app/` untuk memperbaiki penulisan kode.
-   Jalan kan `./vendor/bin/phpcs --standard=PSR12 app/` untuk memeriksa penulisan kode.
-   Jangan lupa untuk memperbarui dokumentasi jika diperlukan.
<!-- (run di terminal dalam project) -->
