<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(100)->create();
        $this->createMe();
    }

    public function createMe()
    {
        $user = User::make([
            'mood' => 'На связи!',
            'username' => 'khamsolt',
            'firstname' => 'Magomed',
            'lastname' => 'Khamidov',
            'patronymic' => 'Naib',
            'birthday_at' => Carbon::createFromDate(1994, 9, 1)->format('Y-m-d'),
            'gender' => 'male'
        ]);
        $user->email = 'khamidov.che@gmail.com';
        $user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        $user->email_verified_at = now();
        $user->save();
    }
}
