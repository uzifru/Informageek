<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = collect(['kategori1', 'kategori2', 'kategori3', 'kategori4', 'kategori5']);
    	$categories->each(function($c) {
    		\App\Category::create([
    			'name' => $c,
    			'slug' => \Str::slug($c),
    		]);
    	});
    }
}
