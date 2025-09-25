<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\About;

class seederAbout extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::create([
            'address'=>'Ruko Beryl 2 No.9, Jl. Gading Golf Boulevard, Gading Serpong, Tangerang - 15810',
            'company_name'=>'CV Nexus Education',
            'proprietor'=>'Ms. Siti Suwarni (I-ing) - Director',
            'contact_no'=>'+62 815 999 3255',
            'email'=>'nexuseducationstudyabroad@gmail.com',
            'vision'=>'To become the most trusted guide connecting Indonesian students to global education, ensuring every journey begins with clarity, care, and confidence.',
            'mission'=>'At Nexus Education, our mission is to empower Indonesian students to pursue their academic aspirations with clarity, care, and confidence. We provide personalized guidance, expert advice, and end-to-end support to help each student access the right global education pathway.
                        By working closely with families and schools, we ensure every journey is well-informed, well-prepared, and aligned with each student’s potential and purpose.',
            'values'=>[
                [
                    'img'=>'abc.png',
                    'title'=>'Professionalism'
                ],
                [
                    'img'=>'abd.png',
                    'title'=>'Student-Centricity'
                ],
                [
                    'img'=>'asd.png',
                    'title'=>'Integrity'
                ],
            ],
            'about'=>'Nexus Education is not new to the game, only to the name. Led by a core team with over 27 years in the industry, we’ve supported thousands of Indonesian students in securing placements at top global institutions.
            
            Now, as Nexus Education, we are renewing our brand to better reflect the next generation of students we serve, while maintaining the same trusted commitment to families, schools, and partners. We bring together deep experience with a modern approach to make global education more accessible, personal, and effective.',
            'link_maps'=>'https://maps.google.com/maps?width=600&height=400&hl=en&q=Ruko%20Beryl%202&t=&z=14&ie=UTF8&iwloc=B&output=embed',
        ]);
    }
}
