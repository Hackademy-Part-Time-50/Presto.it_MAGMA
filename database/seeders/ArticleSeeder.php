<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        $images = Storage::disk('public')->files('image');

        if (empty($images)) {
            $this->command->warn('⚠️ Nessuna immagine trovata in storage/app/public/image');
            return;
        }

        foreach (range(1, 20) as $i) {
            $image = $images[array_rand($images)];

            Article::create([
                'title' => "Articolo $i",
                'description' => "Descrizione dell'articolo numero $i. Testo di esempio generato.",
                'price' => rand(10, 999),
                'category_id' => rand(1, 10),
                'is_accepted' => rand(0, 1),
                'image' => $image, // Salva il path relativo
            ]);
        }
    }
}

