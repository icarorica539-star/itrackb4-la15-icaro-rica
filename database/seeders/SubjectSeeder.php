<?php

namespace Database\Seeders;

use App\Models\Prerequisite;
use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        // Create or find existing prerequisite records
        $none = Prerequisite::firstOrCreate([
            'name' => 'None'
        ]);

        $pf = Prerequisite::firstOrCreate([
            'name' => 'Programming Fundamentals'
        ]);

        $wst = Prerequisite::firstOrCreate([
            'name' => 'Web Systems and Technologies'
        ]);

        // 20 subject records
        $subjects = [
            [
                'code' => 'ITP1501',
                'title' => 'Database Management Systems',
                'units' => 3,
                'is_active' => 1,
                'prerequisite_id' => $pf->id,
            ],
            [
                'code' => 'ITP1502',
                'title' => 'Computer Networking',
                'units' => 3,
                'is_active' => 1,
                'prerequisite_id' => $none->id,
            ],
            [
                'code' => 'ITP1503',
                'title' => 'Advanced Web Development',
                'units' => 3,
                'is_active' => 1,
                'prerequisite_id' => $wst->id,
            ],
            [
                'code' => 'ITP1504',
                'title' => 'Mobile Application Development',
                'units' => 2,
                'is_active' => 1,
                'prerequisite_id' => $pf->id,
            ],
            [
                'code' => 'ITP1505',
                'title' => 'Information Assurance and Security',
                'units' => 3,
                'is_active' => 1,
                'prerequisite_id' => $none->id,
            ],
            [
                'code' => 'ITP1506',
                'title' => 'Systems Analysis and Design',
                'units' => 3,
                'is_active' => 1,
                'prerequisite_id' => $pf->id,
            ],
            [
                'code' => 'ITP1507',
                'title' => 'Human Computer Interaction',
                'units' => 2,
                'is_active' => 1,
                'prerequisite_id' => $none->id,
            ],
            [
                'code' => 'ITP1508',
                'title' => 'Data Structures and Algorithms',
                'units' => 3,
                'is_active' => 1,
                'prerequisite_id' => $pf->id,
            ],
            [
                'code' => 'ITP1509',
                'title' => 'Object-Oriented Design',
                'units' => 3,
                'is_active' => 1,
                'prerequisite_id' => $pf->id,
            ],
            [
                'code' => 'ITP1510',
                'title' => 'Cloud Computing Fundamentals',
                'units' => 3,
                'is_active' => 1,
                'prerequisite_id' => $none->id,
            ],
            [
                'code' => 'ITP1511',
                'title' => 'Software Engineering',
                'units' => 3,
                'is_active' => 1,
                'prerequisite_id' => $pf->id,
            ],
            [
                'code' => 'ITP1512',
                'title' => 'Computer Architecture',
                'units' => 2,
                'is_active' => 1,
                'prerequisite_id' => $none->id,
            ],
            [
                'code' => 'ITP1513',
                'title' => 'Operating Systems',
                'units' => 3,
                'is_active' => 1,
                'prerequisite_id' => $none->id,
            ],
            [
                'code' => 'ITP1514',
                'title' => 'Information Management',
                'units' => 3,
                'is_active' => 1,
                'prerequisite_id' => $pf->id,
            ],
            [
                'code' => 'ITP1515',
                'title' => 'Introduction to Cybersecurity',
                'units' => 3,
                'is_active' => 1,
                'prerequisite_id' => $none->id,
            ],
            [
                'code' => 'ITP1516',
                'title' => 'E-Commerce Development',
                'units' => 2,
                'is_active' => 1,
                'prerequisite_id' => $wst->id,
            ],
            [
                'code' => 'ITP1517',
                'title' => 'Network Administration',
                'units' => 3,
                'is_active' => 1,
                'prerequisite_id' => $none->id,
            ],
            [
                'code' => 'ITP1518',
                'title' => 'Mobile UI and UX Design',
                'units' => 2,
                'is_active' => 1,
                'prerequisite_id' => $pf->id,
            ],
            [
                'code' => 'ITP1519',
                'title' => 'Research Methods in IT',
                'units' => 3,
                'is_active' => 1,
                'prerequisite_id' => $none->id,
            ],
            [
                'code' => 'ITP1520',
                'title' => 'IT Project Management',
                'units' => 3,
                'is_active' => 1,
                'prerequisite_id' => $pf->id,
            ],
        ];

        // Insert only subjects that do not already exist
        foreach ($subjects as $subject) {
            Subject::firstOrCreate(
                ['code' => $subject['code']],
                $subject
            );
        }
    }
}
