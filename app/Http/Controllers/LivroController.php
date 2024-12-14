<?php

namespace App\Http\Controllers;

use App\Http\Requests\LivroRequest;
use App\Services\LivroService;
use App\Http\Resources\LivroResource;
use App\Models\Livro;

class LivroController extends Controller
{
    protected $livroService;

    public function __construct(LivroService $livroService)
    {
        $this->livroService = $livroService;
    }

    public function index()
    {
        $livros = $this->livroService->listarLivros();
        return LivroResource::collection($livros);  // Retorna todos os livros com a resource
    }

    public function store(LivroRequest $request)
    {
        $livro = $this->livroService->criarLivro($request->validated());
        return new LivroResource($livro);  // Retorna o livro criado com a resource
    }

    public function update(LivroRequest $request, $id)
    {
        $livro = Livro::findOrFail($id);
        $livroAtualizado = $this->livroService->atualizarLivro($livro, $request->validated());
        return new LivroResource($livroAtualizado);  // Retorna o livro atualizado com a resource
    }

    public function destroy($id)
    {
        $livro = Livro::findOrFail($id);
        $this->livroService->excluirLivro($livro);
        return response()->noContent();  // Retorna uma resposta sem conteúdo (204) após a exclusão
    }
}
