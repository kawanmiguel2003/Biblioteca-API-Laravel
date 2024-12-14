<?php

namespace App\Services;

use App\Repositories\CategoriaRepository;

class CategoriaService
{
    protected $categoriaRepo;

    public function __construct(CategoriaRepository $categoriaRepo)
    {
        $this->categoriaRepo = $categoriaRepo;
    }

    public function listarCategorias()
    {
        return $this->categoriaRepo->all();
    }

    public function criarCategoria(array $data)
    {
        return $this->categoriaRepo->create($data);
    }

    public function atualizarCategoria($categoria, array $data)
    {
        return $this->categoriaRepo->update($categoria, $data);
    }

    public function excluirCategoria($categoria)
    {
        return $this->categoriaRepo->delete($categoria);
    }
}
