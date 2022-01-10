<?php

namespace App\Console\Commands;

use App\Models\AbsenceCourse;
use App\Models\Dossier;
use App\Models\Employee;
use App\Models\Employer;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;


class CreateFakeData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'development:create-fake-data';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        DB::connection('mysql')->table('employers')->truncate();
        DB::connection('mysql')->table('employees')->truncate();
        DB::connection('mysql')->table('absence_courses')->truncate();
        $this->createEmployers();
    }


    private function createEmployers(){
        $amount = random_int(3,10);
        for ($i = 0; $i < $amount; $i++){
            $faker = Factory::create();
            $employers = new Employer();
            $employers->name = $faker->company;
            $employers->street = $faker->streetAddress;
            $employers->save();

            $this->createEmployees($employers->id);
        }
    }

    private function createEmployees($id){
        $amount = random_int(10,30);
        for ($i = 0;$i < $amount; $i++){
            $faker = Factory::create();
            $employee = new Employee();
            $employee->name = $faker->name;
            $employee->date_of_birth = $faker->date;
            $employee->employer_id = $id;
            $employee->save();

            $this->createDossiers($employee->id);

        }
    }

    private function createDossiers($employeeId){
        $amount = random_int(1,10);
        for ($i = 0; $i < $amount; $i++){
            $faker = Factory::create();
            $dossier = new Dossier();
            $dossier->start_at = $faker->date;
            $dossier->end_at = null;
            $dossier->employee_id = $employeeId;
            $dossier->dossier_status_id = 1;
            $dossier->save();

            $this->createAbsenceCourses($employeeId, $dossier, $faker->date);

            $lastAbsenceCourse = AbsenceCourse::where('dossier_id','=', $dossier->id)
                                ->orderByDesc('start_at')
                                ->first();

            if($lastAbsenceCourse->absence_percentage == 100){
                $dossier->dossier_status_id = 2;
                $dossier->end_at = $lastAbsenceCourse->start_at;
                $dossier->save();
            }

        }
    }

    private function createAbsenceCourses($employeeId, $dossier, $date){
        $amount = random_int(1,10);
        for ($i = 0; $i < $amount; $i++){
            $faker = Factory::create();
            $percentage = random_int(0,100);
            $absenceCourse = new AbsenceCourse();
            $absenceCourse->start_at = $date;
            $absenceCourse->end_at = Carbon::parse($absenceCourse->start_at)->addDays(random_int(1,730));
            $absenceCourse->dossier_id = $dossier->id;
            $absenceCourse->absence_percentage = $percentage;
            $absenceCourse->type_id = $percentage == 0 ? 2 : 1;
            $absenceCourse->save();
        }
    }
}
