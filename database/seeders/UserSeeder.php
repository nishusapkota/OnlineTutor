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
            'name'=>'neetu',
            'email'=>'neetuspkt@gmail.com',
            'faculty'=>'BscCsit',
            'semester'=>'seventh',
            'password'=>bcrypt('neetu123'), 
            'role'=>'student',
        ]);
        User::create([
            'name'=>'thani',
            'email'=>'thani@gmail.com',
            'faculty'=>'BCA',
            'semester'=>'seventh',
            'password'=>bcrypt('thani123'), 
            'role'=>'student',
        ]);
        User::create([
            'name'=>'roshan',
            'email'=>'roshan@gmail.com',
            'faculty'=>'BIM',
            'semester'=>'seventh',
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
    }
}
