<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
        public function run()
    {
        $this->call(MainTest::class);
    }
}
     class MainTest extends Seeder
{
    public function run()
    {
     
        $number=10;
        for($i=0;$i<$number;$i++){
           DB::table('test')->insert([
            'titel'=>'test titel =>'.$number,
            'uid'=>rand(0000,5023)
        ]);
        }
       $this->command->info('het is nog niet opgeload');
    }
}

