<?php

namespace App\Services;

use App\Repositories\MultaRepository;

class MultaService
{
    protected $multaRepo;

    public function __construct(MultaRepository $multaRepo)
    {
        $this->multaRepo = $multaRepo;
    }

    public function listarMultas()
    {
        return $this->multaRepo->all();
    }

    public function criarMulta(array $data)
    {
        return $this->multaRepo->create($data);
    }

    public function atualizarMulta($multa, array $data)
    {
        return $this->multaRepo->update($multa, $data);
    }

    public function excluirMulta($multa)
    {
        return $this->multaRepo->delete($multa);
    }
}
