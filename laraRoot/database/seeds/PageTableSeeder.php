<?php

use Illuminate\Database\Seeder;
use App\Page;

class PageTableSeeder extends Seeder {

  public function run()
  {
    DB::table('pages')->delete();

  }

}