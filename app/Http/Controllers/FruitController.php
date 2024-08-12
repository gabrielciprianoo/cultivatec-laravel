<?php

namespace App\Http\Controllers;


use App\Models\Fruit;
use App\Models\Standard;
use Illuminate\Http\Request;
use App\Services\ImageService;
use App\Http\Requests\StoreFruitRequest;

class FruitController extends Controller
{

    protected $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fruits = Fruit::paginate(10);
        return view('fruits.index', [
            'fruits' => $fruits
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('fruits.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFruitRequest $request)
    {
        // Subir y redimensionar la imagen usando el servicio
        $imageName = $this->imageService->uploadAndResize($request->file('image'));

        // Guardar la fruta en la base de datos
        Fruit::create([
            'name' => $request->name,
            'image' => $imageName,
        ]);

        return redirect()->route('fruit.index')->with('message', 'Fruta creada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fruit $fruit)
    {
        // Obtener normas obligatorias nacionales
        $obligatorioNacional = Standard::where('fruit_id', $fruit->id)
            ->where('charter_id', 1)
            ->where('business_id', 1)
            ->get();

        // Obtener normas obligatorias internacionales
        $obligatorioInternacional = Standard::where('fruit_id', $fruit->id)
            ->where('charter_id', 1)
            ->where('business_id', 2)
            ->get();

        // Obtener normas no obligatorias nacionales
        $nObligatorioNacional = Standard::where('fruit_id', $fruit->id)
            ->where('charter_id', 2)
            ->where('business_id', 1)
            ->get();

        // Obtener normas no obligatorias internacionales
        $nObligatorioInternacional = Standard::where('fruit_id', $fruit->id)
            ->where('charter_id', 2)
            ->where('business_id', 2)
            ->get();

        return view('fruits.show', [
            'fruit' => $fruit,
            'obligatorioNacional' => $obligatorioNacional,
            'obligatorioInternacional' => $obligatorioInternacional,
            'nObligatorioNacional' => $nObligatorioNacional,
            'nObligatorioInternacional' => $nObligatorioInternacional,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fruit $fruit)
    {
        return view('fruits.edit', [
            'fruit' => $fruit
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fruit $fruit)
    {
        $request->validate([
            'name' => 'required|string|max:254',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,svg|max:2048',
        ]);

        $fruit->name = $request->name;

        // Procesar la imagen solo si el usuario subió una nueva
        if ($request->hasFile('image')) {
            // Eliminar la imagen anterior si existe
            $oldImagePath = public_path('uploads') . '/' . $fruit->image;
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Subir y redimensionar la nueva imagen
            $newImageName = $this->imageService->uploadAndResize($request->file('image'), 'uploads');

            // Actualizar el nombre de la imagen en el modelo
            $fruit->image = $newImageName;
        }

        // Guardar los cambios en la base de datos
        $fruit->save();

        // Redirigir a la vista de índice con un mensaje de éxito
        return redirect()->route('fruit.index')->with('message', 'Fruta actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fruit $fruit)
    {
        $fruit->delete();

        // Redirigir a la vista de índice con un mensaje de éxito
        return redirect()->route('fruit.index')->with('message', 'Fruta Eliminada exitosamente');
    }
}
