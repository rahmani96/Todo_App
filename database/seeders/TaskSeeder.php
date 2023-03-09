<?php

namespace Database\Seeders;

use DateTime;
use Carbon\Carbon;
use App\Models\Task;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::create([
            'user_id' => 1,
            'title' => 'first todo item',
            'description' => 'description for the first item',
            'due_date' => new DateTime('08/03/2023 18:46'),
            'coched' => false
        ]);

        Task::create([
            'user_id' => 1,
            'title' => 'second todo item',
            'description' => 'description for the second item',
            'due_date' => new DateTime('03/15/2023 16:20'),
            'coched' => true
        ]);

        Task::create([
            'user_id' => 1,
            'title' => 'third todo item',
            'description' => 'description for the third item',
            'due_date' => new DateTime('03/01/2023 14:28'),
            'coched' => false
        ]);

        Task::create([
            'user_id' => 1,
            'title' => 'fourth todo item',
            'description' => 'description for the fourth item',
            'due_date' => new DateTime('03/23/2023 08:15'),
            'coched' => true
        ]);

        Task::create([
            'user_id' => 1,
            'title' => 'fifth todo item',
            'description' => 'description for the fifth item',
            'due_date' => new DateTime('02/24/2023 05:30'),
            'coched' => false
        ]);
    }
}
