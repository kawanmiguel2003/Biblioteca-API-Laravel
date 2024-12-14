<?php

namespace App\Services;

use App\Repositories\UsuarioRepository;

class UsuarioService
{
    protected $usuarioRepo;

    public function __construct(UsuarioRepository $usuarioRepo)
    {
        $this->usuarioRepo = $usuarioRepo;
    }

    public function listarUsuarios()
    {
        return $this->usuarioRepo->all();
    }

    public function criarUsuario(array $data)
    {
        return $this->usuarioRepo->create($data);
    }

    public function atualizarUsuario($usuario, array $data)
    {
        return $this->usuarioRepo->update($usuario, $data);
    }

    public function excluirUsuario($usuario)
    {
        return $this->usuarioRepo->delete($usuario);
    }
}
