<?php

use Illuminate\Database\Seeder;
use App\User;
class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table_name = (new User)->getTable();

        DB::table($table_name)->delete();
        $column = $table_name.'_aid_seq';
    	DB::statement("ALTER SEQUENCE $column RESTART WITH 1");
        
        $kendrick = new User;
        $kendrick->first_name = 'Kendrick';
        $kendrick->last_name = 'Kesley';
        $kendrick->email = 'kendrick.kesley1995@gmail.com';
        $kendrick->password = bcrypt('kendricktakengo');
        $kendrick->remember_token = str_random(10);
        $kendrick->status = json_encode([
            'active' => true
        ]);
        $kendrick->last_ip = '::1';
        $kendrick->save();

        $veronica = new User;
        $veronica->first_name = 'Veronica';
        $veronica->last_name = 'Onggoro';
        $veronica->email = 'scolasticaonggoro@yahoo.co.id';
        $veronica->password = bcrypt('veronicatakengo');
        $veronica->remember_token = str_random(10);
        $veronica->status = json_encode([
            'active' => true
        ]);
        $veronica->last_ip = '::1';
        $veronica->save();
    }
}
