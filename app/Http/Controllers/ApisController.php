<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class ApisController extends Controller
{
     
	 
	/**
     * Display our Vue js landing Page.
     *
     * @return \Illuminate\Http\Response
    */
    public function home()
    {
          return view('vueApp');
    }
	 
	 
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
      return Post::orderBy('id','DESC')->get();
    }
	
	

	/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
		
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);

        $create = Post::create($request->all());

        return response()->json(['status'=>'success','msg'=>'Post created successfully']);
		
    }
	
	/**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
		return Post::find($id);
    }
	
	/**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
		return Post::find($id);
    }

	/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);

        $post = Post::find($id);
		if($post->count()){
			 $post->update($request->all());
			 return response()->json(['status'=>'success','msg'=>'Post updated successfully.']);
		}else{
			 return response()->json(['status'=>'error','msg'=>'Error in updating Post']);
		}
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post= Post::find($id);
		if($post->count()){
			$post->delete();
			 return response()->json(['status'=>'success','msg'=>'Post deleted successfully']);
		}else{
			 return response()->json(['status'=>'error','msg'=>'Error in deleting Post']);
		}
    }
}
