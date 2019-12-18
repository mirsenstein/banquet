<?php

namespace App\Http\Controllers;

use App\Drink;
use App\Restaurant;

use Illuminate\Http\Request;
use App\Http\Requests\DrinkRequest;


class DrinksController extends Controller
{
    
    public function index()
    {
        $drinks = Drink::paginate(10);

        return view('drinks.index', compact('drinks'));
    }

    public function create()
    {
        $drink = new Drink;
        $restaurants = Restaurant::all();

        return view('drinks.create', compact('drink', 'restaurants'));
    }

    public function create_with_resto($id)
    {
        dd('neshto');
        $drink = new Drink;
        $restaurants = Restaurant::find($id)->get();
        dd('mm');
        return view('drinks.create', compact('drink', 'restaurants'));
    }

    public function store(DrinkRequest $request)
    {
        $data = $request->validated();
        Drink::create($data);

        return redirect()->route('drinks.index')
                        ->withMessage('Успешно добавена напитка!');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $drink = Drink::findOrFail($id);
        $restaurants = Restaurant::all();
        $categories = Category::all();

        return view('drinks.edit', compact('drink', 'restaurants'));
    }

    public function update(DrinkRequest $request, $id)
    {
        $drink = Drink::find($id);
        $data = $request->validated();
        $drink->update($data);

        return redirect()->route('drinks.index')
                ->withMessage('Напитката е променена успешно!');
    }

    public function destroy($id)
    {
        $drink = Drink::find($id)->delete();

        return redirect()->route('drinks.index')
                ->withMessage('Напитката беше изтрита успешно!');
    }
}
