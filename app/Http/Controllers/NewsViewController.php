<?php

namespace App\Http\Controllers;

use App\Models\NewsView;
use App\Http\Requests\StoreNewsViewRequest;
use App\Http\Requests\UpdateNewsViewRequest;

class NewsViewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewsViewRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(NewsView $newsView)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NewsView $newsView)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewsViewRequest $request, NewsView $newsView)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewsView $newsView)
    {
        //
    }
}
