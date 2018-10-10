<?php

use Illuminate\Database\Seeder;

class ReactionIconsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reaction_icons')->insert([
            ['path' => 'grinning.jpg', 'name' => 'grinning'],
            ['path' => 'grin.jpg', 'name' => 'grin'],
            ['path' => 'joy.jpg', 'name' => 'joy'],
            ['path' => 'rolling_on_the_floor.jpg', 'name' => 'rolling_on_the_floor'],
            ['path' => 'smiley.jpg', 'name' => 'smiley']
        ]);
    }
}
