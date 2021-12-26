<?php

namespace Database\Factories;

use App\Models\Tag;
use App\Models\TagTopic;
use App\Models\Topic;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagTopicFactory extends Factory
{
    protected $model = TagTopic::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tag_id' => Tag::all()->random()->id,
            'topic_id' => Topic::all()->random()->id
        ];
    }
}
