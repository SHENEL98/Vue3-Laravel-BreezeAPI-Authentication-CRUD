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
        book::create($request->validated());
        return response()->json("Book stored");
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(book $book)
    {
        $book->delete();
        return response()->json("book deleted");
    }
}
