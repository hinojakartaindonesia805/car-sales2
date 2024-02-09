<?php

namespace Database\Factories;

use App\Models\Suara;
use App\Models\User;
use App\Models\Kandidat;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class SuaraFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Suara::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Ambil semua user dengan role 'Santri'
        $santris = User::where('role', 'Santri')->pluck('id');

        // Ambil semua kandidat
        $kandidats = Kandidat::all()->pluck('id');

        // Ambil rentang tanggal dari kegiatan yang berelasi dengan suara
        $randomKandidatId = $this->faker->randomElement($kandidats);
        $kegiatan = Kandidat::find(1);

        $tanggal_dari = $kegiatan->tanggal_dari;
        $tanggal_sampai = $kegiatan->tanggal_sampai;

        // Random tanggal_waktu dalam rentang tanggal_dari dan tanggal_sampai
        $randomTanggalWaktu = $this->faker->dateTimeBetween($tanggal_dari, $tanggal_sampai);

        return [
            'id_user' => $this->faker->randomElement($santris),
            'id_kandidat' => $randomKandidatId,
            'id_kegiatan' => $kegiatan->id,
            'tanggal_waktu' => $this->faker->randomElement(['2024-02-05', '2024-02-06','2024-02-07','2024-02-08','2024-02-09','2024-02-10']). ' '.date('H:i:s'),
            'tanggal' => $this->faker->randomElement(['2024-02-05', '2024-02-06','2024-02-07','2024-02-08','2024-02-09','2024-02-10'])
        ];
    }
}
