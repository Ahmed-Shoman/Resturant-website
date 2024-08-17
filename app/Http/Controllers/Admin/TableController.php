<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TableStoreRequest;
use Illuminate\Http\Request;
use App\Models\table;
use Illuminate\Support\Facades\Storage;



class TableController extends Controller
{
   
    public function index()
    {
        $tables = table::all();
     return view('admin.table.index',compact('tables'));
    }

   
    public function create()
    {
      $tables = Table::all();

      return view('admin.table.create',compact('tables'));
    }

   
    public function store(TableStoreRequest $request)
    {
      
        Table::create([
            'name' => $request->name,
            'guest_number' => $request->guest_number, // Use underscore instead of dash
            'status' => $request->status,
            'location' => $request->location
        ]);
        return to_route('admin.tables.index');
        
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
{
    $table = Table::findOrFail($id);
    return view('admin.table.edit', compact('table'));
}

    
 public function update(TableStoreRequest $request, $id)
{
    $table = Table::findOrFail($id);

    // Validate the request data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'guest_number' => 'required|integer'
    ]);

    // Update the table
    $table->update($validatedData);

    return redirect()->route('admin.tables.index')->with('success', 'Table updated successfully!');
}

   
    public function destroy(Table $table)
    {
    $table->delete();
    
    return to_route('admin.tables.index');
    }
}