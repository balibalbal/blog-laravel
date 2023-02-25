<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Category;
use \App\Models\Post;
use \App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create();

        Category::create([
            'name' => 'Avocado',
            'slug' => 'avocado'
        ]);

        Category::create([
            'name' => 'Miss Universe',
            'slug' => 'miss-universe'
        ]);

        Category::create([
            'name' => 'Orange',
            'slug' => 'orange'
        ]);

        Category::create([
            'name' => 'Miss Grand',
            'slug' => 'miss-grand'
        ]);

        Category::create([
            'name' => 'Teknologi',
            'slug' => 'teknologi'
        ]);

        Post::factory(1000)->create();

        // User::create([
        //     'name' => 'Kukuruyuk',
        //     'email' => 'kukuruyuk@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);

        // User::create([
        //     'name' => 'Pupuha',
        //     'email' => 'pupuha@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);

        // User::create([
        //     'name' => 'Cumantaka',
        //     'email' => 'cumantaka@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);

        // Post::create([
        //     'title' => 'Flutter Untuk Mobile Android',
        //     'category_id' =>2,
        //     'user_id' => 1,
        //     'slug' => 'flutter-untuk-mobile-android',
        //     'excerpt' => 'Flutter glancing at the example above, you may have noticed that we did not tell Eloquent which database table corresponds to our Flight model. By convention, the snake case, plural name of the class will be used as the table name unless another name is explicitly specified. So, in this case, Eloquent will assume the Flight model stores records in the flights table, while an AirTrafficController model would store records in an air_traffic_controllers table.',
        //     'body' => '<p>Flutter glancing at the example above, you may have noticed that we did not tell Eloquent which database table corresponds to our Flight model. By convention, the snake case, plural name of the class will be used as the table name unless another name is explicitly specified. So, in this case, Eloquent will assume the Flight model stores records in the flights table, while an AirTrafficController model would store records in an air_traffic_controllers table.</p><p>If Flutter your models corresponding database table does not fit this convention, you may manually specify the models table name by defining a table property on the model</p>'
        // ]);

        // Post::create([
        //     'title' => 'Jalan-Jalan ke Bangkok',
        //     'category_id' =>1,
        //     'user_id' => 2,
        //     'slug' => 'jalan-jalan-ke-bangkok',
        //     'excerpt' => 'Flutter glancing at the example above, you may have noticed that we did not tell Eloquent which database table corresponds to our Flight model. By convention, the snake case, plural name of the class will be used as the table name unless another name is explicitly specified. So, in this case, Eloquent will assume the Flight model stores records in the flights table, while an AirTrafficController model would store records in an air_traffic_controllers table.',
        //     'body' => '<p>Flutter glancing at the example above, you may have noticed that we did not tell Eloquent which database table corresponds to our Flight model. By convention, the snake case, plural name of the class will be used as the table name unless another name is explicitly specified. So, in this case, Eloquent will assume the Flight model stores records in the flights table, while an AirTrafficController model would store records in an air_traffic_controllers table.</p><p>If Flutter your models corresponding database table does not fit this convention, you may manually specify the models table name by defining a table property on the model</p>'
        // ]);

        // Post::create([
        //     'title' => 'Jalan-Jalan ke Turki',
        //     'category_id' =>1,
        //     'user_id' => 2,
        //     'slug' => 'jalan-jalan-ke-turki',
        //     'excerpt' => 'Flutter glancing at the example above, you may have noticed that we did not tell Eloquent which database table corresponds to our Flight model. By convention, the snake case, plural name of the class will be used as the table name unless another name is explicitly specified. So, in this case, Eloquent will assume the Flight model stores records in the flights table, while an AirTrafficController model would store records in an air_traffic_controllers table.',
        //     'body' => '<p>Flutter glancing at the example above, you may have noticed that we did not tell Eloquent which database table corresponds to our Flight model. By convention, the snake case, plural name of the class will be used as the table name unless another name is explicitly specified. So, in this case, Eloquent will assume the Flight model stores records in the flights table, while an AirTrafficController model would store records in an air_traffic_controllers table.</p><p>If Flutter your models corresponding database table does not fit this convention, you may manually specify the models table name by defining a table property on the model</p>'
        // ]);

        // Post::create([
        //     'title' => 'Jalan-Jalan ke Malaysia',
        //     'category_id' =>1,
        //     'user_id' => 3,
        //     'slug' => 'jalan-jalan-ke-malaysia',
        //     'excerpt' => 'Flutter glancing at the example above, you may have noticed that we did not tell Eloquent which database table corresponds to our Flight model. By convention, the snake case, plural name of the class will be used as the table name unless another name is explicitly specified. So, in this case, Eloquent will assume the Flight model stores records in the flights table, while an AirTrafficController model would store records in an air_traffic_controllers table.',
        //     'body' => '<p>Flutter glancing at the example above, you may have noticed that we did not tell Eloquent which database table corresponds to our Flight model. By convention, the snake case, plural name of the class will be used as the table name unless another name is explicitly specified. So, in this case, Eloquent will assume the Flight model stores records in the flights table, while an AirTrafficController model would store records in an air_traffic_controllers table.</p><p>If Flutter your models corresponding database table does not fit this convention, you may manually specify the models table name by defining a table property on the model</p>'
        // ]);

        // Post::create([
        //     'title' => 'Jalan-Jalan ke Singapura',
        //     'category_id' =>1,
        //     'user_id' => 1,
        //     'slug' => 'jalan-jalan-ke-singapura',
        //     'excerpt' => 'Flutter glancing at the example above, you may have noticed that we did not tell Eloquent which database table corresponds to our Flight model. By convention, the snake case, plural name of the class will be used as the table name unless another name is explicitly specified. So, in this case, Eloquent will assume the Flight model stores records in the flights table, while an AirTrafficController model would store records in an air_traffic_controllers table.',
        //     'body' => '<p>Flutter glancing at the example above, you may have noticed that we did not tell Eloquent which database table corresponds to our Flight model. By convention, the snake case, plural name of the class will be used as the table name unless another name is explicitly specified. So, in this case, Eloquent will assume the Flight model stores records in the flights table, while an AirTrafficController model would store records in an air_traffic_controllers table.</p><p>If Flutter your models corresponding database table does not fit this convention, you may manually specify the models table name by defining a table property on the model</p>'
        // ]);

    }
}
