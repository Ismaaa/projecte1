 <?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->firstName($gender = null|'male'|'female'),
        'surnames' => $faker->lastName,
        'dni' => $faker->numberBetween($min = 10000000, $max = 99999999).$faker->randomLetter,
        'email' => $faker->freeEmail,
        //'city' => $faker->optional($weight = 0.4, $default = 'Alcanar')->city,
        'city' => $faker->optional($weight = 0.4, $default = 'Barcelona')->city,
        'address' => $faker->streetName. ', '. $faker->numberBetween($min = 1, $max = 150),
        'phone' => $faker->phoneNumber,
        'admin' => $faker->boolean($chanceOfGettingTrue = 10),
        'bio' => $faker->text($maxNbChars = 25),
        'avatar' => 'default.png',
        'password' => $password ?: $password = bcrypt($faker->password),
    ];
});

/*
 * https://github.com/fzaninotto/Faker
 *
 * php artisan tinker
 * factory(App\User::class, 50)->create()
*/