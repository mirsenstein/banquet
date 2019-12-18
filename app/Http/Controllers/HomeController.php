<?php

namespace App\Http\Controllers;

use App\Meal;
use App\Category;
use App\Restaurant;
use App\Drink;
use App\Menu;
use App\MenuMeal;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home.home');
    }

    public function restaurants_index()
    {
        $restaurants = Restaurant::paginate(10);
        return view('home.restaurants_index', compact('restaurants'));
    }

    public function restaurant_show($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $categories = Category::all();
        $meals = Meal::where('restaurant_id', $id)->paginate(10);
        $drinks = Drink::where('restaurant_id', $id)->paginate(10);

        return view('home/restaurant_show', compact('restaurant', 'meals', 'categories', 'drinks'));
    }

    public function menu_input($id)
    {
        $restaurant = Restaurant::find($id);
        $categories_ids = Meal::where('restaurant_id', $id)->distinct()->pluck('category_id');
        $categories = Category::whereIn('id', $categories_ids)->get();
        return view('home.menu', compact('categories', 'restaurant'));
    }

    public function create_menu(Request $request)
    {
       $menu = Menu::create([
                    'user_id' => Auth::user()->id,
                    'people' => $request->people,
                    'budget' => $request->budget,
                    'restaurant_id' => $request->restaurant_id
                ]);
        // $this->check_prices($request, $menu);
       return $this->check_prices($request, $menu);
    }

    public function check_prices(Request $request, $menu)
    {
        $restaurant = Restaurant::find($request->restaurant_id);
        $meals = $restaurant->meals->collect();
        $categories = $request->category;
        $cheapest_menu_price = 0;
        foreach($categories as $category){
            $cheapest_meal_per_type = Meal::where('category_id', $category)
                    ->where('restaurant_id', $restaurant->id)
                    ->min('price');
            $cheapest_menu_price = $cheapest_menu_price + $cheapest_meal_per_type;
        }

        $price_per_person = $request->budget / $request->people;


        if ($price_per_person > $cheapest_menu_price) {
            return $this->show_options($request, $meals);
        } else {
           
           return redirect()->route('home.restos')
           ->withMessage('Съжаляваме, но в ресторант "'.$restaurant->name.'" няма меню, подходящо за вашия бюджет! Най-евтиното меню струва '.$cheapest_menu_price . 'лв. на човек.');  
        }
    }

    public function show_options($request, $meals)
    {
        $price_per_person = $request->budget / $request->people;
        $restaurant = Restaurant::find($request->restaurant_id);
        $menu_price = 0;
            do{
                $one_meal_per_cat = [];
                $categories = $request->category;
                foreach($categories as $category){
                    $meals_in_cat = $meals->where('category_id', $category)->all();
                    $meal = Arr::random($meals_in_cat);
                    array_push($one_meal_per_cat, $meal);
                }

                $current_meals = collect($one_meal_per_cat);
                foreach ($current_meals as $meal) {
                    $menu_price = $menu_price + $meal->price;
                }

            }while($price_per_person < $menu_price);
            
            $current_menu_price = $current_meals->sum('price');
            $total = $current_menu_price * $request->people;
            // return redirect()->route('home.home');
            return view('home.menu_options', compact('current_menu_price', 'restaurant', 'current_meals', 'total'));
    }

    public function store_meals(Request $request)
    {
        foreach($meals as $meal){
            MenuMeal::create([
                'menu_id' => $menu->id,
                'meal_id' => $meal->id
            ]);

        }
    }
}
