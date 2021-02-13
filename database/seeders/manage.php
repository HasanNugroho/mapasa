<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use File;

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
                'gambar' => 'jumbotron.svg'
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
        File::deleteDirectory(public_path('images/blog'));
        File::deleteDirectory(public_path('images/galeri'));
        File::deleteDirectory(public_path('images/kegiatan'));
    }
}
