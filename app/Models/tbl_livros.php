<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_livros extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomeLivro',
        'generoLivro',
        'anoLivro',
    ];
}
