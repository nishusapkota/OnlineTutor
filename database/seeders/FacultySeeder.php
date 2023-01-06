<?php

namespace Database\Seeders;

use App\Models\Faculty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Faculty::create([
            'name'=>"BscCsit",
        ]);
        Faculty::create([
            'name'=>"BCA",
        ]);
        Faculty::create([
            'name'=>"BIM",
        ]);

    }
}
