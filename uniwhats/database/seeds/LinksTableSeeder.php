<?php

use Illuminate\Database\Seeder;
use App\Link;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Link::class,5)->create();
    }
}
