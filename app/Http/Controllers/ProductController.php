<?php

namespace App\Http\Controllers;

use App\mhs;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mhs = mhs::all()->toArray();
        return view('mhs.index', compact('mhs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mhs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mhs = $this->validate(request(), [
            'nama' => 'required',
            'nim' => 'required|numeric',
            'nilai' => 'required|numeric',
            'semester' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'alamat' => 'required'
        ]);

        mhs::create($mhs);

        return back()->with('success', 'Mahasiswa has been added');;
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mhs = mhs::find($id);
        return view('mhs.edit', compact('mhs', 'id'));
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
        $mhs = mhs::find($id);
            $this->validate(request(), 
            ['nama'=>'required', 
             'nim' => 'required|numeric',
             'nilai' =>'required|numeric',
             'semester' => 'required',
             'no_hp' => 'required',
             'email' => 'required', 
             'alamat'=>'required'
            ]);
        $mhs->nama = $request->get('nama');
        $mhs->nim = $request->get('nim');
        $mhs->nilai=$request->get('nilai');
        $mhs->semester = $request->get('semester');
        $mhs->no_hp= $request->get('no_hp');
        $mhs->email= $request->get('email');
        $mhs->alamat= $request->get('alamat');
      
        $mhs->save();   
           return redirect('mhs')->with('success', 'Mahasiswa telah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mhs = mhs::find($id);      
        $mhs->delete();      
          return redirect('mhs')->with('success','Data mahasiswa telah dihapus');    
        
    }

}
