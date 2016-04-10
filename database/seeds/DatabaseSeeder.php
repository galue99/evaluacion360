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

        /* Start Relacion Evaluado */

        /*
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
        ]);*/

        /* End Relacion Evaluado*/


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

        DB::table('encuestas')->insert([
            'name' => 'Encuesta 02',
            'date' => '0000-00-00 00:00:00',
            'is_active' => false,
        ]);

        DB::table('encuestas')->insert([
            'name' => 'Encuesta 03',
            'date' => '0000-00-00 00:00:00',
            'is_active' => false,
        ]);

        DB::table('encuestas')->insert([
            'name' => 'Encuesta 04',
            'date' => '0000-00-00 00:00:00',
            'is_active' => false,
        ]);

        DB::table('encuestas')->insert([
            'name' => 'Encuesta 05',
            'date' => '0000-00-00 00:00:00',
            'is_active' => false,
        ]);

        DB::table('encuestas')->insert([
            'name' => 'Encuesta 06',
            'date' => '0000-00-00 00:00:00',
            'is_active' => false,
        ]);

        DB::table('encuestas')->insert([
            'name' => 'Encuesta 07',
            'date' => '0000-00-00 00:00:00',
            'is_active' => false,
        ]);

        DB::table('encuestas')->insert([
            'name' => 'Encuesta 08',
            'date' => '0000-00-00 00:00:00',
            'is_active' => true,
        ]);

        DB::table('encuestas')->insert([
            'name' => 'Encuesta 09',
            'date' => '0000-00-00 00:00:00',
            'is_active' => false,
        ]);


        /* end encuestas seed */

        /* Start items db seed */
/*
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
            'encuesta_id' => 8,
        ]);
*/
        DB::table('items')->insert([
            'encuesta_id' => 2,
        ]);

        DB::table('items')->insert([
            'encuesta_id' => 2,
        ]);

        DB::table('items')->insert([
            'encuesta_id' => 3,
        ]);

        DB::table('items')->insert([
            'encuesta_id' => 3,
        ]);

        DB::table('items')->insert([
            'encuesta_id' => 4,
        ]);

        DB::table('items')->insert([
            'encuesta_id' => 4,
        ]);

        DB::table('items')->insert([
            'encuesta_id' => 5,
        ]);

        DB::table('items')->insert([
            'encuesta_id' => 5,
        ]);

        DB::table('items')->insert([
            'encuesta_id' => 6,
        ]);

        DB::table('items')->insert([
            'encuesta_id' => 6,
        ]);

        DB::table('items')->insert([
            'encuesta_id' => 7,
        ]);

        DB::table('items')->insert([
            'encuesta_id' => 7,
        ]);

        // DB::table('items')->insert([
        //     'encuesta_id' => 8,
        // ]);

        // DB::table('items')->insert([
        //     'encuesta_id' => 8,
        // ]);

        DB::table('items')->insert([
            'encuesta_id' => 9,
        ]);

//         DB::table('items')->insert([
//             'encuesta_id' => 1,
//         ]);

        DB::table('items')->insert([
            'encuesta_id' => 2,
        ]);

        DB::table('items')->insert([
            'encuesta_id' => 3,
        ]);

        DB::table('items')->insert([
            'encuesta_id' => 4,
        ]);

        DB::table('items')->insert([
            'encuesta_id' => 5,
        ]);

        DB::table('items')->insert([
            'encuesta_id' => 6,
        ]);

        DB::table('items')->insert([
            'encuesta_id' => 7,
        ]);

        // DB::table('items')->insert([
        //     'encuesta_id' => 8,
        // ]);

        DB::table('items')->insert([
            'encuesta_id' => 9,
        ]);

        DB::table('items')->insert([
             'encuesta_id' => 1,
        ]);

        DB::table('items')->insert([
             'encuesta_id' => 8,
        ]);

        // DB::table('items')->insert([
        //     'encuesta_id' => 8,
        // ]);

        // DB::table('items')->insert([
        //     'encuesta_id' => 8,
        // ]);

/*
        DB::table('items')->insert([
            'items' => 8,
            'encuesta_id' => 8,
        ]);

        DB::table('items')->insert([
            'items' => 8,
            'encuesta_id' => 8,
        ]);

        /* End items db seed */


        /* Start evaluacion */
/*
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
*/
        /* End evaluacion */


        /* Start  Frases */

        DB::table('frases')->insert([
            'name' => 'Llega cinco (5) minutos antes de la hora de entrada',
            'item_id' => 1,
        ]);

        DB::table('frases')->insert([
            'name' => 'Cumple con sus responsabilidades sin afectar los resultados de sus compañeros o el equipo.',
            'item_id' => 1,
        ]);

        DB::table('frases')->insert([
            'name' => 'Toma en cuenta las necesidades y sentimientos de las personas de manera respetuosa y con un buen trato.',
            'item_id' => 1,
        ]);

        DB::table('frases')->insert([
            'name' => 'Escucha las opiniones o sugerencias de los demás, mostrando respeto y agradecimiento.',
            'item_id' => 1,
        ]);

        DB::table('frases')->insert([
            'name' => 'Motiva a su equipo, manteniendo una actitud positiva ante los cambios y nuevos retos.',
            'item_id' => 1,
        ]);

        DB::table('frases')->insert([
            'name' => 'Ayuda a sus compañeros, dando ideas para alcanzar la meta y mejorar el trabaj',
            'item_id' => 2,
        ]);

        DB::table('frases')->insert([
            'name' => 'Integra al empleado nuevo, mostrándole las instalaciones, 6 presentándolo a los demás, enseñándole cómo hacer el trabajo y haciéndolo sentir a gusto.',
            'item_id' => 2,
        ]);

        DB::table('frases')->insert([
            'name' => 'Es sincero (no dice mentiras) aunque no le convenga.',
            'item_id' => 2,
        ]);

        DB::table('frases')->insert([
            'name' => 'Reconoce cuando comete errores, ofreciendo disculpas.',
            'item_id' => 2,
        ]);

        DB::table('frases')->insert([
            'name' => 'Mantiene la confidencialidad, validando qué debe transmitir y qué no, evitando los chismes.',
            'item_id' => 2,
        ]);

        DB::table('frases')->insert([
            'name' => 'Sigue los lineamientos de la organización, de forma visible para los demás.',
            'item_id' => 3,
        ]);

        DB::table('frases')->insert([
            'name' => 'Es responsable y se comporta de acuerdo a los valores de la empresa.',
            'item_id' => 3,
        ]);

        DB::table('frases')->insert([
            'name' => 'Es respetuoso y amable con todas las personas.',
            'item_id' => 3,
        ]);

        DB::table('frases')->insert([
            'name' => 'Establece objetivos alcanzables y fáciles de medir, obteniendo los resultados esperados.',
            'item_id' => 3,
        ]);

        DB::table('frases')->insert([
            'name' => 'Fija prioridades, de acuerdo a su importancia.',
            'item_id' => 3,
        ]);

        DB::table('frases')->insert([
            'name' => 'Supera los obstáculos, de forma rápida y con entusiasmo.',
            'item_id' => 4,
        ]);

        DB::table('frases')->insert([
            'name' => 'Compara los resultados con las metas, y reporta los resultados semanalmente.',
            'item_id' => 4,
        ]);

        DB::table('frases')->insert([
            'name' => 'Compara los resultados con las metas, y reporta los resultados semanalmente.',
            'item_id' => 4,
        ]);

        DB::table('frases')->insert([
            'name' => 'Recibe las sugerencias de mejora, de buena manera.',
            'item_id' => 4,
        ]);

        DB::table('frases')->insert([
            'name' => 'Motiva al equipo a lograr los objetivos, con entusiasmo.',
            'item_id' => 4,
        ]);

        DB::table('frases')->insert([
            'name' => 'Presta atención a los detalles, tomando acción inmediata si se requiere.',
            'item_id' => 5,
        ]);

        DB::table('frases')->insert([
            'name' => 'Genera ideas de mejora y revisa si se pueden llevar a cabo.',
            'item_id' => 5,
        ]);

        DB::table('frases')->insert([
            'name' => 'Controla los niveles de calidad asegurándose que todos entienden las características del producto y del proceso.',
            'item_id' => 5,
        ]);

        DB::table('frases')->insert([
            'name' => 'Identifica fallas y las corrige, analizando las causas.',
            'item_id' => 5,
        ]);

        DB::table('frases')->insert([
            'name' => 'Propone acciones para aprovechar los recursos, con la persona adecuada.',
            'item_id' => 5,
        ]);

        /* End Frases */

        /* Start Evaluadores */
/*
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

        /*frase 3 del item 1*/

        DB::table('answers')->insert([
            'name' => 'Nunca',
            'frase_id' => 3,
        ]);

        DB::table('answers')->insert([
            'name' => 'Rara vez',
            'frase_id' => 3,
        ]);

        DB::table('answers')->insert([
            'name' => 'a veces',
            'frase_id' => 3,
        ]);

        DB::table('answers')->insert([
            'name' => 'Casi siempre',
            'frase_id' => 3,
        ]);

        DB::table('answers')->insert([
            'name' => 'siempre',
            'frase_id' => 3,
        ]);

        /*frase 4 del item 1*/

        DB::table('answers')->insert([
            'name' => 'Nunca',
            'frase_id' => 4,
        ]);

        DB::table('answers')->insert([
            'name' => 'Rara vez',
            'frase_id' => 4,
        ]);

        DB::table('answers')->insert([
            'name' => 'a veces',
            'frase_id' => 4,
        ]);

        DB::table('answers')->insert([
            'name' => 'Casi siempre',
            'frase_id' => 4,
        ]);

        DB::table('answers')->insert([
            'name' => 'siempre',
            'frase_id' => 4,
        ]);

        /*frase 5 del item 1*/

        DB::table('answers')->insert([
            'name' => 'Nunca',
            'frase_id' => 5,
        ]);

        DB::table('answers')->insert([
            'name' => 'Rara vez',
            'frase_id' => 5,
        ]);

        DB::table('answers')->insert([
            'name' => 'a veces',
            'frase_id' => 5,
        ]);

        DB::table('answers')->insert([
            'name' => 'Casi siempre',
            'frase_id' => 5,
        ]);

        DB::table('answers')->insert([
            'name' => 'siempre',
            'frase_id' => 5,
        ]);


        /*frase 1 del item 2*/

        DB::table('answers')->insert([
            'name' => 'Nunca',
            'frase_id' => 6,
        ]);

        DB::table('answers')->insert([
            'name' => 'Rara vez',
            'frase_id' => 6,
        ]);

        DB::table('answers')->insert([
            'name' => 'a veces',
            'frase_id' => 6,
        ]);

        DB::table('answers')->insert([
            'name' => 'Casi siempre',
            'frase_id' => 6,
        ]);

        DB::table('answers')->insert([
            'name' => 'siempre',
            'frase_id' => 6,
        ]);


        /*frase 2 del item 2*/

        DB::table('answers')->insert([
            'name' => 'Nunca',
            'frase_id' => 7,
        ]);

        DB::table('answers')->insert([
            'name' => 'Rara vez',
            'frase_id' => 7,
        ]);

        DB::table('answers')->insert([
            'name' => 'a veces',
            'frase_id' => 7,
        ]);

        DB::table('answers')->insert([
            'name' => 'Casi siempre',
            'frase_id' => 7,
        ]);

        DB::table('answers')->insert([
            'name' => 'siempre',
            'frase_id' => 7,
        ]);


        /*frase 3 del item 2*/

        DB::table('answers')->insert([
            'name' => 'Nunca',
            'frase_id' => 8,
        ]);

        DB::table('answers')->insert([
            'name' => 'Rara vez',
            'frase_id' => 8,
        ]);

        DB::table('answers')->insert([
            'name' => 'a veces',
            'frase_id' => 8,
        ]);

        DB::table('answers')->insert([
            'name' => 'Casi siempre',
            'frase_id' => 8,
        ]);

        DB::table('answers')->insert([
            'name' => 'siempre',
            'frase_id' => 8,
        ]);


        /*frase 4 del item 2*/

        DB::table('answers')->insert([
            'name' => 'Nunca',
            'frase_id' => 9,
        ]);

        DB::table('answers')->insert([
            'name' => 'Rara vez',
            'frase_id' => 9,
        ]);

        DB::table('answers')->insert([
            'name' => 'a veces',
            'frase_id' => 9,
        ]);

        DB::table('answers')->insert([
            'name' => 'Casi siempre',
            'frase_id' => 9,
        ]);

        DB::table('answers')->insert([
            'name' => 'siempre',
            'frase_id' => 9,
        ]);


        /*frase 5 del item 2*/

        DB::table('answers')->insert([
            'name' => 'Nunca',
            'frase_id' => 10,
        ]);

        DB::table('answers')->insert([
            'name' => 'Rara vez',
            'frase_id' => 10,
        ]);

        DB::table('answers')->insert([
            'name' => 'a veces',
            'frase_id' => 10,
        ]);

        DB::table('answers')->insert([
            'name' => 'Casi siempre',
            'frase_id' => 10,
        ]);

        DB::table('answers')->insert([
            'name' => 'siempre',
            'frase_id' => 10,
        ]);


        /*frase 1 del item 3*/

        DB::table('answers')->insert([
            'name' => 'Nunca',
            'frase_id' => 11,
        ]);

        DB::table('answers')->insert([
            'name' => 'Rara vez',
            'frase_id' => 11,
        ]);

        DB::table('answers')->insert([
            'name' => 'a veces',
            'frase_id' => 11,
        ]);

        DB::table('answers')->insert([
            'name' => 'Casi siempre',
            'frase_id' => 11,
        ]);

        DB::table('answers')->insert([
            'name' => 'siempre',
            'frase_id' => 11,
        ]);


        /*frase 2 del item 3*/

        DB::table('answers')->insert([
            'name' => 'Nunca',
            'frase_id' => 12,
        ]);

        DB::table('answers')->insert([
            'name' => 'Rara vez',
            'frase_id' => 12,
        ]);

        DB::table('answers')->insert([
            'name' => 'a veces',
            'frase_id' => 12,
        ]);

        DB::table('answers')->insert([
            'name' => 'Casi siempre',
            'frase_id' => 12,
        ]);

        DB::table('answers')->insert([
            'name' => 'siempre',
            'frase_id' => 12,
        ]);


        /*frase 3 del item 3*/

        DB::table('answers')->insert([
            'name' => 'Nunca',
            'frase_id' => 13,
        ]);

        DB::table('answers')->insert([
            'name' => 'Rara vez',
            'frase_id' => 13,
        ]);

        DB::table('answers')->insert([
            'name' => 'a veces',
            'frase_id' => 13,
        ]);

        DB::table('answers')->insert([
            'name' => 'Casi siempre',
            'frase_id' => 13,
        ]);

        DB::table('answers')->insert([
            'name' => 'siempre',
            'frase_id' => 13,
        ]);


        /*frase 4 del item 3*/

        DB::table('answers')->insert([
            'name' => 'Nunca',
            'frase_id' => 14,
        ]);

        DB::table('answers')->insert([
            'name' => 'Rara vez',
            'frase_id' => 14,
        ]);

        DB::table('answers')->insert([
            'name' => 'a veces',
            'frase_id' => 14,
        ]);

        DB::table('answers')->insert([
            'name' => 'Casi siempre',
            'frase_id' => 14,
        ]);

        DB::table('answers')->insert([
            'name' => 'siempre',
            'frase_id' => 14,
        ]);


        /*frase 5 del item 3*/

        DB::table('answers')->insert([
            'name' => 'Nunca',
            'frase_id' => 15,
        ]);

        DB::table('answers')->insert([
            'name' => 'Rara vez',
            'frase_id' => 15,
        ]);

        DB::table('answers')->insert([
            'name' => 'a veces',
            'frase_id' => 15,
        ]);

        DB::table('answers')->insert([
            'name' => 'Casi siempre',
            'frase_id' => 15,
        ]);

        DB::table('answers')->insert([
            'name' => 'siempre',
            'frase_id' => 15,
        ]);



        DB::table('users_encuestas')->insert([
            'user_id' => 3,
            'evaluado_id' => 4,
            'encuesta_id' => 2,
            'status' => 1

        ]);


        Model::reguard();
    }
}
