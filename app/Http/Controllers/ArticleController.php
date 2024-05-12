<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use Log;

class ArticleController extends Controller
{
    public function store(Request $request)
    {
        log::info(auth()->id());
        
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'author_name' => 'required',
            'email' => 'required',

        ]);

        $validatedData['date'] = now()->toDateString(); // Sets the current date
        $validatedData['user_id'] = auth()->id();

        Article::create($validatedData);

        return redirect()->route('dashboard')->with('success', 'Article created successfully.');
    }


    public function edit($id)
    {
        $article = Article::findOrFail($id); 

         if(auth()->user()->usertype == "user"){
            if($article->user_id == auth()->id()){
                return view('edit', compact('article'));
            }
            else {
                return redirect('/my_posts');
            }
         }

         if(auth()->user()->usertype == "admin"){
             
                return view('edit', compact('article')); 
         }
    }


    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            // Add any other validation rules as needed
        ]);

        // Find the article by ID
        $article = Article::findOrFail($id);

        // Update the article with the new data
        $article->title = $request->title;
        $article->content = $request->content;
        // Update any other fields as needed

        // Save the updated article
        $article->save();

        // Redirect back with a success message
        return redirect('/my_posts')->with('success', 'Article updated successfully');
    }

    // Delete an article
    public function delete($id)
    {
        // Find the article by ID
        $article = Article::findOrFail($id);

        // Delete the article
        $article->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Article deleted successfully');
    }
}
