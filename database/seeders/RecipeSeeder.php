<?php

namespace Database\Seeders;

use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\Instruction;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    public function run(): void
    {
        $recipes = [
            [
                'title' => 'Nasi Goreng Ayam',
                'description' => 'Nasi goreng cepat dan mudah menggunakan sisa ayam matang dan nasi semalam',
                'prep_time' => 5,
                'cook_time' => 10,
                'servings' => 4,
                'difficulty' => 'mudah',
                'category' => 'hidangan utama',
                'image' => 'https://via.placeholder.com/300x200?text=Nasi+Goreng+Ayam',
                'rating' => 4.5,
                'reviews' => 128,
                'ingredients' => [
                    ['name' => 'ayam matang', 'amount' => 400, 'unit' => 'gram', 'leftover' => true],
                    ['name' => 'nasi matang', 'amount' => 600, 'unit' => 'gram', 'leftover' => true],
                    ['name' => 'telur', 'amount' => 2, 'unit' => 'butir', 'leftover' => false],
                    ['name' => 'kecap manis', 'amount' => 45, 'unit' => 'gram', 'leftover' => false],
                    ['name' => 'kacang polong dan wortel', 'amount' => 200, 'unit' => 'gram', 'leftover' => false],
                    ['name' => 'bawang hijau', 'amount' => 30, 'unit' => 'gram', 'leftover' => false],
                ],
                'instructions' => [
                    'Panaskan minyak dalam wajan atau kuali besar dengan api tinggi',
                    'Kocok telur dan sisihkan',
                    'Masukkan nasi matang, pecahkan gumpalan-gumpalannya',
                    'Aduk ayam, kacang polong, wortel, dan kecap manis',
                    'Masukkan telur kembali dan aduk rata',
                    'Hiasi dengan bawang hijau dan sajikan'
                ]
            ],
            [
                'title' => 'Pasta Gratinasi Krimi',
                'description' => 'Ubah pasta sisa menjadi hidangan gratinasi krimi yang nyaman',
                'prep_time' => 10,
                'cook_time' => 25,
                'servings' => 6,
                'difficulty' => 'sedang',
                'category' => 'hidangan utama',
                'image' => 'https://via.placeholder.com/300x200?text=Pasta+Bake',
                'rating' => 4.3,
                'reviews' => 95,
                'ingredients' => [
                    ['name' => 'pasta matang', 'amount' => 800, 'unit' => 'gram', 'leftover' => true],
                    ['name' => 'sayuran sisa', 'amount' => 400, 'unit' => 'gram', 'leftover' => true],
                    ['name' => 'krim berat', 'amount' => 360, 'unit' => 'gram', 'leftover' => false],
                    ['name' => 'keju cheddar', 'amount' => 300, 'unit' => 'gram', 'leftover' => false],
                    ['name' => 'mentega', 'amount' => 30, 'unit' => 'gram', 'leftover' => false],
                    ['name' => 'garam dan merica', 'amount' => 0, 'unit' => 'sesuai selera', 'leftover' => false],
                ],
                'instructions' => [
                    'Panaskan oven hingga 190°C',
                    'Campur pasta matang dengan sayuran',
                    'Di panci, panaskan krim dan lelehkan mentega',
                    'Aduk keju hingga meleleh dengan sempurna',
                    'Gabungkan saus krimi dengan pasta dan sayuran',
                    'Tuang ke dalam loyang yang telah diolesi mentega',
                    'Taburi dengan keju yang tersisa',
                    'Panggang selama 25 menit hingga emas dan berbusa'
                ]
            ],
            [
                'title' => 'Taco Daging Sisa',
                'description' => 'Taco lezat menggunakan daging matang apapun yang tersisa',
                'prep_time' => 5,
                'cook_time' => 5,
                'servings' => 4,
                'difficulty' => 'mudah',
                'category' => 'hidangan utama',
                'image' => 'https://via.placeholder.com/300x200?text=Taco+Daging',
                'rating' => 4.7,
                'reviews' => 203,
                'ingredients' => [
                    ['name' => 'daging matang sisa', 'amount' => 400, 'unit' => 'gram', 'leftover' => true],
                    ['name' => 'kulit taco', 'amount' => 8, 'unit' => 'buah', 'leftover' => false],
                    ['name' => 'selada cincang', 'amount' => 400, 'unit' => 'gram', 'leftover' => false],
                    ['name' => 'tomat potong dadu', 'amount' => 200, 'unit' => 'gram', 'leftover' => false],
                    ['name' => 'keju parut', 'amount' => 200, 'unit' => 'gram', 'leftover' => false],
                    ['name' => 'krim asam', 'amount' => 120, 'unit' => 'gram', 'leftover' => false],
                    ['name' => 'saus salsa', 'amount' => 120, 'unit' => 'gram', 'leftover' => false],
                ],
                'instructions' => [
                    'Panaskan daging sisa di wajan dengan api sedang',
                    'Panaskan kulit taco sesuai petunjuk kemasan',
                    'Susun taco dengan daging, selada, dan tomat',
                    'Taburi dengan keju, krim asam, dan saus salsa',
                    'Sajikan segera'
                ]
            ],
            [
                'title' => 'Lumpia Sayuran Sisa',
                'description' => 'Lumpia gurih dibuat dari sayuran sisa yang gurih dan renyah',
                'prep_time' => 15,
                'cook_time' => 20,
                'servings' => 4,
                'difficulty' => 'sedang',
                'category' => 'hidangan utama',
                'image' => 'https://via.placeholder.com/300x200?text=Lumpia+Sayuran',
                'rating' => 4.6,
                'reviews' => 142,
                'ingredients' => [
                    ['name' => 'sayuran sisa cincang', 'amount' => 500, 'unit' => 'gram', 'leftover' => true],
                    ['name' => 'daging sisa cincang', 'amount' => 200, 'unit' => 'gram', 'leftover' => true],
                    ['name' => 'kulit lumpia', 'amount' => 20, 'unit' => 'lembar', 'leftover' => false],
                    ['name' => 'telur', 'amount' => 1, 'unit' => 'butir', 'leftover' => false],
                    ['name' => 'bawang putih', 'amount' => 15, 'unit' => 'gram', 'leftover' => false],
                    ['name' => 'kecap manis', 'amount' => 30, 'unit' => 'gram', 'leftover' => false],
                ],
                'instructions' => [
                    'Tumis bawang putih hingga wangi',
                    'Masukkan daging sisa dan sayuran, masak 5 menit',
                    'Tambahkan kecap manis dan aduk rata, dinginkan',
                    'Isi kulit lumpia dengan adonan sayuran-daging',
                    'Gulungkan dan rekatkan dengan telur yang sudah dikocok',
                    'Goreng dalam minyak panas hingga emas kecokelatan',
                    'Tiriskan di atas tisu dan sajikan'
                ]
            ],
            [
                'title' => 'Sup Sayuran',
                'description' => 'Sup sayuran gurih dibuat dari sayuran sisa yang tercampur',
                'prep_time' => 10,
                'cook_time' => 20,
                'servings' => 5,
                'difficulty' => 'mudah',
                'category' => 'camilan',
                'image' => 'https://via.placeholder.com/300x200?text=Sup+Sayuran',
                'rating' => 4.6,
                'reviews' => 156,
                'ingredients' => [
                    ['name' => 'sayuran sisa tercampur', 'amount' => 600, 'unit' => 'gram', 'leftover' => true],
                    ['name' => 'kaldu sayuran', 'amount' => 960, 'unit' => 'gram', 'leftover' => false],
                    ['name' => 'kacang kalengan', 'amount' => 425, 'unit' => 'gram', 'leftover' => false],
                    ['name' => 'tomat potong dadu', 'amount' => 400, 'unit' => 'gram', 'leftover' => false],
                    ['name' => 'bawang bombay', 'amount' => 100, 'unit' => 'gram', 'leftover' => false],
                    ['name' => 'siung bawang putih', 'amount' => 10, 'unit' => 'gram', 'leftover' => false],
                ],
                'instructions' => [
                    'Potong dadu bawang bombay dan cincang bawang putih',
                    'Di panci, tumis bawang bombay dan bawang putih dengan minyak',
                    'Masukkan sayuran sisa dan masak 5 menit',
                    'Tuang kaldu sayuran dan tomat potong dadu',
                    'Masukkan kacang dan didihkan',
                    'Masak perlahan selama 15 menit hingga sayuran empuk',
                    'Bumbui dengan garam dan merica sesuai selera'
                ]
            ],
            [
                'title' => 'Puding Roti',
                'description' => 'Puding roti manis dan gurih menggunakan roti basi',
                'prep_time' => 15,
                'cook_time' => 40,
                'servings' => 8,
                'difficulty' => 'sedang',
                'category' => 'camilan',
                'image' => 'https://via.placeholder.com/300x200?text=Puding+Roti',
                'rating' => 4.4,
                'reviews' => 87,
                'ingredients' => [
                    ['name' => 'roti basi', 'amount' => 400, 'unit' => 'gram', 'leftover' => true],
                    ['name' => 'telur', 'amount' => 4, 'unit' => 'butir', 'leftover' => false],
                    ['name' => 'susu', 'amount' => 480, 'unit' => 'gram', 'leftover' => false],
                    ['name' => 'gula pasir', 'amount' => 150, 'unit' => 'gram', 'leftover' => false],
                    ['name' => 'ekstrak vanili', 'amount' => 10, 'unit' => 'gram', 'leftover' => false],
                    ['name' => 'kayu manis', 'amount' => 5, 'unit' => 'gram', 'leftover' => false],
                    ['name' => 'kismis', 'amount' => 100, 'unit' => 'gram', 'leftover' => false],
                ],
                'instructions' => [
                    'Panaskan oven hingga 175°C',
                    'Potong roti basi menjadi kubus dan letakkan di loyang',
                    'Kocok telur, susu, gula, vanili, dan kayu manis',
                    'Tuang campuran di atas kubus roti',
                    'Taburi kismis di atasnya',
                    'Biarkan selama 15 menit untuk menyerap',
                    'Panggang selama 40 menit hingga matang dan emas'
                ]
            ],
            [
                'title' => 'Perkedel Kentang Sisa',
                'description' => 'Perkedel gurih dan renyah dibuat dari kentang sisa rebus',
                'prep_time' => 10,
                'cook_time' => 15,
                'servings' => 4,
                'difficulty' => 'mudah',
                'category' => 'camilan',
                'image' => 'https://via.placeholder.com/300x200?text=Perkedel+Kentang',
                'rating' => 4.5,
                'reviews' => 118,
                'ingredients' => [
                    ['name' => 'kentang sisa rebus', 'amount' => 600, 'unit' => 'gram', 'leftover' => true],
                    ['name' => 'telur', 'amount' => 2, 'unit' => 'butir', 'leftover' => false],
                    ['name' => 'bawang putih', 'amount' => 20, 'unit' => 'gram', 'leftover' => false],
                    ['name' => 'bawang merah', 'amount' => 30, 'unit' => 'gram', 'leftover' => false],
                    ['name' => 'tepung terigu', 'amount' => 50, 'unit' => 'gram', 'leftover' => false],
                    ['name' => 'garam dan merica', 'amount' => 0, 'unit' => 'sesuai selera', 'leftover' => false],
                ],
                'instructions' => [
                    'Lumatkan kentang sisa hingga halus',
                    'Cincang halus bawang putih dan bawang merah, tumis sebentar',
                    'Campur kentang yang telah dilumat dengan bawang yang sudah ditumis',
                    'Masukkan 1 telur dan tepung terigu, aduk rata',
                    'Bentuk menjadi bulatan lonjong sesuai selera',
                    'Siapkan telur yang tersisa di piring, baluri perkedel dengan telur',
                    'Goreng dalam minyak panas hingga emas',
                    'Tiriskan dan sajikan dengan sambal'
                ]
            ],
            [
                'title' => 'Cireng Ubi Sisa',
                'description' => 'Cireng gurih yang dibuat dari ubi sisa dengan renyahan yang lezat',
                'prep_time' => 10,
                'cook_time' => 15,
                'servings' => 4,
                'difficulty' => 'mudah',
                'category' => 'camilan',
                'image' => 'https://via.placeholder.com/300x200?text=Cireng+Ubi',
                'rating' => 4.7,
                'reviews' => 165,
                'ingredients' => [
                    ['name' => 'ubi sisa rebus', 'amount' => 500, 'unit' => 'gram', 'leftover' => true],
                    ['name' => 'tepung kanji', 'amount' => 150, 'unit' => 'gram', 'leftover' => false],
                    ['name' => 'bawang putih', 'amount' => 15, 'unit' => 'gram', 'leftover' => false],
                    ['name' => 'telur', 'amount' => 1, 'unit' => 'butir', 'leftover' => false],
                    ['name' => 'garam', 'amount' => 5, 'unit' => 'gram', 'leftover' => false],
                    ['name' => 'merica', 'amount' => 2, 'unit' => 'gram', 'leftover' => false],
                ],
                'instructions' => [
                    'Lumatkan ubi sisa hingga halus',
                    'Cincang bawang putih sangat halus',
                    'Campur ubi dengan tepung kanji, telur, bawang putih, garam, dan merica',
                    'Aduk hingga merata dan tercampur sempurna',
                    'Bentuk memanjang seperti siruban menggunakan dua sendok',
                    'Goreng dalam minyak panas hingga matang dan emas',
                    'Tiriskan dan sajikan dengan kuah kacang atau sambal'
                ]
            ]
        ];

        foreach ($recipes as $recipeData) {
            $ingredients = $recipeData['ingredients'];
            $instructions = $recipeData['instructions'];
            unset($recipeData['ingredients'], $recipeData['instructions']);

            $recipe = Recipe::create([
                ...$recipeData,
                'total_time' => $recipeData['prep_time'] + $recipeData['cook_time']
            ]);

            foreach ($ingredients as $ingredient) {
                Ingredient::create([
                    'recipe_id' => $recipe->id,
                    ...$ingredient
                ]);
            }

            foreach ($instructions as $index => $instruction) {
                Instruction::create([
                    'recipe_id' => $recipe->id,
                    'step' => $instruction,
                    'order' => $index + 1
                ]);
            }
        }
    }
}