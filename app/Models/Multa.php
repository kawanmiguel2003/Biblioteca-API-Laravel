<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Multa extends Model
{
    use HasFactory;

    protected $fillable = [
        'emprestimo_id',
        'valor',
        'status'
    ];

    public function emprestimo()
    {
        return $this->belongsTo(Emprestimo::class);
    }
}
