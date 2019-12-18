<?php

namespace App\Http\Controllers;

use App\Meal;
use App\Category;
use App\Restaurant;
use App\Drink;

use Illuminate\Http\Request;
use App\Http\Requests\MealRequest;


class MealsController extends Controller
{
    
    public function index()
    {
        $meals = Meal::paginate(10);
        return view('meals.index', compact('meals'));
    }

    public function create()
    {
        $meal = new Meal;
        $restaurants = Restaurant::all();
        $categories = Category::all();
        return view('meals.create', compact('meal', 'categories', 'restaurants'));
    }

    public function resto_meal($id)
    {
        $meal = new Meal;
        $restaurants = Restaurant::where('id', $id)->get();
        $categories = Category::all();
        $source = 'resto';

        return view('meals.create', compact('meal', 'categories', 'restaurants', 'source'));
    }

    public function category_meal($id)
    {
        $meal = new Meal;
        $restaurants = Restaurant::all();
        $categories = Category::where('id', $id)->get();;
        $source = 'category';

        return view('meals.create', compact('meal', 'categories', 'restaurants', 'source'));
    }

    public function store(MealRequest $request)
    {
        $data = $request->validated();
        Meal::create($data);

        if ($request->source == "resto") {
            return redirect()->route('restaurants.show', $request->restaurant_id)
                        ->withMessage('Успешно добавено ястие!');   
        }

        if ($request->source == "category") {
            return redirect()->route('categories.show', $request->category_id)
                        ->withMessage('Успешно добавено ястие!');   
        }
         
        return redirect()->route('meals.index')
                        ->withMessage('Успешно добавено ястие!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $meal = Meal::findOrFail($id);
        $restaurants = Restaurant::all();
        $categories = Category::all();
        return view('meals.edit', compact('meal', 'categories', 'restaurants'));
    }

    public function update(MealRequest $request, $id)
    {
        $meal = Meal::find($id);
        $data = $request->validated();
        $meal->update($data);
        return redirect()->route('meals.index')
                ->withMessage('Ястието е променено успешно!');
    }

    public function destroy($id)
    {
        $meal = Meal::find($id)->delete();

        return redirect()->route('meals.index')
                ->withMessage('Ястието беше изтрито успешно!');
    }
}
