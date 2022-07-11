<?php

namespace Database\Seeders;
use App\Models\blood_type;
use App\Models\blood_type_relation;

use Illuminate\Database\Seeder;

class bloodType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        blood_type::truncate();

        $blood =  [
            [
              'blood_type' => 'O+',
            ],
            [
              'blood_type' => 'A+',
            ],
            [
              'blood_type' => 'O-',
            ],
            [
              'blood_type' => 'A-',
            ],
            [
                'blood_type' => 'B+',
            ],
            [
                'blood_type' => 'B-',
            ],
            [
                'blood_type' => 'AB+',
            ],
            [
                'blood_type' => 'AB-',
            ]

          ];

          blood_type::insert($blood);



        blood_type_relation::truncate();

        $bloodr =  [

            //O+
            [
                'blood_type_id' => '1',
                'giveto_blood_id' => '1',
            ],
            [
                'blood_type_id' => '1',
                'giveto_blood_id' => '2',
            ],
            [
                'blood_type_id' => '1',
                'giveto_blood_id' => '5',
            ],
            [
                'blood_type_id' => '1',
                'giveto_blood_id' => '7',
            ],

            //A+
            [
                'blood_type_id' => '2',
                'giveto_blood_id' => '2',
            ],
            [
                'blood_type_id' => '2',
                'giveto_blood_id' => '7',
            ],

            //O-
            [
                'blood_type_id' => '3',
                'giveto_blood_id' => '1',
            ],
            [
                'blood_type_id' => '3',
                'giveto_blood_id' => '2',
            ],
            [
                'blood_type_id' => '3',
                'giveto_blood_id' => '3',
            ],
            [
                'blood_type_id' => '3',
                'giveto_blood_id' => '4',
            ],
            [
                'blood_type_id' => '3',
                'giveto_blood_id' => '5',
            ],
            [
                'blood_type_id' => '3',
                'giveto_blood_id' => '6',
            ],
            [
                'blood_type_id' => '3',
                'giveto_blood_id' => '7',
            ],
            [
                'blood_type_id' => '3',
                'giveto_blood_id' => '8',
            ],

            //A-
            [
                'blood_type_id' => '4',
                'giveto_blood_id' => '2',
            ],
            [
                'blood_type_id' => '4',
                'giveto_blood_id' => '4',
            ],
            [
                'blood_type_id' => '4',
                'giveto_blood_id' => '7',
            ],
            [
                'blood_type_id' => '4',
                'giveto_blood_id' => '8',
            ],

            //B+
            [
                'blood_type_id' => '5',
                'giveto_blood_id' => '5',
            ],
            [
                'blood_type_id' => '5',
                'giveto_blood_id' => '7',
            ],

            //B-
            [
                'blood_type_id' => '6',
                'giveto_blood_id' => '5',
            ],
            [
                'blood_type_id' => '6',
                'giveto_blood_id' => '6',
            ],
            [
                'blood_type_id' => '6',
                'giveto_blood_id' => '7',
            ],
            [
                'blood_type_id' => '6',
                'giveto_blood_id' => '8',
            ],

            //AB+
            [
                'blood_type_id' => '7',
                'giveto_blood_id' => '7',
            ],

            //AB-
            [
                'blood_type_id' => '8',
                'giveto_blood_id' => '8',
            ],
            [
                'blood_type_id' => '8',
                'giveto_blood_id' => '7',
            ],

          ];

          blood_type_relation::insert($bloodr);

      }
}
