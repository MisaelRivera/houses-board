<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Listing;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listings = Listing::all();
        return Inertia::render('Listing/Index', [
            'listings' => $listings
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Listing::class);
        return Inertia::render('Listing/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedListing = $request->validate([
            'beds' => 'required|numeric',
            'baths' => 'required|numeric',
            'area' => 'required|numeric',
            'city' => 'required',
            'street' => 'required',
            'code' => 'required',
            'street_nr' => 'required',
            'price' => 'required|numeric'
        ]);

        $currentLoggedUser = Auth::user();
        $newListing = $currentLoggedUser->listings()->create($validatedListing);
        return redirect()
            ->route('listing.index')
            ->with('message', "The listing in $newListing->street");
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        return Inertia::render('Listing/Show', [
            'listing' => $listing
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        Gate::authorize('update', $listing);
        return Inertia::render('Listing/Edit', [
            'listing' => $listing
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Listing $listing)
    {
        Gate::authorize('update', $listing);
        $validatedListing = $request->validate([
            'beds' => 'required|numeric',
            'baths' => 'required|numeric',
            'area' => 'required|numeric',
            'city' => 'required',
            'street' => 'required',
            'code' => 'required',
            'street_nr' => 'required',
            'price' => 'required|numeric'
        ]);

        $listing->beds = $validatedListing['beds'];
        $listing->baths = $validatedListing['baths'];
        $listing->area = $validatedListing['area'];
        $listing->city = $validatedListing['city'];
        $listing->street = $validatedListing['street'];
        $listing->code = $validatedListing['code'];
        $listing->street_nr = $validatedListing['street_nr'];
        $listing->price = $validatedListing['price'];

        $listing->save();

        return redirect()
            ->route('listing.index')
            ->with('message', "The listing has been edited correctly");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        Gate::authorize('forceDelete', $listing);
        $listingCity = $listing->city;
        $listing->delete();
        return redirect()
            ->route('listing.index')
            ->with('message', "The listing in $listingCity has been deleted successfully!");
    }
}
