<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Subtarefa;
use Illuminate\Http\Request;

class SubtarefaController extends Controller
{
    public function create(Request $request)
    {
        // Valide os dados do formulário, se necessário
        $validatedData = $request->validate([
            'titulo' => 'required|string',
            'id_tarefa' => 'required|exists:tarefas,id',
            'descricao' => 'required|string',
            'status' => 'required|in:Pendente,Completa',
        ]);

        // Crie uma nova subtarefa com base nos dados validados
        Subtarefa::create($validatedData);

        return response()->json(['message' => 'Subtarefa criada com sucesso!'], 201);
    }

    public function edit($id)
    {
        $subtarefa = Subtarefa::findOrFail($id);

        // Retorne a view de edição com a subtarefa a ser editada
        return response()->json(['message' => 'Subtarefa editada com sucesso!'], 201);
    }

    public function update(Request $request, $id)
    {
        // Valide os dados do formulário, se necessário
        $validatedData = $request->validate([
            'titulo' => 'required|string',
            'descricao' => 'required|string',
            'status' => 'required|in:Pendente,Completa',
        ]);

        $subtarefa = Subtarefa::findOrFail($id);
        $subtarefa->update($validatedData);

        return response()->json(['message' => 'Subtarefa editada com sucesso!'], 201);
    }

    public function destroy($id)
    {
        $subtarefa = Subtarefa::findOrFail($id);
        $subtarefa->delete();

        return response()->json(['message' => 'Subtarefa excluída com sucesso!'], 201);
    }
}
