<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmprestimoResource extends JsonResource
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
            'livro_id' => $this->livro_id,
            'data_emprestimo' => $this->data_emprestimo,
            'data_devolucao' => $this->data_devolucao,
            // Outros campos que você deseja incluir
            'usuario' => new UsuarioResource($this->whenLoaded('usuario')),  // Se você tem relacionamento com o modelo Usuario
            'livro' => new LivroResource($this->whenLoaded('livro')),  // Se você tem relacionamento com o modelo Livro
        ];
    }
}
