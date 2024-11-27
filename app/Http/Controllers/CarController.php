<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{

    public function __construct() {
        $this->middleware('auth:sanctum')->except('index', 'show','update');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10); // Default to 10 items per page
        return Car::paginate($perPage);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //this is to rename request parameter to fuelType
        $request->merge([
            'fuel-type' => $request->input('fuelType'),
            'body-type' => $request->input('bodyType'),
            'variant-t' => $request->input('variantT'),
        ]);

        $fields = $request -> validate([
            "type" => 'required',
            "make" => 'required', 
            "model" => 'required',
            "year" => 'required',
            "fuel-type" => 'required',
            "body-type" => 'required',
            "variant-t" => 'required',
            "image" => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            
            // Retrieve the uploaded image file
            $file = $request->file('image');
            $filePath = $file->store('images', 'public'); // Stored in `storage/app/public/images`
            $fields['imagePath'] = $filePath;

        }

        $car = Car::create($fields);
        
        return response()->json($car, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        // dd($car);
        return $car;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        // dd($request->all());
        // this is to rename request parameter to fuelType
        $request->merge([
            'fuel-type' => $request->input('fuelType'),
            'body-type' => $request->input('bodyType'),
            'variant-t' => $request->input('variantT'),
        ]);

        $validated = $request->validate([
            'type' => 'string|max:255|nullable',
            'make' => 'string|max:255|nullable',
            'model' => 'string|max:255|nullable',
            'year' => 'integer|min:1900|max:' . date('Y') . '|nullable',
            'fuel-type' => 'string|max:50|nullable',
            'body-type' => 'string|max:50|nullable',
            'variant-t' => 'string|max:100|nullable',
        ]);

        $car->update($validated);

        return $car;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car -> delete();

        return ['message' => 'Car is deleted'];

        
    }

    public function uploadImage(Request $request, Car $car)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($car->imagePath && Storage::exists($car->imagePath)) {
            Storage::delete($car->imagePath);
        }

        $imagePath = $request->file('image')->store('images', 'public');
        $car->imagePath = $imagePath;


        $car->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Image uploaded successfully!',
            'image_path' => $imagePath,
        ]);
    }

}
