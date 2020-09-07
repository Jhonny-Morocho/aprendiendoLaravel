<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trainer;

class TrainerControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       // return "Hola mundo";

       //traemos todos los datos del modelo
       $trainers=Trainer::all();
       //return view('trainers.index');
       return view('trainers.index',compact('trainers'));//compact genera un array con la informacion q le asignenemos($trainer )>=sin la felcha
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('trainers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validacion
       //return die(json_encode($request));
         $validatedData=$request->validate([
             'nombre'=>'required|max:10',
             'avatar'=>'required|image'
      

         ]);
        //preguntamos si contiene un archivo
        if ($request->hasFile('avatar')) {
            $file=$request->file('avatar');
            //para que el nombre nunca se repita
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/',$name);
            
        }
        //return $request;// para ver o debuguar 
         $trainers=new Trainer();// insttancia de nuestro modelo
         $trainers->nombre=$request->input('nombre');
         $trainers->avatar=$name;
        $trainers->save();
        return 'Guardado';
        //return $request->input('nombre');
        //return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //   public function show(T$id)
    public function show(Trainer $trainer)
    {
        //
       // return "E,L ID DEL ENTRENADOR ES ".$id;
       //$trainer=Trainer::find($id); // primero estaba asi
       // $trainer=Trainer::where('slug','=',$slug)->firstOrFail();// es slug q esta en nuetsra tabla sea igual al selug q estamos resibiendo:>firstOrFail bota una exepecion si no encuentra el modelo q estamos buscando

        return view('trainers.show',compact('trainer'));// la variable trainer va en el compact 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Trainer $trainer)
    {
        //
        //return $trainer;
        return view('trainers.edit',compact('trainer'));// la variable trainer va en el compact 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trainer $trainer)
    {
        //
        // mandamos actualizar toda la informacion
        //$trainer->fill($request->all());
       $trainer->fill($request->except('avatar'));


        //preguntamos si contiene un archivo
        if ($request->hasFile('avatar')) {
        $file=$request->file('avatar');
        //para que el nombre nunca se repita
        $name=time().$file->getClientOriginalName();
        $trainer->avatar=$name; 
        $file->move(public_path().'/images/',$name);
            
        }

       $trainer->save();
       
       return  'Se Actualizo';
        //return 'Se Actualizo';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
