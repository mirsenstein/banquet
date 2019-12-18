<?php

namespace App\Http\Controllers;

use App\Restaurant;
use App\Meal;
use App\Category;
use App\Drink;

use Illuminate\Http\Request;
use App\Http\Requests\RestaurantRequest;

class RestaurantsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $restaurants = Restaurant::paginate(10);
        return view('restaurants.index', compact('restaurants'));
    }

    
    public function create()
    {
        $restaurant = new Restaurant();
        return view('restaurants.create', compact('restaurant'));
    }

    
    public function store(RestaurantRequest $request)
    {
        
        $data = $request->validated();
        Restaurant::create($data);
        return redirect()->route('restaurants.index')
                        ->withMessage('Успешно добавен ресторант!');
    }

    
    public function show($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $categories = Category::all();
        $meals = Meal::where('restaurant_id', $id)->paginate(10);
        $drinks = Drink::where('restaurant_id', $id)->paginate(10);

        return view('restaurants.show', compact('restaurant', 'meals', 'categories', 'drinks'));
    }

    
    public function edit($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        return view('restaurants.edit', compact('restaurant'));
    }

    
    public function update(RestaurantRequest $request, $id)
    {
        $restaurant = Restaurant::find($id);
        $data = $request->validated();
        $restaurant->update($data);
        return redirect()->route('restaurants.index')
                ->withMessage('Ресторантът е променен успешно!');
    }

    
    public function destroy($id)
    {
        $deletedMeals = Meal::where('restaurant_id', $id)->delete();
        $deletedDrinks = Drink::where('restaurant_id', $id)->delete();
        $restaurant = Restaurant::find($id)->delete();
        return redirect()->route('restaurants.index')
                ->withMessage('Ресторантът и всички ястия и напитки към него бяха изтрити успешно!');
    }
}
