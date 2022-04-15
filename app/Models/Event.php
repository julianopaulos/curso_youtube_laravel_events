<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    use HasFactory;
    //seta a maneira que deve ser salvo o campo no banco
    protected $casts = [
        'items' => 'array',
    ];

    //faz o laravel reconhecer o campo e salvar na formatação correta
    protected $dates = ['date'];

    //indica que tudo que for enviado via requisição pode ser atualizado (tomar cuidados em relação a segurança)
    //os campos que estiverem dentro dessa variável não serão atualizados
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
