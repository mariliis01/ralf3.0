<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            ['name' => 'Huulepulk', 
            'description' => 'Punane huulepulk', 
            'price' => 9.99, 
            'image' => 'path/to/image1.jpg'],
            ['name' => 'Lauvärv',
            'description' => 'Beež lauvärv',
            'price' => 9.99,
            'image' => 'path/to/image2.jpg'
            ],
            ['name' => 'Põsepuna',
            'description' => 'Punane põsepuna',
            'price' => 9.99,
            'image' => 'path/to/image3.jpg'
            ],
            ['name' => 'Jumestuskreem',
            'description' => 'Beež 001',
            'price' => 9.99,
            'image' => 'path/to/image4.jpg'
            ],
            ['name' => 'BB kreem',
            'description' => 'Beež 001',
            'price' => 9.99,
            'image' => 'path/to/image5.jpg'
            ],
            ['name' => 'Highlighter',
            'description' => 'Snow White',
            'price' => 9.99,
            'image' => 'path/to/image6.jpg'
            ],
            ['name' => 'Kontuurpuuder',
            'description' => 'Dark',
            'price' => 9.99,
            'image' => 'path/to/image7.jpg'
            ],
            ['name' => 'Huulepliiats',
            'description' => 'Punane',
            'price' => 9.99,
            'image' => 'path/to/image8.jpg'
            ],
            ['name' => 'Huuleläige',
            'description' => 'Läbipaistev',
            'price' => 9.99,
            'image' => 'path/to/image9.jpg'
            ],  
        ]);
    }
}
