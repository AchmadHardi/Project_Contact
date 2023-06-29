#Dokumentasi Project Contact
<p>
    Pastikan Anda memiliki PHP terinstal di komputer Anda. Anda dapat mengunduh dan menginstal PHP dari situs resmi PHP (https://www.php.net/downloads.php). Pastikan Anda menginstal versi PHP yang sesuai dengan persyaratan Laravel (versi 7.4 ke atas direkomendasikan).
</p>
<ol>
    <li>
        Instal Composer, manajer dependensi PHP. Composer digunakan untuk mengelola dependensi aplikasi Laravel. Anda dapat mengunduh dan menginstal Composer dari situs resmi Composer (https://getcomposer.org/download/). Pastikan Anda mengatur PATH agar dapat menjalankan perintah Composer dari mana saja di terminal.
    </li>
    <li>
        Buka terminal atau command prompt dan pergi ke direktori tempat Anda ingin menyimpan proyek Laravel Anda.
    </li>
    <li>
        <p>
            Jalankan perintah berikut untuk membuat proyek Laravel baru:
        </p>
        <p>
            Copy code
        </p>
        <p>
            composer create-project --prefer-dist laravel/laravel nama-proyek
        </p>
        <p>
            Gantilah "nama-proyek" dengan nama yang ingin Anda berikan pada proyek Laravel Anda.
        </p>
        <p>
            Setelah selesai, pergi ke direktori proyek Laravel dengan menjalankan perintah:
        </p>
    </li>
    <li>
        <p>
            bash - Copy code
        </p>
        <p>
            cd nama-proyek
        </p>
        <p>
            Salin file .env.example menjadi .env dengan menjalankan perintah
        </p>
    </li>
        <p>
    <li>
            bash - Copy code
        </p>
        <p>
            cp .env.example .env
        </p>
        <p>
            Generate kunci aplikasi dengan menjalankan perintah
        </p>
    </li>
    <li>
        <p>
            Buat database kosong di server database Anda, misalnya MySQL
        </p>
        <p>
            Buka file .env dan atur pengaturan database Anda, termasuk nama database, username, dan password
        </p>
        <p>
            Jalankan migrasi untuk membuat tabel-tabel dasar dengan menjalankan perintah
        </p>
        <p>
            Copy code - php artisan migrate
        </p>
    </li>
        <p>
            Setelah migrasi selesai, Anda dapat menjalankan server pengembangan Laravel dengan perintah
        </p>
    </li>
    <li>
        <p>
            Copy code - php artisan serve
        </p>
        <p>
            Ini akan menjalankan server lokal yang dapat Anda akses melalui browser dengan alamat http://localhost:8000
        </p>
    </li>
    <li>
        <p>
            Halaman Login
        </p>
        <img src="screenshots/Login.png" alt="Login" width="100%">
        <p>
            Username: john@example.com
            Password: password
            Sebagai portal/Auth untuk masuk aplikasi Contact
        </p>
    </li>
    <li>
        <p>
            Halaman Dashboard 
        </p>
        <p>
            <img src="screenshots/Dashboard.png" alt="Dashboard" width="100%">
        </p>
    </li>
    <li>
        <p>
            Halaman index
        </p>
        <p>
            <img src="screenshots/Index.png" alt="index" width="100%">
        </p>
        <p>
            Berisi Nama,Email, dan telepon serta action Edit Dan Delete
        </p>
    </li>
    <li>
        <p>
            Halaman Create
        </p>
        <p>
            <img src="screenshots/Create.png" alt="Create" width="100%">
        </p>
        <p>
            Untuk menambah data Nama,Email dan Telepon
        </p>
    </li>
    <li>
        <p>
            Menu Edit
        </p>
        <p>
            <img src="screenshots/Edit.png" alt="edit" width="100%">
        </p>
        <p>
            Untuk Mengubah data sesuai kebutuhan
        </p>
    </li>
    <li>
        <p>
            Menu Delete
        </p>
        <p>
            <img src="screenshots/Delete.png" alt="Delete" width="100%">
        </p>
        <p>
            Untuk menghapus Data yang dibutuhkan
        </p>
    </li>
</ol>
