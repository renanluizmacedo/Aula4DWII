<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return redirect('aluno');
});

Route::prefix('/aluno')->group(function () {



    Route::get('/', function () {
        $alunos =
            [
                ['matricula' => 1, 'nome' => 'Renan Luiz'],
                ['matricula' => 2, 'nome' => 'Kauan Matheus'],
                ['matricula' => 3, 'nome' => 'Rafael Macedo'],
                ['matricula' => 4, 'nome' => 'Eliane Alves'],
                ['matricula' => 5, 'nome' => 'Renato Souza']
            ];

        $p =  "<ul>";

        foreach ($alunos as $aluno) {
            $p = $p . "<li> Matricula =>" . $aluno['matricula'] . " - |Nome =>" . $aluno['nome'] . "</li>";
        }

        $p .= "</ul>";

        return $p;
    })->name('aluno');

    Route::get('/limite/{limit}', function ($limit) {
        $alunos =
            [
                'Renan Luiz',
                'Kauan Matheus',
                'Rafael Macedo',
                'Eliane Alves',
                'Renato Souza'
            ];

        $i = 0;

        $p =  "<ul>";

        foreach ($alunos as $aluno) {
            if ($i < $limit) {
                $p = $p . "<li>$aluno</li>";
            }
            $i++;
        }

        $p .= "</ul>";

        return $p;
    })->name('limite')->where('limit', '[0-5]');

    Route::get('/matricula/{mat}', function ($mat) {


        $alunos =
            [
                ['matricula' => 1, 'nome' => 'Renan Luiz'],
                ['matricula' => 2, 'nome' => 'Kauan Matheus'],
                ['matricula' => 3, 'nome' => 'Rafael Macedo'],
                ['matricula' => 4, 'nome' => 'Eliane Alves'],
                ['matricula' => 5, 'nome' => 'Renato Souza']
            ];

        foreach ($alunos as $aluno) {
            if ($aluno['matricula'] == $mat) {
                $p = "Aluno: " . $aluno['nome'] . "</li></ul>";

                return $p;
            }
        }
        return "<h1>Aluno não encontrado</h1>";
    })->name('matricula')->where('mat', '[1-9+]');;

    Route::get('/nome/{nome}', function ($nome) {
        $alunos =
            [
                'Renan',
                'Kauan',
                'Rafael',
                'Eliane',
                'Renato'
            ];

        foreach ($alunos as $aluno) {
            if (strcmp($nome, $aluno) == 0) {
                return "Aluno encontrado => " . $aluno;
            }
        }

        return "<h1>Aluno não encontrado!</h1>";
    })->name('nome')->where('nome', '[A-Za-z]+');
});

Route::prefix('/nota')->group(function () {

    Route::get('/', function () {
        $alunos =
            [
                ['matricula' => 1, 'nome' => 'Renan Luiz', 'nota' => 1],
                ['matricula' => 2, 'nome' => 'Kauan Matheus', 'nota' => 3],
                ['matricula' => 3, 'nome' => 'Rafael Macedo', 'nota' => 2],
                ['matricula' => 4, 'nome' => 'Eliane Alves', 'nota' => 8],
                ['matricula' => 5, 'nome' => 'Renato Souza', 'nota' => 5]
            ];

        $p =  "<ul>";

        foreach ($alunos as $aluno) {
            $p = $p .
                "<li> 
                Matricula: " . $aluno['matricula']
                . "   |Nome:  " . $aluno['nome'] .
                "   |Nota:  " . $aluno['nota'] .
                "</li>";
        }

        $p .= "</ul>";

        return $p;
    })->name('nota');

    Route::get('/limite/{limit}', function ($limit) {
        $alunos =
            [
                ['matricula' => 1, 'nome' => 'Renan Luiz', 'nota' => 1],
                ['matricula' => 2, 'nome' => 'Kauan Matheus', 'nota' => 3],
                ['matricula' => 3, 'nome' => 'Rafael Macedo', 'nota' => 2],
                ['matricula' => 4, 'nome' => 'Eliane Alves', 'nota' => 8],
                ['matricula' => 5, 'nome' => 'Renato Souza', 'nota' => 5]
            ];

        $i = 0;

        $p =  "<ul>";

        foreach ($alunos as $aluno) {
            if ($i < $limit) {
                $p = $p . "<li>Nome:  " . $aluno['nome'] . " Nota:  " . $aluno['nota'] . "</li>";
            }
            $i++;
        }

        $p .= "</ul>";

        return $p;
    })->name('limite')->where('limit', '[0-5]');

    Route::get('/lancar/{mat}/{nota}', function ($mat, $nota) {

        $alunos =
            [
                ['matricula' => 1, 'nome' => 'Renan Luiz', 'nota' => 10],
                ['matricula' => 2, 'nome' => 'Kauan Matheus', 'nota' => 9],
                ['matricula' => 3, 'nome' => 'Rafael Macedo', 'nota' => 4],
                ['matricula' => 4, 'nome' => 'Eliane Alves', 'nota' => 2],
                ['matricula' => 5, 'nome' => 'Renato Souza', 'nota' => 7]
            ];

        $p =  "<ul>";

        foreach ($alunos as $aluno) {

            if ($aluno['matricula'] == $mat) {
                $aluno['nota'] = $nota;
                $p .=  "<li>Matricula: " . $aluno['matricula'] . " - Nome: " . $aluno['nome'] . " Nota: - " . $aluno['nota'] . "</li>";
            } else {
                $p .=  "<li>Matricula: " . $aluno['matricula'] . " - Nome: " . $aluno['nome'] . " Nota: - " . $aluno['nota'] . "</li>";
            }
        }
        $p .= "</ul>";



        return $p;
    })->name('lancar')->where('mat', '[0-5]')->where('nota', '[0-9+]');

    Route::get('/conceito/{a}/{b}/{c}', function ($a, $b, $c) {


        $con = [$a,$b,$c];
        sort($con);

        $alunos =
            [
                ['matricula' => 1, 'nome' => 'Renan Luiz', 'nota' => 10, 'conceito' => ''],
                ['matricula' => 2, 'nome' => 'Kauan Matheus', 'nota' => 9, 'conceito' => ''],
                ['matricula' => 3, 'nome' => 'Rafael Macedo', 'nota' => 4, 'conceito' => ''],
                ['matricula' => 4, 'nome' => 'Eliane Alves', 'nota' => 2, 'conceito' => ''],
                ['matricula' => 5, 'nome' => 'Renato Souza', 'nota' => 7, 'conceito' => '']
            ];


        $p =  "<ul>";

        for ($i = 0; $i < count($alunos); $i++) {
            if ($alunos[$i]['nota'] >= $con[2]) {

                $alunos[$i]['conceito'] = 'A';
            } else if ($alunos[$i]['nota'] >=  $con[1] && $alunos[$i]['nota'] <  $con[2]) {

                $alunos[$i]['conceito'] = 'B';
            } else if ($alunos[$i]['nota'] >= $con[0] && $alunos[$i]['nota'] < $con[1]) {

                $alunos[$i]['conceito'] = 'C';
            } else {

                $alunos[$i]['conceito'] = 'D';
            }
        }

        foreach ($alunos as $aluno) {

            $p .=  "<li>Matricula: " . $aluno['matricula'] 
            . "  Nome: " 
            . $aluno['nome'] 
            . " Nota:  " 
            . $aluno['nota'] . " Conceito:  ".
            $aluno['conceito'] ."</li>";
        }

        $p .= "</ul>";


           return $p;
    })->name('conceito')->where('a', '[0-9+]')->where('b', '[0-9+]')->where('c', '[0-9+]');
});
