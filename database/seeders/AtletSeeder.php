<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Atlet;
use DB;

class AtletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // insert data ke table pegawai
        DB::table('atlet')->insert([
            [
                'id' => '2',
                'nia' => random_int(100000, 999999),
                'image' => '1162aac3940f2cf.png',
                'name' => 'Vista Tenassa Afauradeta',
                'tgl_registrasi' => \Carbon\Carbon::now(),
                'alamat' => 'Jl. Raya Junggo No. 35 Tulungrejo',
                'tempat_lahir' => 'Malang',
                'tgl_lahir' => '2001-04-19',
                'jenis_kelamin' => 'Perempuan',
                'bb' => '52',
                'tb' => '155',
                'no_telepon' => '083835960444',
                'tingkat_sabuk' => 'Merah-Strip-1',
                'kelas' => 'Poomsae',
                'user_id' => '22',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'id' => '3',
                'nia' => random_int(100000, 999999),
                'image' => '1162aac3940f2cf.png',
                'name' => 'Adiba Salva Maulina Putri',
                'tgl_registrasi' => '2015-08-11',
                'alamat' => 'Jl. Martosujono No.25 Rt.5 Rw.2, Desa Punten',
                'tempat_lahir' => 'Malang',
                'tgl_lahir' => '2003-05-24',
                'jenis_kelamin' => 'Perempuan',
                'bb' => '49',
                'tb' => '155',
                'no_telepon' => '085755449950',
                'tingkat_sabuk' => 'Merah Strip 1',
                'kelas' => 'Kyorugi',
                'user_id' => '3',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'id' => '4',
                'nia' => random_int(100000, 999999),
                'image' => '1162aac3940f2cf.png',
                'name' => 'Angda Tenado Abrianzaveo',
                'tgl_registrasi' => '2015-08-11',
                'alamat' => 'Jl. Martosujono No.25 Rt.5 Rw.2, Desa Punten',
                'tempat_lahir' => 'Malang',
                'tgl_lahir' => '2005-10-22',
                'jenis_kelamin' => 'Laki-Laki',
                'bb' => '63',
                'tb' => '165',
                'no_telepon' => '085816177315',
                'tingkat_sabuk' => 'Merah Strip 1',
                'kelas' => 'Kyorugi',
                'user_id' => '4',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'id' => '5',
                'nia' => random_int(100000, 999999),
                'image' => '1162aac3940f2cf.png',
                'name' => 'Lintang Ayunda Kinaih Dewanti',
                'tgl_registrasi' => '2015-07-28',
                'alamat' => 'Jl. Budiono No.12 Rt.4 Rw.2, Desa Punten',
                'tempat_lahir' => 'Batu',
                'tgl_lahir' => '2003-08-07',
                'jenis_kelamin' => 'Perempuan',
                'bb' => '45',
                'tb' => '155',
                'no_telepon' => '081231589524',
                'tingkat_sabuk' => 'Merah Strip 1',
                'kelas' => 'Poomsae',
                'user_id' => '5',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'id' => '6',
                'nia' => random_int(100000, 999999),
                'image' => '1162aac3940f2cf.png',
                'name' => 'Cinta Mercyllia Wibisono',
                'tgl_registrasi' => '2015-09-02',
                'alamat' => 'Jl. Seman Rt.4 Rw.1, Desa Punten',
                'tempat_lahir' => 'Batu',
                'tgl_lahir' => '2005-12-27',
                'jenis_kelamin' => 'Perempuan',
                'bb' => '47',
                'tb' => '151',
                'no_telepon' => '081259492781',
                'tingkat_sabuk' => 'Merah Strip 1',
                'kelas' => 'Poomsae',
                'user_id' => '6',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
        ]);
    }
}