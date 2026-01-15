<?php

namespace App\Http\Controllers;

use carbon\Carbon;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function create(){
        return view('category.tambah');
    }

    public function store(request $request){
        // validations
        $request->validate([
        'name' => 'required|min:5',
        'description' => 'required',
        ],
        [
            'required' => 'inputan :attribute harus di isi',
            'min' => 'inputan minimal :min karakter'

        ]);

        $now  = Carbon::now();

        // instert data 
        DB::table('categories')->insert([
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        'created_at' => $now,
        'updated_at' => $now,

        ]);

        // rederict

        return redirect('/category')->with('success', 'Category has Added');
    }

    public function index(){
        $categories = DB::table('categories')->get();
       
        return view('category.tampil', ['categories' => $categories]);
    }
    public function show($id){
        $category = Category::find($id);

        return view('category.detail', ['category' => $category]);

    }
    
        //   update
    public function edit($id){
        $category = DB::table('categories')->find($id);

        
        return view('category.edit', ['category' => $category]);
    }

     
    public function update($id, Request $request){
        // validations
        $request->validate([
        'name' => 'required|min:5',
        'description' => 'required',
        ],
        [
            'required' => 'inputan :attribute harus di isi',
            'min' => 'inputan minimal :min karakter'
        ]);
          $now  = Carbon::now();

       

        DB::table('categories')
    ->where('id', $id)
    ->update(
        [
                'name' => $request->input('name'), 
                'description' => $request->input('description'),
                'updated_at' => $now
        ]
        );

        return redirect('/category')->with('success', 'Category Berhasil diubah!');
    }

    public function destroy($id){
        DB::table('categories')->where('id', $id)->delete();    
        return redirect('/category')->with('success', 'Category Berhasil dihapus!');
    }
}
