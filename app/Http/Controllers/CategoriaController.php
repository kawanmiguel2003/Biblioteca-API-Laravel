<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriaRequest;
use App\Services\CategoriaService;
use App\Http\Resources\CategoriaResource;
use App\Models\Categoria;  // Não se esqueça de importar o modelo Categoria

class CategoriaController extends Controller
{
    protected $categoriaService;

    public function __construct(CategoriaService $categoriaService)
    {
        $this->categoriaService = $categoriaService;
    }

    public function index()
    {
        $categorias = $this->categoriaService->listarCategorias();
        return CategoriaResource::collection($categorias);  // Aqui você retorna uma coleção
    }

    public function store(CategoriaRequest $request)
    {
        $categoria = $this->categoriaService->criarCategoria($request->validated());
        return new CategoriaResource($categoria);  // Retorna uma instância única de CategoriaResource
    }

    public function update(CategoriaRequest $request, $id)
    {
        $categoria = Categoria::findOrFail($id);  // Encontrar a categoria pelo ID
        $categoriaAtualizada = $this->categoriaService->atualizarCategoria($categoria, $request->validated());
        return new CategoriaResource($categoriaAtualizada);  // Retorna a categoria atualizada
    }

    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);  // Encontrar a categoria a ser deletada
        $this->categoriaService->excluirCategoria($categoria);
        return response()->noContent();  // Resposta sem conteúdo (código 204)
    }
}
