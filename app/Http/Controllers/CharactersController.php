<?php

namespace App\Http\Controllers;

use App\Character;
use App\User;
use Illuminate\Http\Request;

class CharactersController extends Controller
{
    public function index()
    {
        $characters = Character::all();
        
        return view('characters.index')->with('characters', $characters);
    }
    
    public function show($slug)
    {
        $character = Character::with('users')->where('name', $slug)->firstOrFail();
        
        return view('characters.show')->with('character', $character);
    }
    
    public function battleAction(Request $request)
    {
        $characters = [];
        
        $characters[] = $request->get('my_character_id');
        $characters[] = $request->get('character_id');
    
        $user = User::find($request->get('user_id'));
    
        $pokemon = Character::whereIn('id', $characters)->get()->toArray();
        
        if ($pokemon[0]['experience'] > $pokemon[1]['experience']) {
            session()->flash('message', 'savaşı siz kazandınız');
    
            $user->experience -= 1;
            $user->save();
            
            auth()->user()->experience += 1;
            auth()->user()->save();
            
            return redirect()->back();
        }
        
        $user->experience += 1;
        $user->save();
        
        auth()->user()->experience -= 1;
        auth()->user()->save();
    
        session()->flash('message', 'savaşı kaybettiniz');
        return redirect()->back();
    }
}
