<?php

namespace App\Http\Controllers;

use App\Models\BusinessCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusinessCardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'showProfile', 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return BusinessCard::where('user_id', $user->id)->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'alias' => 'required',
            'linkedin_url' => 'required',
            'github_url' => 'required',
        ]);

        $userId = Auth::id();

        $businessCard = BusinessCard::where('user_id', $userId)->first();

        if (!$businessCard) {
            $businessCard = new BusinessCard();
            $businessCard->user_id = $userId;
        }

        $businessCard->alias = $request->alias;
        $businessCard->linkedin_url = $request->linkedin_url;
        $businessCard->github_url = $request->github_url;

        $businessCard->save();

        return $businessCard;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $businessCard = BusinessCard::findOrFail($id);

        return $businessCard;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $businessCard = BusinessCard::findOrFail($id);

        if (Auth::id() !== $businessCard->user_id) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $businessCard->update($request->all());

        return $businessCard;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $businessCard = BusinessCard::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $businessCard->delete();

        return response()->json(['message' => 'Cartão excluído com sucesso.']);
    }

    public function showProfile($id)
    {
        $businessCard = BusinessCard::findOrFail($id);
        return view('profile', ['businessCard' => $businessCard]);
    }
}
