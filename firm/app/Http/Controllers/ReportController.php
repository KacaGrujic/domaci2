<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReportResource;
use App\Http\Resources\ReportCollection;
use App\Models\Report;
use App\Models\ReportType;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $report = Report::all();
        return new ReportCollection($report);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'reportname'=>'required',
            'analysys'=>'required',
            'companyid'=>'required',
            'reporttypeid'=>'required'
        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors());
        }

        $requestReport = $request->only('reportname', 'analysys', 'companyid', 'reporttypeid');
        $report = Report::create($requestReport);

      //  $newReport = Report::find($newReport->id);
      //  return response()->json(new ReportResource($newReport), 200);

        // $requestReport = $request->only('reportname', 'analysys', 'companyid', 'reporttypeid');
        return response()->json(['Izvestaj je kreiran!', new ReportResource($report)]);


        // $report = Report::create($requestReport);

         
    }

    public function getById($id)
    {
        $report = Report::findOrFail($id);

        return new ReportResource($report);

    }

    public function show(Report $report){
        return new ReportResource($report);
    }

    public function delete($id)
    {
        $report = Report::destroy($id);

        return response()->json('Izvestaj je uspesno obrisan');

    }


    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function updateById(Request $request, int $id)
    {
        //
        $report = Report::find($id);
        $report->reportname = $request->reportname;
        $report->analysys = $request->analysys;
        $report->companyid = $request->companyid;
        $report->reporttypeid = $request->reporttypeid;

        $report->save();

        return response()->json(['Izvestaj je azuriran', new ReportResource($report)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        //
        $report = Report::findOrFail($id);
        $report->delete();

        return response()->json(['Obrisali ste izvestaj']);
    }

    public function reportbytype(int $id)
    {

        $report = Report::get()->where('reporttypeid', $id);
        if (is_null($report)) {
            return response()->json("Nema izvestaja ovog tipa");
        }
        return response()->json($report->pluck('reportname'));
    }

    public function reportbycompany(int $id)
    {

        $report = Report::get()->where('companyid', $id);
        if (is_null($report)) {
            return response()->json("Nema izvestaja za ovu kompaniju");
        }
        return response()->json($report->pluck('reportname'));
    }

    // private function companiesReport($id, $request)
    // {

    //     $company = $request->companies;
    //         $data = [
    //             'name' => $company['name'],
    //             'address' => $company['address'],
    //             'contact' => $company['contact'],
	// 	        'email' => $company['email']
    //         ];

    //         Company::create($data);
        
    // }
    // private function reportstype($id, $request)
    // {
    //     $type = $request->reporttypes;
    //     foreach ($type as $t) {
    //         $data = [
    //             'id' => $t['reporttypeid'],
    //             'type' => $t['type']
    //         ];

    //         ReportType::create($t);
    //     }
    // }


}

