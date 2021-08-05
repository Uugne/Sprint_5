<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run(){
        $em1 = new \App\Models\Employee();
        $em1->firstname = "Jonas";
        $em1->project_id = "1";
        $em1->save();

        $em2 = new \App\Models\Employee();
        $em2->firstname = "Petras";
        $em2->project_id = "1";
        $em2->save();
    }
}
