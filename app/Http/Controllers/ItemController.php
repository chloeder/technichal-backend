<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;

class ItemController extends Controller
{
  public function index()
  {
    $items = Items::all();

    return view('item', compact('items'));
  }
  public function create(Request $request)
  {
    $validation = $request->validate([
      'item_name' => 'required|unique:items|min:3|max:255',
      'item_description' => 'required|min:3|max:255',
      'item_price' => 'required|numeric',
      'file' => 'required',
    ], [
      'item_name.required' => 'Item name is required',
      'item_name.unique' => 'Item name already exists',
      'item_name.min' => 'Item name must be at least 3 characters',
      'item_name.max' => 'Item name must not be greater than 255 characters',
      'item_description.required' => 'Item description is required',
      'item_description.min' => 'Item description must be at least 3 characters',
      'item_description.max' => 'Item description must not be greater than 255 characters',
      'item_price.required' => 'Item price is required',
      'item_price.numeric' => 'Item price must be a number',
      'file.required' => 'File is required',
    ]);

    if ($request->hasFile('file')) {
      $validation['file'] = $request->file->getClientOriginalName();
      $request->file->storeAs('public/berkas', $validation['file']);
    } else {
      $validated = 'nodatafound';
    }

    $item = Items::create([
      'item_name' => $request->item_name,
      'item_description' => $request->item_description,
      'item_price' => $request->item_price,
      'file' => $validation['file'],
    ]);


    return redirect()->route('items', compact('item'))->with('success', 'Item created successfully');
  }

  public function update(Request $request, $id)
  {
    $validation = $request->validate([
      'item_name' => 'required|min:3|max:255',
      'item_description' => 'required|min:3|max:255',
      'item_price' => 'required|numeric',
    ], [
      'item_name.required' => 'Item name is required',
      'item_name.min' => 'Item name must be at least 3 characters',
      'item_name.max' => 'Item name must not be greater than 255 characters',
      'item_description.required' => 'Item description is required',
      'item_description.min' => 'Item description must be at least 3 characters',
      'item_description.max' => 'Item description must not be greater than 255 characters',
      'item_price.required' => 'Item price is required',
      'item_price.numeric' => 'Item price must be a number',
    ]);

    $item = Items::find($id);

    $item->update([
      'item_name' => $request->item_name,
      'item_description' => $request->item_description,
      'item_price' => $request->item_price,
    ]);

    return redirect()->route('items', compact('item'))->with('success', 'Item updated successfully');
  }

  public function delete($id)
  {
    $item = Items::find($id);

    $item->delete();

    return redirect()->route('items', compact('item'))->with('success', 'Item deleted successfully');
  }
}
