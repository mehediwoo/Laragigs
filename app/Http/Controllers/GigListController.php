<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GigList;

class GigListController extends Controller
{

    //Create Gigs
    public function CrateGigs()
    {
        return view('create');
    }
    //Store Data from gigs
    public function Store(Request $request)
    {
        $validated = $request->validate([
            'company' => 'required|max:255',
            'title' => 'required|max:255',
            'location' => 'required|max:255',
            'email' => 'required|email',
            'website' => 'required|url',
            'tags' => 'required|min:10',
            'description' => 'required',
        ]);

        $user_id = $request->session()->get('user_id');

        $gigData = new GigList;

        $gigData->user_id = $user_id;
        $gigData->companyName = $request->input('company');
        $gigData->title = $request->input('title');
        $gigData->jobLocation = $request->input('location');
        $gigData->contactEmail = $request->input('email');
        $gigData->webURL = $request->input('website');
        $gigData->Tags = $request->input('tags');
        $gigData->JobDesc = $request->input('description');
        if ($request->hasFile('logo')) {
           $logo = $request->file('logo');
           $name = time();
           $ext  = $logo->extension();
           $fileName = $name.'.'.$ext;
           $logo->storeAs('/public/logo',$fileName);
           $gigData->logo = $fileName;
        }
        $gigData->save();
        return redirect('/')->with('msg','Gig Added Successfully');

    }
}
