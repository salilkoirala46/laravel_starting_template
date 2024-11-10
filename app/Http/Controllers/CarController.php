<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{

    public function __construct() {
        $this->middleware('auth:sanctum')->except('index');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Car::all();
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
        return $car;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        $fields = $request -> validate([
            "type" => 'required',
            "make" => 'required', 
            "model" => 'required',
            "year" => 'required',
            "fuel-type" => 'required',
            "body-type" => 'required',
            "variant-t" => 'required',
            "imagePath" => 'required'
        ]);

        $car -> update($fields);

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
}
