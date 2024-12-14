<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Services\UsuarioService;
use App\Http\Resources\UsuarioResource;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    protected $usuarioService;

    public function __construct(UsuarioService $usuarioService)
    {
        $this->usuarioService = $usuarioService;
    }

    public function index()
    {
        $usuarios = $this->usuarioService->listarUsuarios();
        return UsuarioResource::collection($usuarios);  // Retorna a coleção de usuários com a resource
    }

    public function store(UsuarioRequest $request)
    {
        $usuario = $this->usuarioService->criarUsuario($request->validated());
        return new UsuarioResource($usuario);  // Retorna o usuário criado com a resource
    }

    public function update(UsuarioRequest $request, $id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuarioAtualizado = $this->usuarioService->atualizarUsuario($usuario, $request->validated());
        return new UsuarioResource($usuarioAtualizado);  // Retorna o usuário atualizado com a resource
    }

    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $this->usuarioService->excluirUsuario($usuario);
        return response()->noContent();  // Retorna resposta de sucesso após a exclusão
    }
}
