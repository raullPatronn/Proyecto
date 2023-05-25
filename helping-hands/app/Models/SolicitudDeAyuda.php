<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudDeAyuda extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo', 'descripcion','ayuda', 'usuario_id'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
    public function comentarios()
{
    return $this->hasMany(Comentario::class);
}

}
