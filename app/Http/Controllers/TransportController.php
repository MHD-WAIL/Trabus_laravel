<?php

namespace App\Http\Controllers;

use App\Models\TranasportContext;
use App\Http\Requests\StoreTranasportContextRequest;
use App\Http\Requests\UpdateTranasportContextRequest;
use Illuminate\Http\Request;

abstract class TransportController extends Controller
{


    abstract public function cut_amount(Request $request);


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param \App\Http\Requests\StoreTranasportContextRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTranasportContextRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\TranasportContext $transportContext
     * @return \Illuminate\Http\Response
     */
    public function show(TranasportContext $transportContext)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\TranasportContext $transportContext
     * @return \Illuminate\Http\Response
     */
    public function edit(TranasportContext $transportContext)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateTranasportContextRequest $request
     * @param \App\Models\TranasportContext $transportContext
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTranasportContextRequest $request, TranasportContext $transportContext)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\TranasportContext $transportContext
     * @return \Illuminate\Http\Response
     */
    public function destroy(TranasportContext $transportContext)
    {
        //

    }


}

