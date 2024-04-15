<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }


    public function add_recipe(Request $request)
    {
    $data=new Recipe;

        $data->name= $request->name;

        $data->description = $request->description;

        $image = $request->image;

        if ($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();

            $request->image->move('recipe',$imagename);

            $data->image=$imagename;
        }



        $data->save();
        return redirect()->back();

    }


    public function show_recipe()
    {
        $data = Recipe::all();

        return view('recipe',compact('data'));
    }

    public function delete_recipe($id)
    {
        $data =Recipe::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function update_recipe($id)
    {
        $recipe =Recipe::find($id);


        return view('update_recipe',compact('recipe'));
    }

    public function edit_recipe(Request $request,$id)
    {
    $data = Recipe::find($id);

    $data->name = $request->name;
    $data->description = $request->description;
    $image = $request->image;
    if ($image){
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('recipe',$imagename);
        $data->image = $imagename;
    }

    $data->save();
    return redirect()->back();
    }

    public function search(Request $request)
    {
        $query = $request->input('search');

        $recipes = Recipe::where('name', 'like', '%' . $query . '%')->get();

        return view('search', ['recipes' => $recipes, 'search' => $query]);
    }




}






