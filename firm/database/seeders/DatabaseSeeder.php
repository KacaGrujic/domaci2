<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ReportType;
use App\Models\Company;
use App\Models\User;
use App\Models\Report;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        ReportType::truncate();
        User::truncate();
        Report::truncate();
	  Company::truncate();


        $user =User::factory()->create();

        $reporttype1 = ReportType::create([
            'type'=>"Profit and loss"
        ]);
        $reporttype2 = ReportType::create([
            'type'=>"Balance sheet"
        ]);
        $reporttype3 = ReportType::create([
            'type'=>"Equity stake"
        ]);

	  $company1 = Company::create([
            'name'=>"company1",
		'address'=>"random address 1",
		'contact'=>"jane doe"
        ]);
       $company2 = Company::create([
            'name'=>"company2",
		'address'=>"random address 2",
		'contact'=>"john doe"
        ]);
 	  $company3 = Company::create([
            'name'=>"company3",
		'address'=>"random address 3",
		'contact'=>"jane doe"
        ]);
        $report1 = Report::create([
            'reportname'=>'Third trimester balance sheet',
            'analysys'=>'profit + loss -',
            'companyid'=>$company1->companyid,
            'reporttypeid'=>$reporttype2->reporttypeid,
            'userid'=>$user->id
        ]);

    }
}
