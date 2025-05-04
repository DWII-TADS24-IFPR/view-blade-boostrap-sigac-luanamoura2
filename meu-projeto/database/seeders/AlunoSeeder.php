<?php

namespace Database\Seeders;

use App\Models\Aluno;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlunoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Aluno::create([
            'nome'=>'Carol',
            'cpf'=>'12345678900',
            'email'=>'carol@gmail.com',
            'telefone'=>'(41) 1234-5678',
        ]);

        Role::create([
            'titulo'=>'aluno',
        ]);
    }
}
