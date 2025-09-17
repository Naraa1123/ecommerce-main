<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Жагсаалт
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    // Үүсгэх форм
    public function create()
    {
        return view('admin.category.create');
    }

    // Хадгалах
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);

        Category::create($data);

        return redirect('/admin/categories')->with('success','Категори нэмэгдлээ');
    }

    // Дэлгэрэнгүй (сонголт)
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.show', compact('category'));
    }

    // Засварлах форм
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    // Шинэчлэх
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $data = $request->validate([
            'name' => 'required',
        ]);

        $category->update($data);

        return redirect('/admin/categories')->with('success','Категори шинэчлэгдлээ');
    }

    // Устгах
    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return redirect('/admin/categories')->with('success','Устгалаа');
    }
}
