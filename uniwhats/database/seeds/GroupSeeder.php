<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            'name' => "Accounting & Finance",
            'shortName' => "ACFN",
        ]);
        DB::table('departments')->insert([
            'name' => "Aerospace Engineering",
            'shortName' => "AE",
        ]);
        DB::table('departments')->insert([
            'name' => "Architectural Engineering",
            'shortName' => "ARE",
        ]);
        DB::table('departments')->insert([
            'name' => "Architecture",
            'shortName' => "ARC",
        ]);




        DB::table('departments')->insert([
            'name' => "Civil & Environmental Engg",
            'shortName' => "CE",
        ]);
        DB::table('departments')->insert([
            'name' => "Construction Engg & Management",
            'shortName' => "CEM",
        ]);
        DB::table('departments')->insert([
            'name' => "Chemical Engineering",
            'shortName' => "CHE",
        ]);
        DB::table('departments')->insert([
            'name' => "Chemistry",
            'shortName' => "CHEM",
        ]);



        DB::table('departments')->insert([
            'name' => "Computer Engineering",
            'shortName' => "COE",
        ]);
        DB::table('departments')->insert([
            'name' => "CPG",
            'shortName' => "CPG",
        ]);
        DB::table('departments')->insert([
            'name' => "City & Regional Planning",
            'shortName' => "CRP",
        ]);





        DB::table('departments')->insert([
            'name' => "Earth Sciences",
            'shortName' => "ERTH",
        ]);
        DB::table('departments')->insert([
            'name' => "Electrical Engineering",
            'shortName' => "EE",
        ]);
        DB::table('departments')->insert([
            'name' => "English Language Inst. (Prep)",
            'shortName' => "ELI",
        ]);
        DB::table('departments')->insert([
            'name' => "English Language Department",
            'shortName' => "ELD",
        ]);




        DB::table('departments')->insert([
            'name' => "Info. Systems & Operations Mgt",
            'shortName' => "ISOM",
        ]);
        DB::table('departments')->insert([
            'name' => "Global & Social Studies",
            'shortName' => "GS",
        ]);
        DB::table('departments')->insert([
            'name' => "Islamic & Arabic Studies",
            'shortName' => "IAS",
        ]);
        DB::table('departments')->insert([
            'name' => "Information & Computer Science",
            'shortName' => "ICS",
        ]);
        DB::table('departments')->insert([
            'name' => "Life Sciences",
            'shortName' => "LS",
        ]);




        DB::table('departments')->insert([
            'name' => "Mathematics & Statistics",
            'shortName' => "MATH",
        ]);
        DB::table('departments')->insert([
            'name' => "Business Administration",
            'shortName' => "MBA",
        ]);
        DB::table('departments')->insert([
            'name' => "Mechanical Engineering",
            'shortName' => "ME",
        ]);




        DB::table('departments')->insert([
            'name' => "Management and Marketing",
            'shortName' => "MGT",
        ]);
        DB::table('departments')->insert([
            'name' => "Physical Education",
            'shortName' => "PE",
        ]);
        DB::table('departments')->insert([
            'name' => "Petroleum Engineering",
            'shortName' => "PETE",
        ]);




        DB::table('departments')->insert([
            'name' => "Physics",
            'shortName' => "PHYS",
        ]);
        DB::table('departments')->insert([
            'name' => "Prep Science & Engineering",
            'shortName' => "PSE",
        ]);
        DB::table('departments')->insert([
            'name' => "Systems Engineering",
            'shortName' => "SE",
        ]);




    }
}
