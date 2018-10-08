<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;


class UsersSeeder extends Seeder
{
    public function run()
    {
        /**
         * An array that defines employees and supervisors regarding their hierarchy
         */

        $chiefsData = [
            // 1 level of hierarhy
            '0' => ['count' => 1, 'position' => 'SEO'],
            // 2 level of hierarhy
            '1' => ['count' => 2, 'position' => 'Shareholders'],
            // 3rd level of hierarhy
            '2' => ['count' => 2, 'position' => 'Board of Directors'],
            '3' => ['count' => 2, 'position' => 'Board of Directors'],
            //4 level of hierarhy
            '4' => ['count' => 3, 'position' => 'Head of Technical Department'],
            '5' => ['count' => 3, 'position' => 'Head of Sales Department'],
            '6' => ['count' => 3, 'position' => 'Head of Human Resources Department'],
            '7' => ['count' => 3, 'position' => 'Head of Procurement Department'],
            //5 level of hierarhy
            '8' => ['count' => 3, 'position' => 'Head of Department'],
            '9' => ['count' => 3, 'position' => 'Head of Department'],
            '10' => ['count' => 3, 'position' => 'Head of Department'],
            '11' => ['count' => 3, 'position' => 'Head of Department'],
            '12' => ['count' => 3, 'position' => 'Head of Department'],
            '13' => ['count' => 3, 'position' => 'Head of Department'],
            '14' => ['count' => 3, 'position' => 'Head of Department'],
            '15' => ['count' => 3, 'position' => 'Head of Department'],
            '16' => ['count' => 3, 'position' => 'Head of Department'],
            '17' => ['count' => 3, 'position' => 'Head of Department'],
            '18' => ['count' => 3, 'position' => 'Head of Department'],
            '19' => ['count' => 3, 'position' => 'Head of Department'],

            ];





        foreach($chiefsData as $key => $values) {
            factory(App\User::class, $values['count'])->create(['parent_id' => $key, 'position' => $values['position']]);
        }
        /**
         * Select all Head of Departament to assign them subordinates
         */
        $chiefs = User::whereIn('position', ['Head of Department'])->get();

        foreach ($chiefs as $chief) {
            factory(App\User::class, 50)->create(['parent_id' => $chief['id']]);
        }

    }
}