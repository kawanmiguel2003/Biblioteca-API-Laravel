<?php

namespace App\Repositories;

use App\Models\Usuario;

class UsuarioRepository
{
    public function all()
    {
        return Usuario::all();
    }

    public function create(array $data)
    {
        return Usuario::create($data);
    }

    public function update(Usuario $usuario, array $data)
    {
        $usuario->update($data);
        return $usuario;
    }

    public function delete(Usuario $usuario)
    {
        $usuario->delete();
    }
}
