<?php

namespace Tests\Browser;

use App\Models\User;
use App\Models\Konselor;
use App\Models\SesiKonseling;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PendaftaranKonselingTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function test_mahasiswa_dapat_mendaftar_konseling()
    {
        $mahasiswa = User::factory()->create([
            'email' => 'putra@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        $konselorUser = User::factory()->create();
        $konselor = Konselor::factory()->create([
            'user_id' => $konselorUser->id,
            'gambar' => 'default.jpg',
        ]);

        $sesi = SesiKonseling::create([
            'konselor_id' => $konselor->id,
            'hari' => 'Senin',
            'sesi' => '08:00-09:00',
            'status' => 'Tersedia',
        ]);

        $this->browse(function (Browser $browser) use ($mahasiswa, $sesi) {
            $browser->visit('/login')
                ->type('email', 'mahasiswa@gmail.com')
                ->type('password', '123456')
                ->press('Login')
                ->assertPathIs('/')
                ->visit('/sesi_konseling/' . $sesi->id)
                ->type('nim', '12345678')
                ->type('jurusan', 'Sistem Informasi')
                ->type('fakulitas', 'FRI')
                ->type('phone', '08123456789')
                ->type('tempat_tanggal_lahir', '2001-01-01')
                ->type('keluhan', 'Saya merasa stres akademik')
                ->press('Submit')
                ->assertSee('Sesi Konseling');
        });
    }
}
