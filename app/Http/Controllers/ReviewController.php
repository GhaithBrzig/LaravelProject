<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;


class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::all();
        return view('backoffice.review.index',compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reviews = Review::all();
        return view('frontoffice.reviews.create', compact('reviews'));    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        $reviews = Review::all();

        $request->validate([
            'rating' => 'required',
            'comment' => 'required',
        ]);

        $review = new Review();
        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $user_id = auth()->user()->id;
        $review->reviewer= $user_id;


        ;
        $review->reviewedUser=2;
        $review->save();
        return view('frontoffice.reviews.create', compact('reviews'));

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $review = Review::findOrFail($id);
        return view('frontoffice.reviews.create', compact('review'));    }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {

    // $request->validate([
    //     'comment' => 'required',
    // ]);


    //     $review = Review::findOrFail($id);

    //     $review->comment = $request->comment;
    //     $review->save();
    //     return redirect()->back();



    // }

     /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Review  $service
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Review $review)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required',
        //     'address' => 'required',
        // ]);

        $review->fill($request->post())->save();

        return redirect()->route('reviews.create');    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $review= Review::findOrFail($id);

        $review->delete();
        return redirect()->back();

    }
}
