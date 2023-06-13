<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{   
    // Show All Listings
    public function index() {
        // dd(request()->tag);
        return view('listings/index ',[
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
    ]);
}

// Show Single Listing
public function show(Listing $listing) {
    return view ('listings/show', [
        'listing' => $listing
    ]);
}
// Loads the create form
    public function create() {
        return view('listings.create');
        }

// Storing new gigs into the db
    public function store(Request $request) {

        $formValues = $request->validate([
            "title" => 'required',
            "company" => ['required', Rule::unique('listings', 'company')],
            "description" => "required",
            "locations" => "required",
            "email" => ["required","email"],
            "website" => "required",
            "tags" => "required",

        ]);

        // Check if the request has an image and storing it to a new folder logos
        if($request->hasFile('logo')) {
            $formValues['logo'] = $request->file('logo')->store('logos', 'public');
        }
        Listing::create($formValues);
        return redirect('/')->with('message', 'Listing was successfully created');
    }
}
