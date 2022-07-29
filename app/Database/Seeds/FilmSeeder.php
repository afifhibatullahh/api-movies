<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class FilmSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();
        // $faker->addProvider(new \Xylis\FakerCinema\Provider\Movie($faker));


        // function imageUrl(
        //     int $width = 640,
        //     int $height = 480,
        //     ?string $category = null, /* used as text on the image */
        //     bool $randomize = true,
        //     ?string $word = null,
        //     bool $gray = false,
        //     string $format = 'png'
        // ): string;

        // for ($i = 0; $i < 100; $i++) {
        //     $data = [
        //         'judul' => $faker->movie,
        //         'rating' => $faker->randomDigitNotNull,
        //         'deskripsi' => $faker->text(300),
        //         'sinopsis' => $faker->overview,
        //         'duration' => $faker->runtime,
        //         'studio' => $faker->studio,
        //         'image' => $faker->imageUrl(640, 480, 'films', true),
        //         'negara' => $faker->countryCode,
        //         'genre' => $faker->movieGenre
        //     ];

        //     $this->db->table('film')->insert($data);
        // }

        $faker->addProvider(new \Xylis\FakerCinema\Provider\Person($faker));
        for ($i = 156; $i < 257; $i++) {
            // $actor = $faker->actor;
            // $this->db->table('film')->where('id', $i)->update(['actors' => $actor]);
            $actor = $faker->actor;
            $director = $faker->director;
            $this->db->table('film')->where('id', $i)->update(['actors' => $actor, 'director' => $director]);
        }

        // for ($i = 107; $i < 157; $i++) {
        //     // $actor = $faker->actor;
        //     // $this->db->table('film')->where('id', $i)->update(['actors' => $actor]);
        //     $deskripsi = $faker->text(300);
        //     $sinopsis = $faker->overview;
        //     $this->db->table('film')->where('id', $i)->update(['deskripsi' => $deskripsi, 'sinopsis' => $sinopsis]);
        // }
    }
}
