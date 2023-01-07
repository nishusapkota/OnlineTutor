<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create([
            'course'=>'Java Programming',
            'user_id'=>'5',
            'faculty_id'=>'1',
            'semester_id'=>'7',  
        ]);
        Course::create([
            'course'=>'Advance Java',
            'user_id'=>'5',
            'faculty_id'=>'2',
            'semester_id'=>'5',  
        ]);
        Course::create([
            'course'=>'Software Engineering',
            'user_id'=>'5',
            'faculty_id'=>'3',
            'semester_id'=>'4',  
        ]);
        Course::create([
            'course'=>'Operating System',
            'user_id'=>'6',
            'faculty_id'=>'1',
            'semester_id'=>'5',  
        ]);
        Course::create([
            'course'=>'Compiler Design',
            'user_id'=>'6',
            'faculty_id'=>'2',
            'semester_id'=>'5',  
        ]);
        Course::create([
            'course'=>'C Programming',
            'user_id'=>'7',
            'faculty_id'=>'1',
            'semester_id'=>'1',  
        ]);
    }
}
