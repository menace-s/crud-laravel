<?php

namespace App\Http\Controllers;
use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index(){
        $animals = Animal::all();
        return view('animals.index', compact('animals'));
    }

    public function create(){
        return view('animals.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'owner_name' => 'required|string|max:255',
            'health_status' => 'required|in:sain,malade,blessé',
        ]);

        Animal::create($request->all());

        return redirect()->route('animals.index')->with('success', 'Animal ajouté avec succès.');
    
    }

    public function edit(Animal $animal){
        return view('animals.edit', compact('animal'));
    }

    public function update(Request $request, Animal $animal){
        $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'owner_name' => 'required|string|max:255',
            'health_status' => 'required|in:sain,malade,blessé',
        ]);

        $animal->update($request->all());

        return redirect()->route('animals.index')->with('success', 'Animal mis à jour avec succès.');
    
    }
    public function show(Animal $animal)
    {
        return view('animals.show', compact('animal'));
    }
    
    public function destroy(Animal $animal){
        $animal->delete();
        return redirect()->route('animals.index')->with('success', 'Animal supprimé avec succès.');
    }

}
