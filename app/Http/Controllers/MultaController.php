<?php

namespace App\Http\Controllers;

use App\Models\Multa;
use App\Services\MultaService;
use Illuminate\Http\Request;
use App\Http\Resources\MultaResource;

class MultaController extends Controller
{
    protected $multaService;

    public function __construct(MultaService $multaService)
    {
        $this->multaService = $multaService;
    }

    public function index()
    {
        $multas = $this->multaService->listarMultas();
        return MultaResource::collection($multas);  // Retorna todas as multas com a resource
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'emprestimo_id' => 'required|exists:emprestimos,id',
            'valor' => 'required|numeric|min:0',
        ]);

        $multa = $this->multaService->criarMulta($dados);
        return new MultaResource($multa);  // Retorna a multa criada com a resource
    }

    public function update(Request $request, Multa $multa)
    {
        $dados = $request->validate([
            'valor' => 'required|numeric|min:0',
        ]);

        $multaAtualizada = $this->multaService->atualizarMulta($multa, $dados);
        return new MultaResource($multaAtualizada);  // Retorna a multa atualizada com a resource
    }

    public function destroy(Multa $multa)
    {
        $this->multaService->deletarMulta($multa);
        return response()->json(['message' => 'Multa excluída com sucesso'], 200);  // Retorna a resposta de sucesso após a exclusão
    }
}
