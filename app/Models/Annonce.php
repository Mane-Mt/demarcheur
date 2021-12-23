<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Annonce extends Model
{
    use HasFactory;
    protected $fillable =[
    	'type',
        'phone',
    	'quartier',
    	'description',
    	'annoncestatus',
        'posteur',
    	'photo1',
    	'photo2',
    	'photo3',
    	'photo4',
    	'photo5',
    	'user_id',
    ];

     /**
         * Get the user that owns the Annonce
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function user(): BelongsTo
        {
            return $this->belongsTo(User::class, 'user_id');
        }

}
