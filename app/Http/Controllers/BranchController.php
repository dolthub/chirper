<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Http\Response; 
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Config;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
	return view('branches.index', [
            'branches' => Branch::all(),
	    'active_branch' => DB::Select('select active_branch() as active')
        ]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Branch $branch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    //public function update(Request $request, Branch $branch): RedirectResponse
    public function update(Request $request, Branch $branch): Response
    {
        Config::Set(['database.connections' => [
	    'driver' => 'mysql',
            "host" => "localhost",
            "database" => "laravel" . '/' . $branch->name,
            "username" => "root",
            "password" => "",
            "port" => '3306',
            'charset'   => '',
            'collation' => '',
            'prefix'    => '',
            'strict'    => false
	    ]]);

	 $active_branch = DB::Select('select active_branch() as active')[0]->active;

	return response($active_branch);

        //return redirect(route('branches.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branch $branch)
    {
        //
    }

}
