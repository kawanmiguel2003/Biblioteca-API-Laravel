<?php

namespace App\Repositories;

use App\Models\Multa;

class MultaRepository
{
    public function all()
    {
        return Multa::all();
    }

    public function create(array $data)
    {
        return Multa::create($data);
    }

    public function update(Multa $multa, array $data)
    {
        $multa->update($data);
        return $multa;
    }

    public function delete(Multa $multa)
    {
        $multa->delete();
    }
}
