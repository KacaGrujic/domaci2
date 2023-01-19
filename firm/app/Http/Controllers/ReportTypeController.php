<?php

namespace App\Http\Controllers;

use App\Models\ReportType;
use Illuminate\Http\Request;


class ReportTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reporttype = ReportType::all();
        return $reporttype;
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReportType  $reportType
     * @return \Illuminate\Http\Response
     */
    public function show(ReportType $reporttype){
        return new ReportTypeResource($reporttype);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReportType  $reportType
     * @return \Illuminate\Http\Response
     */
    public function edit(ReportType $reportType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReportType  $reportType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReportType $reportType)
    {
        //
    }
    public function getById($reporttypeid)
    {
        $reporttype = ReportType::findOrFail($reporttypeid);

        return new ReportTypeResource($reporttype);

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReportType  $reportType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReportType $reportType)
    {
        //
    }
}
