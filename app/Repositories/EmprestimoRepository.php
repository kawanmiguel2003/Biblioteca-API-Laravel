<?php

namespace App\Repositories;

use App\Models\Emprestimo;

class EmprestimoRepository
{
    public function all()
    {
        return Emprestimo::with(['usuario', 'livro'])->get();
    }

    public function create(array $data)
    {
        return Emprestimo::create($data);
    }

    public function update(Emprestimo $emprestimo, array $data)
    {
        $emprestimo->update($data);
        return $emprestimo;
    }

    public function delete(Emprestimo $emprestimo)
    {
        $emprestimo->delete();
    }
}
