<?php

namespace App\Http\Controllers;

use App\Area;
use App\Arl;
use App\BloodGroup;
use App\City;
use App\Country;
use App\Degrees;
use App\Department;
use App\DocumentType;
use App\Eps;
use App\Institution;
use App\Level;
use App\Neighborhood;
use App\Pension;
use App\SchoolHeadquarter;
use App\Sex;
use App\Status;
use App\Subject;
use App\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class SeedController extends Controller
{
    public function runCountries(){
        $countries = [
            [
                'name' => 'Colombia'
            ],
            [
                'name' => 'Mexico'
            ],
            [
                'name' => 'Brasil'
            ]
        ];
        Country::insert($countries);
    }
    public function runDepartments(){
        $department = [
            [
                'name' => 'Cundinamarca',
                'country_id' =>1
            ],
            [
                'name' => 'Antioquia',
                'country_id' =>1

            ],
            [
                'name' => 'Valle del cauca',
                'country_id' =>1

            ]
        ];
        Department::insert($department);
    }
    public function runCities(){
        $cities = [
            [
                'name' => 'Bogotá',
                'department_id' => 1
            ],
            [
                'name' => 'Medellín',
                'department_id' => 2
            ],
            [
                'name' => 'Cali',
                'department_id' => 3
            ]
        ];
        City::insert($cities);
    }

    public function runUsers(){
        $users = [
            [
                'names' => "Luis Fernando Raga Renteria",
                'email' => "lraga@schoolbook.com.co",
                'uid' => md5('lraga@schoolbook.com.co'),
                'document' => 1077444356,
                'remember_token' => Str::random(10),
                'password' => Hash::make(sha1("password"))

            ]
        ];

        User::insert($users);
    }

    public function runArl(){
        $arls = [
            [
                'name' => 'AXA COLPATRIA S.A.',
            ],
            [
                'name' => 'COLMENA SEGUROS',
            ],
            [
                'name' => 'COMPAÑÍA DE SEGUROS DE VIDA AURORA S.A.',
            ],
            [
                'name' => 'LA EQUIDAD SEGUROS DE VIDA',
            ],
            [
                'name' => 'LIBERTY SEGUROS DE VIDA S.A.',
            ],
            [
                'name' => 'MAPFRE SEGUROS',
            ],
            [
                'name' => 'POSITIVA',
            ],
            [
                'name' => 'SEGUROS BOLÍVAR S.A.',
            ],
            [
                'name' => 'SEGUROS DE VIDA ALFA S.A.',
            ],
            [
                'name' => 'SURATEP SA',
            ],
        ];

        Arl::insert($arls);
        // foreach ($arls as $key => $value) {
        //     Arl::create($arls[$key]);
        // }
    }

    public function runInstitutions(){
        $institutions = [
            [
                'name' => 'Colegio Rodolfo Llinas',
                'email' => 'admin@rodolfollinas.com.co'
            ],
            [
                'name' => 'Domingo Savio',
                'email' => 'admin@domingosavio.com.co'
            ],
            [
                'name' => 'Normal',
                'email' => 'admin@normal.com.co'
            ],
        ];

        Institution::insert($institutions);
    }

    public function runSchoolHeadquarter(){
        $schoolHeadquarters= [
            [
                'code' => 'LLinas Sede A',
                'institution_id' => 1
            ]
        ];

        SchoolHeadquarter::insert($schoolHeadquarters);
    }

    public function runDocumentType(){
        $documentTypes = [
            [
                'name' => 'TARJETA DE IDENTIDAD',
            ],
            [
                'name' => 'CÉDULA DE CIUDADANÍA',
            ],
            [
                'name' => 'REGISTRO CIVIL',
            ],
            [
                'name' => 'NACIDO VIVO',
            ],
            [
                'name' => 'PASAPORTE',
            ],
            [
                'name' => 'CÉDULA DE EXTRANJERÍA',
            ],
        ];
        DocumentType::insert($documentTypes);
        
    }

    public function runBloodGroups(){
        $bloodGroups = [
            '0-',
            '0+',
            'A−',
            'A+',
            'B−',
            'B+',
            'AB−',
            'AB+',
        ];

        foreach ($bloodGroups as $key => $value) {
            BloodGroup::create([
                'name' => $value,
            ]);
        }
    }
    public function runEps(){
        $eps = [
            [
                'name' => 'AMBUQ',
            ],
            [
                'name' => 'CAJACOPI',
            ],
            [
                'name' => 'COMFACOR',
            ],
            [
                'name' => 'COMFASUCRE',
            ],
            [
                'name' => 'COMPARTA',
            ],
            [
                'name' => 'COOSALUD',
            ],
            [
                'name' => 'EMDISALUD',
            ],
            [
                'name' => 'MUTUAL SER',
            ],
            [
                'name' => 'NUEVA EPS SUBSIDIADA',
            ],
            [
                'name' => 'NUEVA EPS CONTRIBUTIVO',
            ],
            [
                'name' => 'SALUDVIDA',
            ],
            [
                'name' => 'CAFESALUD',
            ],
            [
                'name' => 'COOMEVA',
            ],
            [
                'name' => 'SALUD TOTAL',
            ],
            [
                'name' => 'EPS SANITAS',
            ],
        ];

        Eps::insert($eps);
    }

    public function runSexes(){
        $sexes = [
            [
                'name' => 'Masculino'
            ],
            [
                'name' => 'Femenino'
            ],
        ];
        
        Sex::insert($sexes);

    }

    public function runSubjects(){
        $subjects = [
            [
                'name' => 'Matematicas'
            ],
            [
                'name' => 'Física'
            ],
            [
                'name' => 'Informatica'
            ],
            [
                'name' => 'Biologia'
            ],
            [
                'name' => 'Religión'
            ],
            [
                'name' => 'Español'
            ],
            [
                'name' => 'Artes'
            ],
            [
                'name' => 'Música'
            ],
           
        ];
        
        Subject::insert($subjects);
    }
    public function runAreas(){
        $subjects = [
            [
                'name' => 'Ciencias'
            ],
        ];
        
        Area::insert($subjects);
    }
    
    public function runNeighborhoods(){
        $neighborhoods = [
            ['name' => 'Margaritas'],
            ['name' => 'Alamos'],
            ['name' => 'Tintal'],
            ['name' => 'Kennedy'],
            ['name' => 'Alfonso Lopez'],
        ];

        Neighborhood::insert($neighborhoods);
    }
    public function runPensions(){
        $pensions = [
            ['name' => 'Porvenir', 'description' => 'Porvenir'],
            ['name' => 'Colpensiones', 'description' => 'Colpensiones'],
            ['name' => 'Sura', 'description' => 'Sura'],
        ];

        Pension::insert($pensions);
    }

    

    public function runConfiInit(){
        Artisan::call('passport:install');
        $a = Level::create([
            'name' => 'A'
        ]);
        $b = Level::create([
            'name' => 'B'
        ]);

        Degrees::create([
            'name' => 6,
            'level_id' => $a->id
        ]);
        Degrees::create([
            'name' => 6,
            'level_id' => $b->id
        ]);

        Degrees::create([
            'name' => 7,
            'level_id' => $a->id
        ]);
        Degrees::create([
            'name' => 7,
            'level_id' => $b->id
        ]);

        Degrees::create([
            'name' => 8,
            'level_id' => $a->id
        ]);
        Degrees::create([
            'name' => 8,
            'level_id' => $b->id
        ]);

        Status::create([
            'name' => 'En curso',
            'type' => 'student_degree'
        ]);
        Status::create([
            'name' => 'Aprobado',
            'type' => 'student_degree'
        ]);
        Status::create([
            'name' => 'Reprobado',
            'type' => 'student_degree'
        ]);
    }

    
}
