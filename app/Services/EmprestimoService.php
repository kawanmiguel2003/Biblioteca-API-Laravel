<?php

namespace App\Services;

use App\Repositories\EmprestimoRepository;

class EmprestimoService
{
    protected $emprestimoRepo;

    public function __construct(EmprestimoRepository $emprestimoRepo)
    {
        $this->emprestimoRepo = $emprestimoRepo;
    }

    public function listarEmprestimos()
    {
        return $this->emprestimoRepo->all();
    }

    public function criarEmprestimo(array $data)
    {
        return $this->emprestimoRepo->create($data);
    }

    public function atualizarEmprestimo($emprestimo, array $data)
    {
        return $this->emprestimoRepo->update($emprestimo, $data);
    }

    public function excluirEmprestimo($emprestimo)
    {
        return $this->emprestimoRepo->delete($emprestimo);
    }
}
