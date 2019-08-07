<?php

use Illuminate\Http\Request;

use App\Product;

Route::middleware('auth')->group(function(){

    Route::get('productos', function(){
        $productos = Product::OrderBy('created_at' , 'desc')->get();
        return view('productos/index' , compact('productos'));
    })->name('productos.index');
    
    Route::get('productos/crearnuevo', function(){
        return view('productos/crearnuevo');
    })->name('productos.crearnuevo');
    
    Route::post('productos', function(Request $request){
        $nuevoProducto = new Product;
        $nuevoProducto->description = $request->input('description');
        $nuevoProducto->price = $request->input('price');
        $nuevoProducto->save();
        return redirect()->route('productos.index')->with('info' , 'Producto creado exitosamente');
    })->name('productos.creado');
    
    Route::delete('productos/{id}' , function($id){
        $producto = Product::FindOrFail($id);
        $producto->delete();
        return redirect()->route('productos.index')->with('info' , 'Producto eliminado exitosamente');
    })->name('productos.borrado');
    
    Route::get('productos/{id}/editar' , function($id){
        $producto = Product::FindOrFail($id);
        return view('productos.editar' , compact('producto'));
    })->name('productos.editar');
    
    Route::put('productos/{id}', function(Request $request , $id){
        $producto = Product::FindOrFail($id);
        $producto->description = $request->input('description');
        $producto->price = $request->input('price');
        $producto->save();
        return redirect()->route('productos.index')->with('info' , 'Producto modificado exitosamente');
    })->name('productos.modificado');

});


Auth::routes();

