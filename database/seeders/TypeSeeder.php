<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $liquid = new Type;
        // $liquid->type = "Liquid";
        // $liquid->save();

        // $fruit = new Type;
        // $fruit->type = "Fruit";
        // $fruit->save();

        // $vegetable = new Type;
        // $vegetable->type = "Vegetable";
        // $vegetable->save();

        $types = [
            ['type' => 'Liquid'],
            ['type' => 'Baked Goods'],
            ['type' => 'Vegetable'],
            ['type' => 'Fruit'],
            ['type' => 'Meat'],
            ['type' => 'Sauce'],
        ];

        foreach($types as $type) {
            Type::create($type);
        }
    }
}
