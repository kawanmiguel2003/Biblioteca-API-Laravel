<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LivroResource extends JsonResource
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
            'titulo' => $this->titulo,
            'autor' => $this->autor,
            'categoria_id' => $this->categoria_id,
            'data_publicacao' => $this->data_publicacao,
            'status' => $this->status,
            // Outros campos que você deseja incluir
            'categoria' => new CategoriaResource($this->whenLoaded('categoria')),  // Se você tem relacionamento com o modelo Categoria
        ];
    }
}
