<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class FilmSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        // function imageUrl(
        //     int $width = 640,
        //     int $height = 480,
        //     ?string $category = null, /* used as text on the image */
        //     bool $randomize = true,
        //     ?string $word = null,
        //     bool $gray = false,
        //     string $format = 'png'
        // ): string;

        for ($i = 0; $i < 100; $i++) {
            $data = [
                'judul' => $faker->word,
                'rating' => $faker->randomDigitNotNull,
                'sinopsis' => $faker->paragraph,
                'deskripsi' => $faker->text,
                'image' => $faker->imageUrl(640, 480, 'films', true),
                'negara' => $faker->countryCode,
            ];

            $this->db->table('film')->insert($data);
        }
    }
}
