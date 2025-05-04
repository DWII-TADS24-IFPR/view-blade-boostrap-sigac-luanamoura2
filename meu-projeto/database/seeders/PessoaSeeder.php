<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pessoa;
use App\Models\Perfil;

class PessoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pessoa::create([
            'nome' => 'Carol Feltz',
            'idade' => 19,
            'cpf' => '12345678900',
        ]);

        Perfil::create([
            'bio' => 'elegante',
            'pessoa_id' => 1,
        ]);

        Pessoa::create([
            'nome' => '',
            'idade' => 40,
            'cpf' => '12345678900',
        ]);

        Perfil::create([
            'bio' => 'top',
            'pessoa_id' => 2,
        ]);
    }
}
