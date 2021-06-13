<?php

namespace App\Models;

use App\Models\Graph;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    use HasFactory;

    protected $fillable = [
        'graph_id',
    ];

    public function graph() 
    {
        return $this->belongsTo(Graph::class);
    }
}
