<?php

namespace Database\Seeders;

use App\Models\DataPac;
use App\Models\DataPr;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::factory()->create([
            'name' => 'Admin banget',
            'username' => 'adminbanget',
            'email' => 'pacgpansorbrondong19@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        DataPac::factory()->create([
            'nama_pac' => 'PAC GP Ansor Brondong',
            'ketua' => 'Ahmad Fathur Roziq, S.Pd',
            'ket_mds' => 'Mahmudi, S.Pd',
            'satkoryon' => 'Mifkol Huda',
            'sk_upload' => null,
            'ms_khidmad' => '2025-2028',
            'sk_berakhir' => null,
            'fb' => 'https://www.facebook.com/pacgpansorbrondong.pacgpansorbrondong',
            'ig' => 'https://www.instagram.com/pacgpansorbrondong',
        ]);

        $dataPrs = [
            'PR GP Ansor Brondong',
            'PR GP Ansor Betiring',
            'PR GP Ansor Sendangharjo',
            'PR GP Ansor Lembor',
            'PR GP Ansor Tlogoretno',
            'PR GP Ansor Labuhan',
            'PR GP Ansor Moyoruti',
            'PR GP Ansor Ganting',
        ];

        foreach ($dataPrs as $nama) {
            DataPr::factory()->create([
                'nama_pr' => $nama,
                'pac_id' => 1,
            ]);
        }
    }
}
