<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);

        /* Start RolUser */
        DB::table('roluser')->insert([
            'name' => 'administrador',
        ]);

        DB::table('roluser')->insert([
            'name' => 'encuestado',
        ]);

        /* End RolUser */

        /* Start Relacion Evaluado */

        DB::table('relacion_evaluado')->insert([
            'name' => 'Auto-Evaluacion',
        ]);

        DB::table('relacion_evaluado')->insert([
            'name' => 'Par',
        ]);

        DB::table('relacion_evaluado')->insert([
            'name' => 'Jefe',
        ]);

        DB::table('relacion_evaluado')->insert([
            'name' => 'Supervisado',
        ]);

        /* End Relacion Evaluado*/


        /* Star User */
        DB::table('users')->insert([
            'firstname'          => 'Jhon',
            'lastname'           => 'Doe Doe',
            'idrol'              => 1,
            'email'              => 'admin@gmail.com',
            'password'           => Hash::make('admin'),
            'repassword'         => 'admin',
            'dni'                => '16877353',
            'position'           => 'Administrador',
            'is_active'          => true,
        ]);

        DB::table('users')->insert([
            'firstname'          => 'Jhon',
            'lastname'           => 'Doe Doe',
            'idrol'              => 2,
            'email'              => 'admin1@gmail.com',
            'password'           => Hash::make('admin'),
            'repassword'         => 'admin',
            'dni'                => '16817353',
            'position'           => 'Vendedor',
            'is_active'          => true,
        ]);

        DB::table('users')->insert([
            'firstname'           => 'Jhon',
            'lastname'            => 'Doe1',
            'idrol'               => 2,
            'email'               => 'admin2@gmail.com',
            'password'            => Hash::make('admin'),
            'repassword'         => 'admin',
            'dni'                 => '16877350',
            'position'            => 'Vendedor',
            'is_active'           => true,
        ]);

        DB::table('users')->insert([
            'firstname'          => 'Jhon',
            'lastname'           => 'Prueba',
            'idrol'              => 2,
            'email'              => 'admin3@gmail.com',
            'password'           => Hash::make('admin'),
            'repassword'         => 'admin',
            'dni'                => '16877354',
            'position'           => 'Vendedor',
            'is_active'          => true,
        ]);

        /* End User */

        /* Start Personas */
        /*
        DB::table('personas')->insert([
            'firstname' => 'Jhon',
            'lastname' => 'Prueba',
            'dni' => '16877354',
            'deparment' => 'Ventas',
            'position' => 'Supervisor',
            'email' => str_random(10).'@gmail.com',
        ]);

        DB::table('personas')->insert([
            'firstname' => 'Jhon',
            'lastname' => 'Doe',
            'dni' => '16877350',
            'deparment' => 'Ventas',
            'position' => 'Vendedor',
            'email' => str_random(10).'@gmail.com',
        ]);

        DB::table('personas')->insert([
            'firstname' => 'Jhon',
            'lastname' => 'Doe Doe',
            'dni' => '16877353',
            'deparment' => 'Ventas',
            'position' => 'Supervisor',
            'email' => str_random(10).'@gmail.com',
        ]);

        DB::table('personas')->insert([
            'firstname' => 'Jhon',
            'lastname' => 'Doe 1',
            'dni' => '16877352',
            'deparment' => 'Ventas',
            'position' => 'Supervisor',
            'email' => str_random(10).'@gmail.com',
        ]);

        DB::table('personas')->insert([
            'firstname' => 'Jhon',
            'lastname' => 'Doe 2',
            'dni' => '16877351',
            'deparment' => 'Ventas',
            'position' => 'Vendedor',
            'email' => str_random(10).'@gmail.com',
        ]); */
        /* End Insert Personas */

        /* Start Encuestas db seed */
        DB::table('encuestas')->insert([
            'date' => '0000-00-00 00:00:00',
            'is_active' => false,
            'user_id' => 3,
        ]);

        DB::table('encuestas')->insert([
            'date' => '0000-00-00 00:00:00',
            'is_active' => false,
            'user_id' => 2,
        ]);

        DB::table('encuestas')->insert([
            'date' => '0000-00-00 00:00:00',
            'is_active' => false,
            'user_id' => 2,
        ]);

        DB::table('encuestas')->insert([
            'date' => '0000-00-00 00:00:00',
            'is_active' => false,
            'user_id' => 2,
        ]);

        DB::table('encuestas')->insert([
            'date' => '0000-00-00 00:00:00',
            'is_active' => false,
            'user_id' => 2,
        ]);

        DB::table('encuestas')->insert([
            'date' => '0000-00-00 00:00:00',
            'is_active' => false,
            'user_id' => 2,
        ]);

        DB::table('encuestas')->insert([
            'date' => '0000-00-00 00:00:00',
            'is_active' => false,
            'user_id' => 3,
        ]);

        DB::table('encuestas')->insert([
            'date' => '0000-00-00 00:00:00',
            'is_active' => true,
            'user_id' => 3,
        ]);

        DB::table('encuestas')->insert([
            'date' => '0000-00-00 00:00:00',
            'is_active' => false,
            'user_id' => 3,
        ]);


        /* end encuestas seed */

        /* Start items db seed */

        DB::table('items')->insert([
            'items' => 8,
            'encuesta_id' => 1,
        ]);

        DB::table('items')->insert([
            'items' => 8,
            'encuesta_id' => 1,
        ]);

        DB::table('items')->insert([
            'items' => 8,
            'encuesta_id' => 1,
        ]);

        DB::table('items')->insert([
            'items' => 8,
            'encuesta_id' => 2,
        ]);

        DB::table('items')->insert([
            'items' => 8,
            'encuesta_id' => 2,
        ]);

        DB::table('items')->insert([
            'items' => 9,
            'encuesta_id' => 3,
        ]);

        DB::table('items')->insert([
            'items' => 9,
            'encuesta_id' => 3,
        ]);

        DB::table('items')->insert([
            'items' => 7,
            'encuesta_id' => 4,
        ]);

        DB::table('items')->insert([
            'items' => 7,
            'encuesta_id' => 4,
        ]);

        DB::table('items')->insert([
            'items' => 10,
            'encuesta_id' => 5,
        ]);

        DB::table('items')->insert([
            'items' => 10,
            'encuesta_id' => 5,
        ]);

        DB::table('items')->insert([
            'items' => 8,
            'encuesta_id' => 6,
        ]);

        DB::table('items')->insert([
            'items' => 8,
            'encuesta_id' => 6,
        ]);

        DB::table('items')->insert([
            'items' => 8,
            'encuesta_id' => 7,
        ]);

        DB::table('items')->insert([
            'items' => 8,
            'encuesta_id' => 7,
        ]);

        DB::table('items')->insert([
            'items' => 8,
            'encuesta_id' => 8,
        ]);

        DB::table('items')->insert([
            'items' => 8,
            'encuesta_id' => 8,
        ]);

        DB::table('items')->insert([
            'items' => 8,
            'encuesta_id' => 9,
        ]);

//         DB::table('items')->insert([
//             'items' => 8,
//             'encuesta_id' => 1,
//         ]);

        DB::table('items')->insert([
            'items' => 8,
            'encuesta_id' => 2,
        ]);

        DB::table('items')->insert([
            'items' => 8,
            'encuesta_id' => 3,
        ]);

        DB::table('items')->insert([
            'items' => 8,
            'encuesta_id' => 4,
        ]);

        DB::table('items')->insert([
            'items' => 8,
            'encuesta_id' => 5,
        ]);

        DB::table('items')->insert([
            'items' => 8,
            'encuesta_id' => 6,
        ]);

        DB::table('items')->insert([
            'items' => 8,
            'encuesta_id' => 7,
        ]);

        DB::table('items')->insert([
            'items' => 8,
            'encuesta_id' => 8,
        ]);

        DB::table('items')->insert([
            'items' => 8,
            'encuesta_id' => 9,
        ]);

//         DB::table('items')->insert([
//             'items' => 8,
//             'encuesta_id' => 1,
//         ]);

        DB::table('items')->insert([
            'items' => 8,
            'encuesta_id' => 2,
        ]);

        DB::table('items')->insert([
            'items' => 8,
            'encuesta_id' => 3,
        ]);

        DB::table('items')->insert([
            'items' => 8,
            'encuesta_id' => 4,
        ]);

        /* End items db seed */


        /* Start evaluacion */

        DB::table('evaluaciones')->insert([
            'name' => str_random(10),
            'value' => 1,
        ]);

        DB::table('evaluaciones')->insert([
            'name' => str_random(10),
            'value' => 2,
        ]);

        DB::table('evaluaciones')->insert([
            'name' => str_random(10),
            'value' => 3,
        ]);

        DB::table('evaluaciones')->insert([
            'name' => str_random(10),
            'value' => 4,
        ]);

        DB::table('evaluaciones')->insert([
            'name' => str_random(10),
            'value' => 5,
        ]);

        /* End evaluacion */


        /* Start  Frases */

        DB::table('frases')->insert([
            'name' => str_random(100),
            'item_id' => 1,
            'evaluacion_id' => 1,
        ]);

        DB::table('frases')->insert([
            'name' => str_random(100),
            'item_id' => 1,
            'evaluacion_id' => 2,
        ]);

        DB::table('frases')->insert([
            'name' => str_random(100),
            'item_id' => 1,
            'evaluacion_id' => 3,
        ]);

        DB::table('frases')->insert([
            'name' => str_random(100),
            'item_id' => 1,
            'evaluacion_id' => 4,
        ]);

        DB::table('frases')->insert([
            'name' => str_random(100),
            'item_id' => 1,
            'evaluacion_id' => 5,
        ]);

        DB::table('frases')->insert([
            'name' => str_random(100),
            'item_id' => 2,
            'evaluacion_id' => 5,
        ]);

        DB::table('frases')->insert([
            'name' => str_random(100),
            'item_id' => 2,
            'evaluacion_id' => 5,
        ]);

        DB::table('frases')->insert([
            'name' => str_random(100),
            'item_id' => 2,
            'evaluacion_id' => 5,
        ]);

        DB::table('frases')->insert([
            'name' => str_random(100),
            'item_id' => 2,
            'evaluacion_id' => 5,
        ]);

        DB::table('frases')->insert([
            'name' => str_random(100),
            'item_id' => 2,
            'evaluacion_id' => 5,
        ]);

        DB::table('frases')->insert([
            'name' => str_random(100),
            'item_id' => 3,
            'evaluacion_id' => 5,
        ]);

        DB::table('frases')->insert([
            'name' => str_random(100),
            'item_id' => 3,
            'evaluacion_id' => 5,
        ]);

        DB::table('frases')->insert([
            'name' => str_random(100),
            'item_id' => 3,
            'evaluacion_id' => 5,
        ]);

        DB::table('frases')->insert([
            'name' => str_random(100),
            'item_id' => 3,
            'evaluacion_id' => 5,
        ]);

        DB::table('frases')->insert([
            'name' => str_random(100),
            'item_id' => 3,
            'evaluacion_id' => 5,
        ]);

        DB::table('frases')->insert([
            'name' => str_random(100),
            'item_id' => 4,
            'evaluacion_id' => 5,
        ]);

        DB::table('frases')->insert([
            'name' => str_random(100),
            'item_id' => 4,
            'evaluacion_id' => 5,
        ]);

        DB::table('frases')->insert([
            'name' => str_random(100),
            'item_id' => 4,
            'evaluacion_id' => 5,
        ]);

        DB::table('frases')->insert([
            'name' => str_random(100),
            'item_id' => 4,
            'evaluacion_id' => 5,
        ]);

        DB::table('frases')->insert([
            'name' => str_random(100),
            'item_id' => 4,
            'evaluacion_id' => 5,
        ]);

        DB::table('frases')->insert([
            'name' => str_random(100),
            'item_id' => 5,
            'evaluacion_id' => 5,
        ]);

        DB::table('frases')->insert([
            'name' => str_random(100),
            'item_id' => 5,
            'evaluacion_id' => 5,
        ]);

        DB::table('frases')->insert([
            'name' => str_random(100),
            'item_id' => 5,
            'evaluacion_id' => 5,
        ]);

        DB::table('frases')->insert([
            'name' => str_random(100),
            'item_id' => 5,
            'evaluacion_id' => 5,
        ]);

        DB::table('frases')->insert([
            'name' => str_random(100),
            'item_id' => 5,
            'evaluacion_id' => 5,
        ]);

        /* End Frases */

        /* Start Evaluadores */

        DB::table('encuestados')->insert([
            'user_id' => 4,
            'is_active' => true,
            'encuesta_id' => 1,
        ]);

        DB::table('encuestados')->insert([
            'user_id' => 3,
            'is_active' => true,
            'encuesta_id' => 1,
        ]);

        DB::table('encuestados')->insert([
            'user_id' => 3,
            'is_active' => true,
            'encuesta_id' => 1,
        ]);

        DB::table('encuestados')->insert([
            'user_id' => 2,
            'is_active' => true,
            'encuesta_id' => 2,
        ]);

        DB::table('encuestados')->insert([
            'user_id' => 2,
            'is_active' => true,
            'encuesta_id' => 1,
        ]);

        /* End Evaluadores */

        Model::reguard();
    }
}
