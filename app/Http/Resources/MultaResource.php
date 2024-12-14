<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MultaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'usuario_id' => $this->usuario_id,
            'emprestimo_id' => $this->emprestimo_id,
            'valor' => $this->valor,
            'data_criacao' => $this->created_at,
            'data_atualizacao' => $this->updated_at,
            // Relacionamentos, se necessário, exemplo:
            'usuario' => new UsuarioResource($this->whenLoaded('usuario')),  // Exemplo de relacionamento com o modelo Usuario
            'emprestimo' => new EmprestimoResource($this->whenLoaded('emprestimo')),  // Exemplo de relacionamento com o modelo Emprestimo
        ];
    }
}
