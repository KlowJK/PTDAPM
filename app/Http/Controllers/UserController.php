<?php

namespace App\Http\Controllers;

use App\Models\Authentication;
use App\Http\Requests\StoreAuthenticationRequest;
use App\Http\Requests\UpdateAuthenticationRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = Authentication::paginate(10);
        return view('users.index', compact('users'));
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
    public function store(StoreAuthenticationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Authentication $authentication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Authentication $authentication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAuthenticationRequest $request, Authentication $authentication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Authentication $authentication)
    {
        //
    }
}
