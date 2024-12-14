<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmprestimoResource;
use App\Models\Emprestimo;
use App\Services\EmprestimoService;
use Illuminate\Http\Request;

class EmprestimoController extends Controller
{
    protected $emprestimoService;

    public function __construct(EmprestimoService $emprestimoService)
    {
        $this->emprestimoService = $emprestimoService;
    }

    public function index()
    {
        $emprestimos = $this->emprestimoService->listarEmprestimos();
        return EmprestimoResource::collection($emprestimos);  // Retorna todos os empréstimos com a resource
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'livro_id' => 'required|exists:livros,id',
            'data_emprestimo' => 'required|date',
            'data_devolucao' => 'nullable|date',
        ]);

        $emprestimo = $this->emprestimoService->criarEmprestimo($dados);
        return new EmprestimoResource($emprestimo);  // Retorna o empréstimo criado com a resource
    }

    public function update(Request $request, Emprestimo $emprestimo)
    {
        $dados = $request->validate([
            'data_devolucao' => 'required|date',
        ]);

        $emprestimoAtualizado = $this->emprestimoService->atualizarEmprestimo($emprestimo, $dados);
        return new EmprestimoResource($emprestimoAtualizado);  // Retorna o empréstimo atualizado com a resource
    }

    public function destroy(Emprestimo $emprestimo)
    {
        $this->emprestimoService->deletarEmprestimo($emprestimo);
        return response()->json(['message' => 'Empréstimo excluído com sucesso'], 200);  // Retorna uma mensagem de sucesso
    }
}
