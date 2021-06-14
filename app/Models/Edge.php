<?php

namespace App\Models;

use App\Models\Graph;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Edge extends Model
{
    use HasFactory;

    protected $fillable = [
        'graph_id',
        'parent_id',
        'child_id'
    ];

    public function graph() 
    {
        return $this->belongsTo(Graph::class);
    }

    public function parent() 
    {
        return $this->belongsTo(Graph::class, 'parent_id');
    }

    public function child() 
    {
        return $this->belongsTo(Graph::class, 'child_id');
    }
}
