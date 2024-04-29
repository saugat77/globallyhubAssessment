<?php

namespace Database\Seeders;

use App\Models\EducationBackgroundModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EducationBackgroundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $educations = [
            ['name'=>'School level','slug' => 'school_level'],
            ['name'=>'+2 level','slug' => '+2_level'],
            ['name'=>'Bachelor Level','slug' => 'Bachelor_level'],
            ['name'=>'Master Level','slug' => 'Master Level'],
            ['name'=>'Phd Level','slug' => 'Phd Level'],
        ];
        foreach($educations as $education){
            $education = EducationBackgroundModel::firstOrCreate($education);
        }
    }
}
