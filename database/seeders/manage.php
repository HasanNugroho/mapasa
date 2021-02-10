<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class manage extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $store = collect([
            [
                'judul' => 'MAPASA',
                'author' => 'superadmin',
                'deskripsi' => 'Manunggaling Pemuda Mapasa',
                'keterangan' => 'jumbotron',
                'gambar' => 'public/manage/jumbotron.svg'
            ],
            [
                'author' => 'superadmin',
                'deskripsi' => 'Sejarah dari mapasa',
                'keterangan' => 'sejarah',
            ]
        ]);
        $store->each(function ($store) {
            DB::table('manages')->insert($store);
        });
        Storage::deleteDirectory('public/manage');

        Storage::copy('public/asset/hero-m.svg', 'public/manage/jumbotron.svg');
    }
}
