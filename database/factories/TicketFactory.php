<?php

namespace Database\Factories;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{

    protected $model = Ticket::class;


    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'ex_date' => $this->faker->dateTimeBetween($startDate = 'now', $endDate = '+1 years', $timezone = null),
        ];
    }
}
