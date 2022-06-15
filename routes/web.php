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
            "<ul>
            <li>Renan Luiz</li>
            <li>Kauan Matheus</li>
            <li>Rafael Macedo</li>
            <li>Eliane Alves</li>
            <li>Renato Souza</li>
        </ul>";

        return $alunos;
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
                'Renan Luiz',
                'Kauan Matheus',
                'Rafael Macedo',
                'Eliane Alves',
                'Renato Souza'
            ];

        $p = "<ul><li>" . $alunos[$mat - 1] . "</li></ul>";

        return $p;
    })->name('matricula')->where('mat', '[1-5]');;

    Route::get('/nome/{nome}', function ($nome) {
        $alunos =
            [
                'Renan Luiz',
                'Kauan Matheus',
                'Rafael Macedo',
                'Eliane Alves',
                'Renato Souza'
            ];

        foreach ($alunos as $aluno) {
            if (strcmp($nome, $aluno) == 0) {
                return $aluno;
            } else {
                return "<h1>Aluno não encontrado!</h1>";
            }
        }
    })->name('nome')->where('nome', '[A-Za-z]+');
});

Route::prefix('/nota')->group(function () {

    Route::get('/', function () {
        $notas =
            "<ul>
                <li>Renan Luiz</li>
                <li>Kauan Matheus</li>
                <li>Rafael Macedo</li>
                <li>Eliane Alves</li>
                <li>Renato Souza</li>
            </ul>";

        return $notas;
    })->name('nota');

    Route::get('/limite/{limit}', function ($limit) {
        $notas =
            [
                'Renan Luiz',
                'Kauan Matheus',
                'Rafael Macedo',
                'Eliane Alves',
                'Renato Souza'
            ];

        $i = 0;

        $p =  "<ul>";

        foreach ($notas as $nota) {
            if ($i < $limit) {
                $p = $p . "<li>$nota</li>";
            }
            $i++;
        }

        $p .= "</ul>";

        return $p;
    })->name('limite');

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
                $p .=  "<li>" . $aluno['matricula'] . " - " . $aluno['nome'] . " - " . $aluno['nota'] . "</li>";
            } else {
                $p .=  "<li>" . $aluno['matricula'] . " - " . $aluno['nome'] . " - " . $aluno['nota'] . "</li>";
            }
        }
        $p .= "</ul>";

        return $p;
    })->name('lancar');

    Route::get('/conceito/{a}/{b}/{c}', function ($a, $b, $c) {

        $media = ($a + $b + $c) / 3;

        $alunos =
            [
                ['matricula' => 1, 'nome' => 'Renan Luiz', 'nota' => 10,'conceito'=> ''],
                ['matricula' => 2, 'nome' => 'Kauan Matheus', 'nota' => 9,'conceito'=> ''],
                ['matricula' => 3, 'nome' => 'Rafael Macedo', 'nota' => 4,'conceito'=> ''],
                ['matricula' => 4, 'nome' => 'Eliane Alves', 'nota' => 2,'conceito'=> ''],
                ['matricula' => 5, 'nome' => 'Renato Souza', 'nota' => 7,'conceito'=> '']
            ];
        $p =  "<ul>";

        foreach ($alunos as $aluno) {
            /*if () {
                $p .=  "<li>" . $aluno['matricula'] 
                . " - " . $aluno['nome'] 
                . " - " . $aluno['nota'].
                 " - " . $aluno['conceito'] . "</li>";
            } else {
                $p .=  "<li>" . $aluno['matricula'] 
                . " - " . $aluno['nome'] 
                . " - " . $aluno['nota'].
                 " - " . $aluno['conceito'] . "</li>";
            }
            */
        }
        $p .= "</ul>";

        return $p;
    })->name('conceito');
});
