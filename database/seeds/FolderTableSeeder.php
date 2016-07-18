<?php

use Illuminate\Database\Seeder;

class FolderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Folder::create(['title' => 'default', 'weight' => 50]);
    }
}
