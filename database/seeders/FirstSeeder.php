<?php

namespace Database\Seeders;

use App\Models\buku;
use App\Models\identitas;
use App\Models\Kategori;
use App\Models\pemberitahuan;
use App\Models\peminjaman;
use App\Models\penerbit;
use App\Models\pesan;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class FirstSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //User
        User::create([
            'kode' => 'A20',
            // 'nis' => '1234567',
            'fullname' => 'Iqbal muflihsin',
            'username' => 'iqbal',
            'password' => Hash::make('password'),
            // 'kelas' => 'Xll OTKP1',
            // 'alamat' => 'jalan budhi asi',
            // 'verif' => '',
            'role' => 'admin',
            'join_date' => '2023-01-21',
            // 'terakhir_login' => '',
            'foto' => '',
        ]);

        User::create([
            'kode' => 'A30',
            // 'nis' => '1234567',
            'fullname' => 'milla suanti',
            'username' => 'susanti',
            'password' => Hash::make('password'),
            // 'kelas' => 'Xll OTKP1',
            // 'alamat' => 'jalan budhi asi',
            // 'verif' => '',
            'role' => 'user',
            'join_date' => '2023-01-23',
            // 'terakhir_login' => '',
            'foto' => '',
        ]);

        // kategori
        Kategori::create([
            'kode' => 'Umum',
            'nama' => 'Umum',
        ]);

        Kategori::create([
            'kode' => 'Sains',
            'nama' => 'Sains',
        ]);

        Kategori::create([
            'kode' => 'Sejarah',
            'nama' => 'Sejarah',
        ]);

        // penerbit
        penerbit::create([
            'kode' => 'erlangga',
            'nama' => 'Erlangga',
            // 'verif' => '',
        ]);

        penerbit::create([
            'kode' => 'mobil terbang',
            'nama' => 'Mobil terbang',
            // 'verif' => '',
        ]);

        penerbit::create([
            'kode' => 'indonesia merdeka',
            'nama' => 'Indonesia merdeka',
            // 'verif' => '',
        ]);

        // BUKU
        buku::create([
            'judul' => 'Laskar Pelangi',
            'kategori_id' => '1',
            'penerbit_id'=> '2',
            'pengarang' => 'Thomas Muller',
            'tahun_terbit' => '2023-01-23',
            // 'isbn' => '',
            'j_buku_baik' => '12',
            'j_buku_rusak' => '5',
            'foto' => '',
        ]);

        buku::create([
            'judul' => 'Mobil terbang',
            'kategori_id' => '1',
            'penerbit_id'=> '2',
            'pengarang' => 'susanti',
            'tahun_terbit' => '2023-01-23',
            // 'isbn' => '',
            'j_buku_baik' => '12',
            'j_buku_rusak' => '5',
            'foto' => '',
        ]);

        // Peminjaman
        peminjaman::create([
            'user_id' => '1',
            'buku_id' => '1',
            'tanggal_peminjaman' => '2023-01-23',
            // 'tanggal_pengembalian' => '',
            'kondisi_buku_saat_dipinjam' => 'baik',
            // 'kondisi_buku_saat_dikembalikan' => '',
            // 'denda' => '',
        ]);

        peminjaman::create([
            'user_id' => '2',
            'buku_id' => '2',
            'tanggal_peminjaman' => '2023-01-23',
            // 'tanggal_pengembalian' => '',
            'kondisi_buku_saat_dipinjam' => 'rusak',
            // 'kondisi_buku_saat_dikembalikan' => '',
            'denda' => '20000',
        ]);

        // PESAN
        pesan::create([
            'penerima_id' => '1',
            'pengirim_id' => '2',
            'judul' => 'Buku Dipinjam',
            'isi' => 'Buku sedang dipinjam, harap dikembalikan tanggal 30',
            'status' => 'terkirim',
            'tgl_kirim' => '2023-01-21',
        ]);

        pesan::create([
            'penerima_id' => '1',
            'pengirim_id' => '2',
            'judul' => 'merusakan Buku',
            'isi' => 'Anda Sudah Merusakan Buku',
            'status' => 'terkirim',
            'tgl_kirim' => '2023-01-21',
        ]);

        // PEMBERITAHUAN

        pemberitahuan::create([
            'isi' => 'Maaf Server Sedang Maintance',
            // 'level_user' => '',
            'status' => 'Aktif',
        ]);

        pemberitahuan::create([
            'isi' => 'Maaf Server Tutup Sampai Tanggal 20',
            // 'level_user' => '',
            'status' => 'NonAktif',
        ]);

        // IDENTITAS

        identitas::create([
            'nama_app' => 'PERPUS SMKN 10 JAKARTA TIMUR',
            'alamat_app' => 'JL. SMEAN 6, CAWANG, jakarta timur',
            'email_app' => 'Diana12@gmail.com',
            'nomor_hp' => '82918298493d',
            'foto' => '',
        ]);
    }
}
