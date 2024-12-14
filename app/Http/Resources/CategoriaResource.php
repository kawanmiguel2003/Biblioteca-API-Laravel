<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoriaResource extends JsonResource
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
            'nome' => $this->nome,  // Adapte isso de acordo com os campos da sua tabela
            'descricao' => $this->descricao,  // Exemplo de outro campo
            // Outros campos que você deseja retornar
        ];
    }
}
