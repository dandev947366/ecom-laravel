<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
    protected $fillable = [
        'name',
        'status',
    ];

}
