<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $sex = $this->faker->randomElement(['male', 'female']);

        return [
            'mood' => $this->faker->words(5, true),
            'thumbnail' => $this->faker->imageUrl(),
            'username' => $this->faker->unique()->userName,
            'firstname' => $this->faker->firstName($sex),
            'lastname' => $this->faker->lastName,
            'gender' => $sex,
            'about' => $this->faker->text(1000),
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => $this->faker->dateTimeBetween('-10 years')->format('Y-m-d H:i:s'),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'birthday_at' => $this->faker->date('Y-m-d', '- 18 years'),
            'remember_token' => Str::random(10),
        ];
    }
}
