<?php

namespace App\Http\Controllers;

use App\Crud;
use Illuminate\Http\Request;

class CrudsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Crud::latest()->paginate(5);
        return view('index', compact('data'))
            ->with('i', (request()->input('page', 1) -1) *5);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'firts_name' => 'required',
            'last_name'  => 'required',
            'image'      => 'required|image|max:2048',
            'phone'      => 'required',
            'adress'     => 'required',
            'email'      => 'required',
        ]);

        $image = $request->file('image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $form_data = array(
            'first_name'    =>  $request->first_name,
            'last_name'     =>  $request->last_name,
            'image'         =>  $new_name,
            'phone'         =>  $request->phone,
            'adress'        =>  $request->adress,
            'email'         =>  $request->email,
            'data'          =>  $request->data
        );

        Crud::create($form_data);

        return redirect('crud')->with('sucess','Cadastro feito com Sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Crud::findOrFail($id);
        return view('view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Crud::findOrFail($id);
        return view('edit', compact('data'));
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
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')

        {
            $request->validate([
                'first_name' => 'required',
                'last_name'  => 'required',
                'phone'      => 'required',
                'image'      => 'required',
                'adress'     => 'required',
                'email'      => 'required',
                'data'       => 'required'

            ]);

            $image_name = rand(). '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }

        else

        {
            $request->validate([
              'first_name'  => 'required',
              'last_name'   => 'required',
              'data'        => 'required',
              'email'       => 'required',
              'phone'       => 'required',
              'adress'      => 'required',
            ]);
        }

        $form_data = array(
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'image'         => $image_name,
            'phone'         => $request->phone,
            'data'          => $request->data,
            'email'         => $request->email,
            'phone'         => $request->phone
        );

        Crud::whereId($id)->update($form_data);
        return redirect('crud')->with('sucess', 'O cadastro foi feito com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Crud::findOrFail($id);
        $data->delete();

        return redirect('crud')->with('sucess', 'O cadastro foi Deletado!!');
    }
}
