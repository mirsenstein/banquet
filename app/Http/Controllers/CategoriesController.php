<?php

namespace App\Http\Controllers;

use App\Meal;
use App\Category;
use App\Restaurant;
use App\Drink;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;


class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::paginate(10);
        return view('categories.index', compact('categories'));
    }

   
    public function create()
    {
        return view('categories.create');
    }

    
    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        Category::create($data);
        return redirect()->route('categories.index')
                        ->withMessage('Успешно добавена категория!');
    }

    
    public function show($id)
    {
        $category = Category::findOrFail($id);
        $restaurants = Restaurant::all();
        $meals = Meal::where('category_id', $id)->paginate(10);

        return view('categories.show', compact('restaurants', 'meals', 'category'));
    }

    
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    
    public function update(CategoryRequest $request, $id)
    {
        $category = Category::find($id);
        $data = $request->validated();
        $category->update($data);
        return redirect()->route('categories.index')
                ->withMessage('Категорията е променена успешно!');
    }

    
    public function destroy($id)
    {
        
        $deletedMeals = Meal::where('category_id', $id)->delete();
        $category = Category::find($id)->delete();
        return redirect()->route('categories.index')
                ->withMessage('Категорията и всички ястия в нея бяха изтрити успешно!');
    }
}
