<?php

namespace App\Services;

use App\Repositories\LivroRepository;

class LivroService
{
    protected $livroRepo;

    public function __construct(LivroRepository $livroRepo)
    {
        $this->livroRepo = $livroRepo;
    }

    public function listarLivros()
    {
        return $this->livroRepo->all();
    }

    public function criarLivro(array $data)
    {
        return $this->livroRepo->create($data);
    }

    public function atualizarLivro($livro, array $data)
    {
        return $this->livroRepo->update($livro, $data);
    }

    public function excluirLivro($livro)
    {
        return $this->livroRepo->delete($livro);
    }
}
