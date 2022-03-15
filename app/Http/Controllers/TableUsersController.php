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
        return view('datatable', ['users' => TableUsers::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('layout.modals');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $data = $request->validate([
            'name' => 'required|min:5|max:40',
            'position' => 'required|max:40',
            'office' => 'required|max:30',
            'age' => 'required|min:20|max:40'
        ]);

        dd($data);


        TableUsers::create($data);

        // todo : now create a tiny green swal on the top right that shows data added successfully with "name" mentioned
        return view('/users');
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
