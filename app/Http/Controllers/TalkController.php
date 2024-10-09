<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Talk;
use App\Models\User;

class TalkController extends Controller
{
    public function index()
    {
        // Get talks with comments, ordered by the latest ones
        $talks = Talk::with('comments')->orderBy('created_at', 'desc')->get();
        return view('pages.home', compact('talks'));
    }
    
    public function create()
    {
        return view('pages.create');
    }
 
    public function save(Request $request)
    {
        $validation = $request->validate([
            'value' => 'required',
            'user_id' => 'required',
        ]);
        $data = Talk::create($validation);
        if ($data) {
            session()->flash('success', 'Talks successfully created');
            return redirect()->route('home');
        } else {
            session()->flash('error', 'Some problem occure');
            return redirect()->route('home');
        }
    }
    public function myTalks()
    {
        $user = Auth::user();
        // Get talks by the authenticated user, ordered by the latest ones
        $talks = Talk::where('user_id', $user->id)
        ->with('comments')
        ->orderBy('created_at', 'desc')
        ->get();

        return view('pages.mytalks', compact('talks'));
    }

 
    public function delete($id)
    {
        $talks = Talk::findOrFail($id)->delete();
        if ($talks) {
            session()->flash('success', 'Talks Deleted Successfully');
            return redirect()->route('mytalks');
        } else {
            session()->flash('error', 'Talks Not Delete successfully');
            return redirect()->route('mytalks');
        }
    }
 
}
