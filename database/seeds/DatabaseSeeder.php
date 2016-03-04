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

        DB::table('roluser')->insert([
            'name' => 'encuestador',
        ]);

        /* End RolUser */


        /* Star User */
        DB::table('users')->insert([
            'name'     => 'admin',
            'idrol'    => 1,
            'email'    => 'admin@gmail.com',
            'password' => Hash::make('admin'),
        ]);

        DB::table('users')->insert([
            'name'     => 'admin',
            'idrol'    => 2,
            'email'    => 'admin1@gmail.com',
            'password' => Hash::make('admin'),
        ]);

        DB::table('users')->insert([
            'name'     => 'admin',
            'idrol'    => 3,
            'email'    => 'admin3@gmail.com',
            'password' => Hash::make('admin'),
        ]);

        /* End User */

        /* Start Personas */
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
        ]);
        /* End Insert Personas */

        /* Start Encuestas db seed */
        DB::table('encuestas')->insert([
            'date' => '0000-00-00 00:00:00',
            'persona_id' => 1,
        ]);

        DB::table('encuestas')->insert([
            'date' => '0000-00-00 00:00:00',
            'persona_id' => 1,
        ]);

        DB::table('encuestas')->insert([
            'date' => '0000-00-00 00:00:00',
            'persona_id' => 1,
        ]);

        DB::table('encuestas')->insert([
            'date' => '0000-00-00 00:00:00',
            'persona_id' => 2,
        ]);

        DB::table('encuestas')->insert([
            'date' => '0000-00-00 00:00:00',
            'persona_id' => 2,
        ]);

        DB::table('encuestas')->insert([
            'date' => '0000-00-00 00:00:00',
            'persona_id' => 2,
        ]);

        DB::table('encuestas')->insert([
            'date' => '0000-00-00 00:00:00',
            'persona_id' => 3,
        ]);

        DB::table('encuestas')->insert([
            'date' => '0000-00-00 00:00:00',
            'persona_id' => 3,
        ]);

        DB::table('encuestas')->insert([
            'date' => '0000-00-00 00:00:00',
            'persona_id' => 3,
        ]);

        DB::table('encuestas')->insert([
            'date' => '0000-00-00 00:00:00',
            'persona_id' => 4,
        ]);

        DB::table('encuestas')->insert([
            'date' => '0000-00-00 00:00:00',
            'persona_id' => 4,
        ]);

        DB::table('encuestas')->insert([
            'date' => '0000-00-00 00:00:00',
            'persona_id' => 4,
        ]);

        DB::table('encuestas')->insert([
            'date' => '0000-00-00 00:00:00',
            'persona_id' => 5,
        ]);

        DB::table('encuestas')->insert([
            'date' => '0000-00-00 00:00:00',
            'persona_id' => 5,
        ]);

        DB::table('encuestas')->insert([
            'date' => '0000-00-00 00:00:00',
            'persona_id' => 5,
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

        DB::table('items')->insert([
            'items' => 8,
            'encuesta_id' => 9,
        ]);

        DB::table('items')->insert([
            'items' => 8,
            'encuesta_id' => 10,
        ]);

        DB::table('items')->insert([
            'items' => 8,
            'encuesta_id' => 10,
        ]);

        DB::table('items')->insert([
            'items' => 8,
            'encuesta_id' => 11,
        ]);

        DB::table('items')->insert([
            'items' => 8,
            'encuesta_id' => 11,
        ]);

        DB::table('items')->insert([
            'items' => 8,
            'encuesta_id' => 12,
        ]);

        DB::table('items')->insert([
            'items' => 8,
            'encuesta_id' => 12,
        ]);

        DB::table('items')->insert([
            'items' => 8,
            'encuesta_id' => 13,
        ]);

        DB::table('items')->insert([
            'items' => 8,
            'encuesta_id' => 13,
        ]);

        DB::table('items')->insert([
            'items' => 8,
            'encuesta_id' => 14,
        ]);

        DB::table('items')->insert([
            'items' => 8,
            'encuesta_id' => 14,
        ]);

        DB::table('items')->insert([
            'items' => 8,
            'encuesta_id' => 15,
        ]);

        DB::table('items')->insert([
            'items' => 8,
            'encuesta_id' => 15,
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
            'items_id' => 1,
            'evaluacion_id' => 1,
        ]);

        DB::table('frases')->insert([
            'name' => str_random(100),
            'items_id' => 1,
            'evaluacion_id' => 2,
        ]);

        DB::table('frases')->insert([
            'name' => str_random(100),
            'items_id' => 1,
            'evaluacion_id' => 3,
        ]);

        DB::table('frases')->insert([
            'name' => str_random(100),
            'items_id' => 1,
            'evaluacion_id' => 4,
        ]);

        DB::table('frases')->insert([
            'name' => str_random(100),
            'items_id' => 1,
            'evaluacion_id' => 5,
        ]);

        DB::table('frases')->insert([
            'name' => str_random(100),
            'items_id' => 2,
            'evaluacion_id' => 5,
        ]);

        DB::table('frases')->insert([
            'name' => str_random(100),
            'items_id' => 2,
            'evaluacion_id' => 5,
        ]);

        DB::table('frases')->insert([
            'name' => str_random(100),
            'items_id' => 2,
            'evaluacion_id' => 5,
        ]);

        DB::table('frases')->insert([
            'name' => str_random(100),
            'items_id' => 2,
            'evaluacion_id' => 5,
        ]);

        DB::table('frases')->insert([
            'name' => str_random(100),
            'items_id' => 2,
            'evaluacion_id' => 5,
        ]);

        DB::table('frases')->insert([
            'name' => str_random(100),
            'items_id' => 3,
            'evaluacion_id' => 5,
        ]);

        DB::table('frases')->insert([
            'name' => str_random(100),
            'items_id' => 3,
            'evaluacion_id' => 5,
        ]);

        DB::table('frases')->insert([
            'name' => str_random(100),
            'items_id' => 3,
            'evaluacion_id' => 5,
        ]);

        DB::table('frases')->insert([
            'name' => str_random(100),
            'items_id' => 3,
            'evaluacion_id' => 5,
        ]);

        DB::table('frases')->insert([
            'name' => str_random(100),
            'items_id' => 3,
            'evaluacion_id' => 5,
        ]);

        DB::table('frases')->insert([
            'name' => str_random(100),
            'items_id' => 4,
            'evaluacion_id' => 5,
        ]);

        DB::table('frases')->insert([
            'name' => str_random(100),
            'items_id' => 4,
            'evaluacion_id' => 5,
        ]);

        DB::table('frases')->insert([
            'name' => str_random(100),
            'items_id' => 4,
            'evaluacion_id' => 5,
        ]);

        DB::table('frases')->insert([
            'name' => str_random(100),
            'items_id' => 4,
            'evaluacion_id' => 5,
        ]);

        DB::table('frases')->insert([
            'name' => str_random(100),
            'items_id' => 4,
            'evaluacion_id' => 5,
        ]);

        DB::table('frases')->insert([
            'name' => str_random(100),
            'items_id' => 5,
            'evaluacion_id' => 5,
        ]);

        DB::table('frases')->insert([
            'name' => str_random(100),
            'items_id' => 5,
            'evaluacion_id' => 5,
        ]);

        DB::table('frases')->insert([
            'name' => str_random(100),
            'items_id' => 5,
            'evaluacion_id' => 5,
        ]);

        DB::table('frases')->insert([
            'name' => str_random(100),
            'items_id' => 5,
            'evaluacion_id' => 5,
        ]);

        DB::table('frases')->insert([
            'name' => str_random(100),
            'items_id' => 5,
            'evaluacion_id' => 5,
        ]);

        /* End Frases */

        /* Start Evaluadores */

        DB::table('evaluadores')->insert([
            'full_name' => str_random(100),
            'email' => str_random(10).'@gmail.com',
            'is_active' => true,
            'encuesta_id' => 1,
            'password' => Hash::make('admin'),
        ]);

        DB::table('evaluadores')->insert([
            'full_name' => str_random(100),
            'email' => str_random(10).'@gmail.com',
            'is_active' => true,
            'encuesta_id' => 1,
            'password' => Hash::make('admin'),
        ]);

        DB::table('evaluadores')->insert([
            'full_name' => str_random(100),
            'email' => str_random(10).'@gmail.com',
            'is_active' => true,
            'encuesta_id' => 1,
            'password' => Hash::make('admin'),
        ]);

        DB::table('evaluadores')->insert([
            'full_name' => str_random(100),
            'email' => str_random(10).'@gmail.com',
            'is_active' => true,
            'encuesta_id' => 1,
            'password' => Hash::make('admin'),
        ]);

        DB::table('evaluadores')->insert([
            'full_name' => str_random(100),
            'email' => str_random(10).'@gmail.com',
            'is_active' => true,
            'encuesta_id' => 1,
            'password' => Hash::make('admin'),
        ]);

        /* End Evaluadores */

        Model::reguard();
    }
}
