<?php

namespace App\Http\Controllers;

use App\Models\TableUsers;
use Illuminate\Http\Request;

class TableUsersController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('books', ['users' => TableUsers::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        // return view('layout.modals');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        // dd($request->all());

        $data = $request->validate([
            'name' => 'required|min:6|max::60',
            'position' => 'required|min:5|max:100',
            'office' => 'required|min:5|max:50',
            'age' => 'required'
        ]);

        // dd($data);
        // TableUsers::create($request->all());
        TableUsers::create($data);
        return redirect('/users')->with('message', 'new user created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\TableUsers $tableUsers
     * @return \Illuminate\Http\Response
     */
    public function show(TableUsers $tableUsers) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\TableUsers $tableUsers
     * @return \Illuminate\Http\Response
     */
    public function edit(TableUsers $tableUsers) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TableUsers $tableUsers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TableUsers $tableUsers) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\TableUsers $tableUsers
     * @return \Illuminate\Http\Response
     */
    public function destroy(TableUsers $tableUsers) {
        //
    }
}
