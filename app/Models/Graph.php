<?php

namespace App\Models;

use App\Models\Node;
use App\Models\Edge;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Graph extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public function nodes() 
    {
        return $this->hasMany(Node::class);
    }

    public function edges() 
    {
        return $this->hasMany(Edge::class);
    }
}
