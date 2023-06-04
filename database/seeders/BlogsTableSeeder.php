<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blogs;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // \Illuminate\Database\Eloquent\Factories\Factory::factoryForModel(Blogs::class)->count(15)->create();

        \App\Models\Blogs::factory(15)->create();
    }
}
