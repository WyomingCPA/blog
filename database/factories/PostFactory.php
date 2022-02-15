<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'slug' => Str::slug($this->faker->name),
            'text' => $this->faker->text,
            'preview' => $this->faker->text,
            'user_id'   => 1,
            'category_id'   => 1,
        ];
    }
}
/*
            'title'         => 'required|min:3|max:255',
            'slug'          => 'required|min:3|max:255|unique:posts',
            'text'          => 'required',
            'user_id'   => 'required|numeric',
            'category_id'   => 'required|numeric',
*/