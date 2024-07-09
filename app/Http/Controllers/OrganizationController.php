<?php

namespace App\Http\Controllers;

use App\Models\Instructors;
use Illuminate\Http\Request;
use App\Models\Organizations;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class OrganizationController extends Controller
{
    public function myOrganizations()
    {
        $orgs = Organizations::where('owner', Session::get('user')['user_id'])->get();
        $data = [];
        foreach ($orgs as $org) {
            $instructors = Instructors::where('organization_id', $org->id)->get();
            array_push($data, [
                'org' => $org,
                'instructors' => $instructors
            ]);
        }

        return view('organization.myList')->with('orgDetails', $data);
    }


    public function createOrganization(Request $request)
    {
        Organizations::create([
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
            'owner' => Session::get('user')['user_id']
        ]);

        Session::flash('success', 'organization created');
        return redirect('/');
    }

    public function createOrganizationH()
    {
        return view('organization.create');
    }

    public function addInstructorToOrganization(Request $request)
    {
        if (Instructors::where('email', $request->email)->where('organization_id', $request->org_id)->exists()) {
            Session::flash('error', 'This Instructor already belongs to this organization');
            return redirect('/organization/list');
        }

        Instructors::create([
            'email' => $request->email,
            'organization_id' => $request->org_id,
            'accepted' => false
        ]);

        //send email to this instructor and have them accept to join
        Session::flash('success', 'Instructor has been invited to this organization');
        return redirect('/organization/list');
    }

    public function organization($id)
    {
        $org = Organizations::where('id', $id)->first();
        $instructors = Instructors::where('organization_id', $org->id)->get();
        $instructorsDetails = [];
        foreach ($instructors as $inst) {
            $account = null;
            if (User::where('email', $inst->email)->exists()) {
                $account = User::where('email', $inst->email)->first();
            }

            array_push($instructorsDetails, [
                'accepted' => $inst->accepted,
                'account' => $account,
                'email' => $inst->email
            ]);
        }

        return view('organization.overview')->with('details', [
            'organization' => $org,
            'instructors' => $instructorsDetails
        ]);
    }
}
