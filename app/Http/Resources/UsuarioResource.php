<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UsuarioResource extends JsonResource
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
            'nome' => $this->nome,
            'email' => $this->email,
            'data_criacao' => $this->created_at,
            'data_atualizacao' => $this->updated_at,
            // Relacionamentos, se necessário
            // 'livros' => LivroResource::collection($this->whenLoaded('livros')),
        ];
    }
}
