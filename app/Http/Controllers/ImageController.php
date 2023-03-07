<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileUpdateRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    //Ver Publicacion del usuario
  
    //Ver publicaciones de otros usuarios
    public function verPubli($id){
        
        xdebug_break();
        $imagen = Image::findOrFail($id);
        return view("publicacion", ["image" =>$imagen, "usuario"=>Auth::User()]);
    }

    public function ver(Image $image){
        return view("publicacion",["image"=>$image]);
    }
    
    
    public function upload(Request $request)
    {
        return view('upload', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          /*$request->validate([
            'name' => ['required', 'string', 'max:255'],
            //Validame el campo surname
            'surname' => ['required','string','max:230'],
            //Validame el campo Nick
            'nick' => ['required','string','max:50'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);*/
        if($request->hasFile('image_path')){
            $filename = $request->image_path->getClientOriginalName();
            $request->image_path->storeAs('images',$filename,'public');
            $userId=$request->user()->id;
            $image = Image::create([
                'image_path' => $filename,
                'description' => $request->description,
                'user_id'=> $userId
            
            ]);


        }

        $request->user()->save();

        return Redirect::route('miPerfil');
        
    }

    public function borrar(Image $image){
        $image->deleteOrFail();
        return redirect()->route("miPerfil");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */




    public function inicioPerfil(Image $image, User $user){
        return view("publisUsuario", ["image" =>Image::All(),
        "user"=>Auth::user()->id,
        "name"=>Auth::user()->nick
    ]);
    }
    public function shows(Image $image, User $user)
    {
        return view("shows", ["image" => Image::All(),
            "user"=>User::All()]
            );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        xdebug_break();
        $image->delete();
        
        return redirect()->route('miPerfil');
    }
}
