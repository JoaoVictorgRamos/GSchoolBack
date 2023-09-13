<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tarefa; // Certifique-se de importar o modelo de Tarefa

class TarefaController extends Controller
{
    public function create(Request $request)
    {
        // Valide os dados do formulário, se necessário
        $validatedData = $request->validate([
            'titulo' => 'required|string',
            'descricao' => 'required|string',
            'data_vencimento' => 'required|date',
            'status' => 'required|in:Pendente,Completa',
        ]);

        // Crie uma nova tarefa com base nos dados validados
        $tarefa = new Tarefa($validatedData);
        $tarefa->save();

        return response()->json(['message' => 'Tarefa criada com sucesso!'], 201);
    }

    public function edit($id)
    {
        $tarefa = Tarefa::findOrFail($id);

        // Retorne a view de edição com a tarefa a ser editada
        return response()->json(['message' => 'Tarefa atualizada com sucesso!'], 201);
    }

    public function update(Request $request, $id)
    {
        // Valide os dados do formulário, se necessário
        $validatedData = $request->validate([
            'titulo' => 'required|string',
            'descricao' => 'required|string',
            'data_vencimento' => 'required|date',
            'status' => 'required|in:Pendente,Completa',
        ]);

        $tarefa = Tarefa::findOrFail($id);
        $tarefa->update($validatedData);

        return response()->json(['message' => 'Tarefa atualizada com sucesso!'], 201);
    }

    public function destroy($id)
    {
        $tarefa = Tarefa::findOrFail($id);
        $tarefa->delete();

        return response()->json(['message' => 'Tarefa excluída com sucesso!'], 201);
    }
}
