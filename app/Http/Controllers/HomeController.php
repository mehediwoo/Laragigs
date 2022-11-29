<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GigList;

class HomeController extends Controller
{
    public function Home()
    {
        $AllGigs = GigList::orderBy('id', 'DESC')->paginate(6);
        return view('home', compact('AllGigs'));
    }

    //ViewGigs
    public function ViewGigs($id)
    {
        $viewGigs = GigList::find($id);
        return view('view', compact('viewGigs'));
    }
    //search
    public function search(Request $request)
    {
        $search = $request->input('search');
        $Getsearch = GigList::where('title','LIKE','%'.$search."%")
        ->orWhere('companyName','LIKE','%'.$search."%")
        ->orWhere('jobLocation','LIKE','%'.$search."%")
        ->orWhere('Tags','LIKE','%'.$search."%")
        ->orWhere('JobDesc','LIKE','%'.$search."%")
        ->get();

        return view('search',compact('Getsearch'));
    }

    //Manage Gig
    public function Manage(Request $request)
    {
        $user_id = $request->session()->get('user_id');
        $ManageGig = GigList::orderBy('id','DESC')->where('user_id',$user_id)->get();
        return view('manage', compact('ManageGig'));
    }
    //Delete Gig
    public function DeleteGig($id)
    {
        $delete = GigList::find($id);
        $delete->delete();
        return redirect()->back()->with('msg','Gig Delete successfully');
    }
    //EditGigView
    public function EditGigView($id)
    {
        $getGig = GigList::find($id);
        return view('gigView',compact('getGig'));
    }
    //View Gig
    public function ViewGig()
    {
        return view('gigView');
    }
    //Update Gig
    public function Update(Request $request, $id)
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

        $gigData = GigList::find($id);

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
        $gigData->update();
        return redirect('/manage')->with('msg','Gig Updated Successfully');
    }
}
