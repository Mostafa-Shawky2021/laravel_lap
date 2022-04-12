<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{

    private $posts = [
        ['id'=> 1, 'title' => 'first post',  'posted_by' => 'Mostafa' ],
        ['id'=> 5, 'title' => 'second post', 'posted_by' => 'Ahmed' ],
        ['id'=> 2, 'title' => 'third post',  'posted_by' => 'Mohamed'],
    ];
    
    public function index(){
        if( isset($_GET['newData']) ) {
            $newData = (array) json_decode($_GET['newData']);
            array_push($this->posts,$newData);
          
                
        }
        // show view and pass data to v
        return view( 'posts.index', [
            'posts' => $this->posts,
        ]);
    
    }
    public function create(){
        
        return view('posts.create');
    
    }
    public function store(){
        
        if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
            
            $generateId = rand();
            $this->posts= array_merge(['id'=>$generateId],$_POST);
            $newData = JSON_encode($this->posts);
            
            return redirect('/posts?newData='.$newData.'');

        } 
    
    }
    public function show($id) {
        return view('posts.show', [
            'posts' => $this->posts,
            'id' => $id
        ]);
    }
     public function edit($id) {
        return view('posts.edit',[
            'id' => $id,
            'posts' => $this->posts,
        ]);
    }
}
