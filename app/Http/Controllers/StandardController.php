<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Charter;
use App\Models\Fruit;
use App\Models\Standard;
use Illuminate\Http\Request;

class StandardController extends Controller
{

   
    public function index(Fruit $fruit)
    {
        $standards = Standard::where('fruit_id', $fruit->id)->paginate(10);
        return view('standards.index', [
            'fruit' => $fruit,
            'standards' => $standards

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Fruit $fruit)
    {
        $charters = Charter::all();
        $businesses = Business::all();

        return view('standards.create', [
            'businesses' => $businesses,
            'characters' => $charters,
            'fruit' => $fruit
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Fruit $fruit)
    {
        // Validación
        $validated = $request->validate([
            'short_name' => 'required|string|max:255',
            'long_name' => 'required|string|max:255',
            'content' => 'required|string',
            'link' => 'required|url',
            'charter_id' => 'required|exists:charters,id',
            'business_id' => 'required|exists:businesses,id',
        ]);

        // Crear una nueva norma
        $standard = new Standard();
        $standard->short_name = $validated['short_name'];
        $standard->long_name = $validated['long_name'];
        $standard->content = $validated['content'];
        $standard->link = $validated['link'];
        $standard->charter_id = $validated['charter_id'];
        $standard->business_id = $validated['business_id'];
        $standard->fruit_id = $fruit->id;
        $standard->save();

        // Redirigir con un mensaje de éxito
        return redirect()->route('standards.index', $fruit)->with('message', 'Norma agregada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Standard $standard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fruit $fruit, Standard $standard)
    {
        $charters = Charter::all();
        $businesses = Business::all();
        return view('standards.edit', [
            'standard' => $standard,
            'fruit' => $fruit,
            'businesses' => $businesses,
            'characters' => $charters,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fruit $fruit, Standard $standard)
    {
        // Validar la entrada
        $validated = $request->validate([
            'short_name' => 'required|string|max:255',
            'long_name' => 'required|string|max:255',
            'content' => 'required|string',
            'link' => 'nullable|url',
            'charter_id' => 'required|exists:charters,id',
            'business_id' => 'required|exists:businesses,id',
        ]);

        // Actualizar el estándar con los datos validados
        $standard->short_name = $validated['short_name'];
        $standard->long_name = $validated['long_name'];
        $standard->content = $validated['content'];
        $standard->link = $validated['link'];
        $standard->charter_id = $validated['charter_id'];
        $standard->business_id = $validated['business_id'];

        // Guardar los cambios en la base de datos
        $standard->save();

        // Redirigir al índice de normas con un mensaje de éxito
        return redirect()->route('standards.index', $fruit)->with('message', 'Norma actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Standard $standard, Fruit $fruit)
    {
       $standard->delete();
       return redirect()->route('standards.index', $fruit)->with('message', 'Norma eliminada exitosamente');
   
    }
}
