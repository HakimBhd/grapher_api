<?php

namespace Database\Factories;

use App\Models\Edge;
use App\Models\Node;
use Illuminate\Database\Eloquent\Factories\Factory;

class EdgeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Edge::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'parent_id' => Node::factory(),
            'child_id' => Node::factory()
        ];
    }
}