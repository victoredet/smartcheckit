<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organizations;
use Illuminate\Support\Facades\Session;

class OrganizationController extends Controller
{
    public function index()
    {
        //
    }

    public function createOrganization(Request $request)
    {
        Organizations::create([
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
            'owner' => Session::get('user')['user_id']
        ]);
        return redirect('/');
    }

    public function createOrganizationH()
    {
        return view('organization.create');
    }

    public function store(Request $request)
    {
        //
    }
    public function show(string $id)
    {
        //
    }
    public function edit(string $id)
    {
        //
    }
    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
