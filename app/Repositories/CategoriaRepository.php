<?php

namespace App\Repositories;

use App\Models\Categoria;

class CategoriaRepository
{
    public function all()
    {
        return Categoria::all();
    }

    public function create(array $data)
    {
        return Categoria::create($data);
    }

    public function update(Categoria $categoria, array $data)
    {
        $categoria->update($data);
        return $categoria;
    }

    public function delete(Categoria $categoria)
    {
        $categoria->delete();
    }
}
