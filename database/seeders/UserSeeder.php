<?php



namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;




class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'nishu',
            'email'=>'nishu@gmail.com',
            'faculty_id'=>'1',
            'semester_id'=>'7',
            'password'=>bcrypt('nishu123'), 
            'role'=>'student',
        ]);
        User::create([
            'name'=>'lanisha',
            'email'=>'lanisha@gmail.com',
            'faculty_id'=>'1',
            'semester_id'=>'7',
            'password'=>bcrypt('lanisha123'), 
            'role'=>'student',
        ]);
        User::create([
            'name'=>'rachana',
            'email'=>'rachana@gmail.com',
            'faculty_id'=>'1',
            'semester_id'=>'7',
            'password'=>bcrypt('rachana123'), 
            'role'=>'student',
        ]);
        User::create([
            'name'=>'thani',
            'email'=>'thani@gmail.com',
            'faculty_id'=>'2',
            'semester_id'=>'7',
            'password'=>bcrypt('thani123'), 
            'role'=>'student',
        ]);
        User::create([
            'name'=>'roshan',
            'email'=>'roshan@gmail.com',
            'faculty_id'=>'3',
            'semester_id'=>'7',
            'password'=>bcrypt('roshan123'), 
            'role'=>'student',
        ]);
        User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('admin123'),
            'role'=>'admin',
        ]);

        User::create([
            'name'=>'teacher',
            'email'=>'teacher@gmail.com',
            'password'=>bcrypt('teacher123'),
            'role'=>'teacher',
        ]);
        User::create([
            'name'=>'prakash sharma',
            'email'=>'psharma@gmail.com',
            'password'=>bcrypt('psharma123'),
            'role'=>'teacher',
        ]);
        User::create([
            'name'=>'modnath acharya',
            'email'=>'macharya@gmail.com',
            'password'=>bcrypt('macharya123'),
            'role'=>'teacher',
        ]);
        User::create([
            'name'=>'Nabin Thapa',
            'email'=>'nthyapa@gmail.com',
            'password'=>bcrypt('nabin123'),
            'role'=>'teacher',
        ]);
        User::create([
            'name'=>'Nischal Khatiwada',
            'email'=>'nischal@gmail.com',
            'password'=>bcrypt('nischal123'),
            'role'=>'teacher',
        ]);
        User::create([
            'name'=>'Arjun Saud',
            'email'=>'arjun@gmail.com',
            'password'=>bcrypt('arjun123'),
            'role'=>'teacher',
        ]);
        User::create([
            'name'=>'Neetu',
            'email'=>'neetuspkt@gmail.com',
            'faculty_id'=>'1',
            'semester_id'=>'7',
            'password'=>bcrypt('neetu123'), 
            'role'=>'student',
        ]);
    }
}
