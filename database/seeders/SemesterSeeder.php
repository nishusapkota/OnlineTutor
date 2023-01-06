<?php

namespace Database\Seeders;

use App\Models\Semester;
use Illuminate\Database\Seeder;
use App\Models\Semester as ModelsSemester;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Semester::create([
            'sem'=>'first',
        ]);
        Semester::create([
            'sem'=>'second',
        ]);
        Semester::create([
            'sem'=>'third',
        ]);
        Semester::create([
            'sem'=>'fourth',
        ]);
        Semester::create([
            'sem'=>'fifth',
        ]);
        Semester::create([
            'sem'=>'sixth',
        ]);
        Semester::create([
            'sem'=>'seventh',
        ]);
        Semester::create([
            'sem'=>'eight',
        ]);
    }
}
