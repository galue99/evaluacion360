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

        DB::table('companys')->insert([
            'name' => 'Imagen Prueba',
            'url' => 'public/images/logo/ballon-410x230.jpg',
        ]);

        DB::table('companys')->insert([
            'name' => 'Imagen Prueba',
            'url' => 'public/images/logo/ballon-410x230.jpg',
        ]);


        /* Star User */
        DB::table('users')->insert([
            'firstname'          => 'Jhon',
            'lastname'           => 'Doe',
            'idrol'              => 1,
            'email'              => 'admin@gmail.com',
            'password'           => Hash::make('admin'),
            'repassword'         => 'admin',
            'dni'                => '16877353',
            'company_id'          => 1,
            'position'           => 'Administrador',
            'is_active'          => true,
        ]);

        DB::table('users')->insert([
            'firstname'          => 'Juan',
            'lastname'           => 'Doe',
            'idrol'              => 2,
            'email'              => 'admin1@gmail.com',
            'password'           => Hash::make('admin'),
            'repassword'         => 'admin',
            'dni'                => '16817353',
            'company_id'          => 1,
            'position'           => 'Vendedor',
            'is_active'          => true,
        ]);

        DB::table('users')->insert([
            'firstname'           => 'Pedro',
            'lastname'            => 'Doe',
            'idrol'               => 2,
            'email'               => 'admin2@gmail.com',
            'password'            => Hash::make('admin'),
            'repassword'          => 'admin',
            'dni'                 => '16877350',
            'company_id'          => 1,
            'position'            => 'Vendedor',
            'is_active'           => true,
        ]);

        DB::table('users')->insert([
            'firstname'          => 'Luis',
            'lastname'           => 'Perez',
            'idrol'              => 2,
            'email'              => 'admin3@gmail.com',
            'password'           => Hash::make('admin'),
            'repassword'         => 'admin',
            'company_id'         => 1,
            'dni'                => '16877354',
            'position'           => 'Vendedor',
            'is_active'          => true,
        ]);

        /* End User */


        /* Start Encuestas db seed */
        DB::table('encuestas')->insert([
            'name' => 'Encuesta 01',
            'date' => '0000-00-00 00:00:00',
            'is_active' => false,
        ]);

        /* end encuestas seed */

        /* Start items db seed */

        DB::table('items')->insert([
            'encuesta_id' => 1,
        ]);

        // DB::table('items')->insert([
        //     'encuesta_id' => 1,
        // ]);

        // DB::table('items')->insert([
        //     'encuesta_id' => 1,
        // ]);

        // DB::table('items')->insert([
        //     'encuesta_id' => 1,
        // ]);

        // DB::table('items')->insert([
        //     'encuesta_id' => 1,
        // ]);


        /* Start  Frases */

        DB::table('frases')->insert([
            'name' => 'Llega cinco (5) minutos antes de la hora de entrada',
            'item_id' => 1,
        ]);

        DB::table('frases')->insert([
            'name' => 'Cumple con sus responsabilidades sin afectar los resultados de sus compañeros o el equipo.',
            'item_id' => 1,
        ]);

        // DB::table('frases')->insert([
        //     'name' => 'Ayuda a sus compañeros, dando ideas para alcanzar la meta y mejorar el trabaj',
        //     'item_id' => 2,
        // ]);

        // DB::table('frases')->insert([
        //     'name' => 'Integra al empleado nuevo, mostrándole las instalaciones, 6 presentándolo a los demás, enseñándole cómo hacer el trabajo y haciéndolo sentir a gusto.',
        //     'item_id' => 2,
        // ]);

        // DB::table('frases')->insert([
        //     'name' => 'Sigue los lineamientos de la organización, de forma visible para los demás.',
        //     'item_id' => 3,
        // ]);

        // DB::table('frases')->insert([
        //     'name' => 'Es responsable y se comporta de acuerdo a los valores de la empresa.',
        //     'item_id' => 3,
        // ]);

        // DB::table('frases')->insert([
        //     'name' => 'Supera los obstáculos, de forma rápida y con entusiasmo.',
        //     'item_id' => 4,
        // ]);

        // DB::table('frases')->insert([
        //     'name' => 'Compara los resultados con las metas, y reporta los resultados semanalmente.',
        //     'item_id' => 4,
        // ]);

        // DB::table('frases')->insert([
        //     'name' => 'Presta atención a los detalles, tomando acción inmediata si se requiere.',
        //     'item_id' => 5,
        // ]);

        // DB::table('frases')->insert([
        //     'name' => 'Genera ideas de mejora y revisa si se pueden llevar a cabo.',
        //     'item_id' => 5,
        // ]);

        /* End Frases */

        /* Begind Answers */

            /*frase 1 del item 1*/

        DB::table('answers')->insert([
            'name' => 'Nunca',
            'frase_id' => 1,
        ]);

        DB::table('answers')->insert([
            'name' => 'Rara vez',
            'frase_id' => 1,
        ]);

        DB::table('answers')->insert([
            'name' => 'a veces',
            'frase_id' => 1,
        ]);

        DB::table('answers')->insert([
            'name' => 'Casi siempre',
            'frase_id' => 1,
        ]);

        DB::table('answers')->insert([
            'name' => 'siempre',
            'frase_id' => 1,
        ]);

        /*frase 2 del item 1*/

        DB::table('answers')->insert([
            'name' => 'Nunca',
            'frase_id' => 2,
        ]);

        DB::table('answers')->insert([
            'name' => 'Rara vez',
            'frase_id' => 2,
        ]);

        DB::table('answers')->insert([
            'name' => 'a veces',
            'frase_id' => 2,
        ]);

        DB::table('answers')->insert([
            'name' => 'Casi siempre',
            'frase_id' => 2,
        ]);

        DB::table('answers')->insert([
            'name' => 'siempre',
            'frase_id' => 2,
        ]);

        // /*frase 1 del item 2*/

        // DB::table('answers')->insert([
        //     'name' => 'Nunca',
        //     'frase_id' => 3,
        // ]);

        // DB::table('answers')->insert([
        //     'name' => 'Rara vez',
        //     'frase_id' => 3,
        // ]);

        // DB::table('answers')->insert([
        //     'name' => 'a veces',
        //     'frase_id' => 3,
        // ]);

        // DB::table('answers')->insert([
        //     'name' => 'Casi siempre',
        //     'frase_id' => 3,
        // ]);

        // DB::table('answers')->insert([
        //     'name' => 'siempre',
        //     'frase_id' => 3,
        // ]);


        // /*frase 2 del item 2*/

        // DB::table('answers')->insert([
        //     'name' => 'Nunca',
        //     'frase_id' => 4,
        // ]);

        // DB::table('answers')->insert([
        //     'name' => 'Rara vez',
        //     'frase_id' => 4,
        // ]);

        // DB::table('answers')->insert([
        //     'name' => 'a veces',
        //     'frase_id' => 4,
        // ]);

        // DB::table('answers')->insert([
        //     'name' => 'Casi siempre',
        //     'frase_id' => 4,
        // ]);

        // DB::table('answers')->insert([
        //     'name' => 'siempre',
        //     'frase_id' => 4,
        // ]);

        // /*frase 1 del item 3*/

        // DB::table('answers')->insert([
        //     'name' => 'Nunca',
        //     'frase_id' => 5,
        // ]);

        // DB::table('answers')->insert([
        //     'name' => 'Rara vez',
        //     'frase_id' => 5,
        // ]);

        // DB::table('answers')->insert([
        //     'name' => 'a veces',
        //     'frase_id' => 5,
        // ]);

        // DB::table('answers')->insert([
        //     'name' => 'Casi siempre',
        //     'frase_id' => 5,
        // ]);

        // DB::table('answers')->insert([
        //     'name' => 'siempre',
        //     'frase_id' => 5,
        // ]);


        // /*frase 2 del item 3*/

        // DB::table('answers')->insert([
        //     'name' => 'Nunca',
        //     'frase_id' => 6,
        // ]);

        // DB::table('answers')->insert([
        //     'name' => 'Rara vez',
        //     'frase_id' => 6,
        // ]);

        // DB::table('answers')->insert([
        //     'name' => 'a veces',
        //     'frase_id' => 6,
        // ]);

        // DB::table('answers')->insert([
        //     'name' => 'Casi siempre',
        //     'frase_id' => 6,
        // ]);

        // DB::table('answers')->insert([
        //     'name' => 'siempre',
        //     'frase_id' => 6,
        // ]);

        // /**/
        //  DB::table('answers')->insert([
        //     'name' => 'Nunca',
        //     'frase_id' => 7,
        // ]);

        // DB::table('answers')->insert([
        //     'name' => 'Rara vez',
        //     'frase_id' => 7,
        // ]);

        // DB::table('answers')->insert([
        //     'name' => 'a veces',
        //     'frase_id' => 7,
        // ]);

        // DB::table('answers')->insert([
        //     'name' => 'Casi siempre',
        //     'frase_id' => 7,
        // ]);

        // DB::table('answers')->insert([
        //     'name' => 'siempre',
        //     'frase_id' => 7,
        // ]);

        //  /**/
        //  DB::table('answers')->insert([
        //     'name' => 'Nunca',
        //     'frase_id' => 8,
        // ]);

        // DB::table('answers')->insert([
        //     'name' => 'Rara vez',
        //     'frase_id' => 8,
        // ]);

        // DB::table('answers')->insert([
        //     'name' => 'a veces',
        //     'frase_id' => 8,
        // ]);

        // DB::table('answers')->insert([
        //     'name' => 'Casi siempre',
        //     'frase_id' => 8,
        // ]);

        // DB::table('answers')->insert([
        //     'name' => 'siempre',
        //     'frase_id' => 8,
        // ]);

        // /**/
        //  DB::table('answers')->insert([
        //     'name' => 'Nunca',
        //     'frase_id' => 9,
        // ]);

        // DB::table('answers')->insert([
        //     'name' => 'Rara vez',
        //     'frase_id' => 9,
        // ]);

        // DB::table('answers')->insert([
        //     'name' => 'a veces',
        //     'frase_id' => 9,
        // ]);

        // DB::table('answers')->insert([
        //     'name' => 'Casi siempre',
        //     'frase_id' => 9,
        // ]);

        // DB::table('answers')->insert([
        //     'name' => 'siempre',
        //     'frase_id' => 9,
        // ]);

        // /**/
        //  DB::table('answers')->insert([
        //     'name' => 'Nunca',
        //     'frase_id' => 10,
        // ]);

        // DB::table('answers')->insert([
        //     'name' => 'Rara vez',
        //     'frase_id' => 10,
        // ]);

        // DB::table('answers')->insert([
        //     'name' => 'a veces',
        //     'frase_id' => 10,
        // ]);

        // DB::table('answers')->insert([
        //     'name' => 'Casi siempre',
        //     'frase_id' => 10,
        // ]);

        // DB::table('answers')->insert([
        //     'name' => 'siempre',
        //     'frase_id' => 10,
        // ]);

         DB::table('niveles')->insert([
            'name' => 'Jefe',
        ]);

        DB::table('niveles')->insert([
            'name' => 'Par',
        ]);

        DB::table('niveles')->insert([
            'name' => 'Subordinado',
        ]);

        DB::table('niveles')->insert([
            'name' => 'Cliente',
        ]);
        
        DB::table('niveles')->insert([
            'name' => 'Auto-Evaluación',
        ]);


        //OtherQuestions

        DB::table('others_questions')->insert([
            'question' => 'Menciona una (01) fortaleza, o cosa que haga muy bien esta persona',
            'encuestas_id' => 1,
        ]);
        DB::table('others_questions')->insert([
            'question' => 'Menciona una (01) debilidad, o cosa que deba aprender esta persona:',
            'encuestas_id' => 1,
        ]);
        DB::table('others_questions')->insert([
            'question' => '¿Por qué  felicitarías a esta persona?',
            'encuestas_id' => 1,
        ]);
        DB::table('others_questions')->insert([
            'question' => '¿Por qué agradecerías a esta persona?',
            'encuestas_id' => 1,
        ]);

        // users_encuestas

         DB::table('users_encuestas')->insert([
            'user_id' => 2,
            'evaluador_id' => null,
            'encuesta_id' => 1,
            'niveles_id' => 0,
            'status' => 0
        ]);

        DB::table('users_encuestas')->insert([
            'user_id' => 2,
            'evaluador_id' => 3,
            'encuesta_id' => 1,
            'niveles_id' => 1,
            'status' => 0
        ]);

        DB::table('users_encuestas')->insert([
            'user_id' => 2,
            'evaluador_id' => 4,
            'encuesta_id' => 1,
            'niveles_id' => 2,
            'status' => 0
        ]);


       


        Model::reguard();
    }
}
