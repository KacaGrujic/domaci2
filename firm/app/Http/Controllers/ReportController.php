<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReportCollection;
use App\Http\Resources\ReportResource;
use App\Models\Company;
use App\Models\ReportType;
use App\Models\Report;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $report = Report::all();
        return new ReportCollection($report);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [

            'reportname' => 'required',
            'analysys' => 'required',
            'companyid' => 'required',
            'reporttypeid' => 'required'
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        $report = Report::create([
            'reportname' => $request->reportname,
            'analysys' => $request->analysys,
            'companyid' => $request->companyid,
           // 'user_id' => Auth::user()->id,
            'reporttypeid' => $request->reporttypeid

        ]);


        return response()->json('Dodali ste izvestaj.');
    }



    public function updateById(Request $request, int $reportid)
    {
        
        $report = Report::find($reportid);
        $report->reportname = $request->reportname;
        $report->address = $request->address;
        $report->companyid = $request->companyid;
        $report->reporttypeid = $request->reporttypeid;

        $report->save();

        return response()->json(['Izvestaj je azuriran!', new ReportResource($report)]);
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(int $reportid)
    {
        //
        $report = Report::findOrFail($reportid);
        $report->delete();

        return response()->json(['Obrisali ste izvestaj']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }
}
