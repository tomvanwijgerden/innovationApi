<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MetaAbsenceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('mysql')
          ->table('meta_absence_types')
          ->truncate();


        $this->insert('1', 'Illness');
        $this->insert('2', 'Recovered');
    }

    private function insert($id, $name)
    {
        DB::connection('mysql')
          ->table('meta_absence_types')
          ->insert(
              compact(
                  'id',
                  'name',
              )
          );
    }
}
