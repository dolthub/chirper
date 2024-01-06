<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\DB;

class setActiveBranch
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
	$active_branch = session('branch');

	$database = 'laravel';
	if ( $active_branch ) {
	   $database .= "/$active_branch";
	}

	config(['database.connections.mysql.database' => $database]);
	DB::purge('mysql');

        return $next($request);
    }
}
