<?php

namespace App\Console\Commands;

use App\Models\AbsenceCourse;
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

            $this->createAbsenceCourses($employee->id);

        }
    }

    private function createAbsenceCourses($employeeId){
        $amount = random_int(1,10);
        for ($i = 0; $i < $amount; $i++){
            $faker = Factory::create();
            $percentage = random_int(0,100);
            $absenceCourse = new AbsenceCourse();
            $absenceCourse->start_at = $faker->date;
            $absenceCourse->end_at = Carbon::parse($absenceCourse->start_at)->addDays(random_int(1,700));
            $absenceCourse->employee_id = $employeeId;
            $absenceCourse->absence_percentage = $percentage;
            $absenceCourse->type_id = $percentage == 0 ? 2 : 1;
            $absenceCourse->save();
        }
    }
}
