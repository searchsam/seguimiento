<?php

use Illuminate\Database\Seeder;

class TipoEventoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_evento')->insert([
            [//1
                'evento'         => 'Se registro en el Sistema de Seguimiento - PSG.',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [//2
                'evento'         => 'Comfirmo la cuenta de correo electrónico y activo su usuario.',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [//3
                'evento'         => 'Registro plan de estudios.',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [//4
                'evento'         => 'Subio curriculum completo en PDF.',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [//5
                'evento'         => 'Resgistro la entidad en la empresa.',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [//6
                'evento'         => 'Genero una oferta.',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [//7
                'evento'         => 'Actualizo curriculum en PDF.',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [//8
                'evento'         => 'Actualizo plan de estudios.',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [//9
                'evento'         => 'Actualizo la entidad en la empresa.',
                'created_at'     => now(),
                'updated_at'     => now(),
            ]
        ]);
    }
}
