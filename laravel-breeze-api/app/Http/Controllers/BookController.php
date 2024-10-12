<?php

namespace App\Http\Controllers;

use App\Models\book;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBookRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        // below code helps to debug for checking whether the user has any roles or permissions assigned.
        $user = Auth::user();

        // Check what roles the user has
        $roles = $user->roles->pluck('id');
        
        // Check what permissions the user has
        $permissions = $user->getAllPermissions()->pluck('name');
    
        return response()->json([
            'user' => $user,
            'roles' => $roles,
            'permissions' => $permissions,
        ]);
         */

        // Ensure the user has permission to view books
        if (Auth::user()->can('view books')) {
            $books = Book::all(); // Fetch all books
            return response()->json($books);
        } else {
            return response()->json(['error' => 'You do not have permission to view books'], 403);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        // Check if the authenticated user has permission to create books
        if (Auth::user()->can('create books')) {
            $book = Book::create($request->all()); // Assuming validated input
            return response()->json($book);
        } else {
            return response()->json(['error' => 'You do not have permission to create books'], 403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(book $book)
    {
        $book = Book::find($id);

        // Check if the user has permission to edit books
        if (Auth::user()->can('edit books')) {
            return response()->json($book);
        } else {
            return response()->json(['error' => 'You do not have permission to edit books'], 403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    // Update the specified book
    public function update(Request $request, $id)
    {
        $book = Book::find($id);

        // Check if the user has permission to edit books
        if (Auth::user()->can('edit books')) {
            $book->update($request->all());
            return response()->json($book);
        } else {
            return response()->json(['error' => 'You do not have permission to update books'], 403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    // Remove the specified book
    public function destroy(book $book)
    {
        // Check if the user has permission to delete books
        if (Auth::user()->can('delete books')) {
            $book->delete();
            return response()->json(['success' => 'Book deleted successfully!']);
        } else {
            return response()->json(['error' => 'You do not have permission to delete books'], 403);
        }
    }
}
