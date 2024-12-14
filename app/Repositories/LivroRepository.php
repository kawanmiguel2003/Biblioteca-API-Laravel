<?php

namespace App\Repositories;

use App\Models\Livro;

class LivroRepository
{
    public function all()
    {
        return Livro::with('categoria')->get();
    }

    public function create(array $data)
    {
        return Livro::create($data);
    }

    public function update(Livro $livro, array $data)
    {
        $livro->update($data);
        return $livro;
    }

    public function delete(Livro $livro)
    {
        $livro->delete();
    }
}
