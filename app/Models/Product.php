<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

#[Fillable(['nombre', 'descripcion','precio','stock','categoria','imagen','user_id'])]
class Product extends Model
{
    /** @use HasFactory<UserFactory> */
    use HasFactory; 

    protected function casts(): array
    {
        return [
            'precio' => 'decimal:2',
            'stock' => 'integer',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
