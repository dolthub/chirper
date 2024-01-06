<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

use Illuminate\Support\Facades\DB;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
	return view('branches.index', [
            'branches' => Branch::all(),
	    'active_branch' => DB::Select('select active_branch() as active'),
	    'session_branch' => session('branch')
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
    public function store(Request $request): RedirectResponse
    {
	$branch_name = $request->input('branch_name');

	DB::unprepared("call dolt_branch('$branch_name')");
	
        return redirect(route('branches.index'));
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
    public function update(Request $request, Branch $branch): RedirectResponse
    {
	$request->session()->put('branch', $branch->name);

        return redirect(route('branches.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branch $branch)
    {
        $branch_name = $branch->name;

        DB::unprepared("call dolt_branch('-D', '$branch_name')");

        return redirect(route('branches.index'));
    }
}
