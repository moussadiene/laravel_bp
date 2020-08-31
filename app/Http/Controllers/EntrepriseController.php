<?php

namespace App\Http\Controllers;

use App\Entreprise;
use Illuminate\Http\Request;

class EntrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        /**
         * pour la liste des entreprise
         * $liste = Entreprise::all();
         **/
        // pour avoir la pagination de notre liste
        //$liste = Entreprise::orderBy('created_at','DESC')->paginate(5);
        //$liste = Entreprise::all();
        //return response()->json($liste);

        if(request('rechercher') != null){
            $listes['data'] = Entreprise::where('nom','like','%'.request('rechercher').'%')->get();

            return response()->json($listes);
        }else{
            return $this->actualiser();
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
    public function store(Request $request)
    {

        $new = Entreprise::create($request->all());

        if($new){
            return $this->actualiser();
        }

    }

    private function actualiser(){
        $liste = Entreprise::orderBy('created_at','DESC')->paginate(8);
        return response()->json($liste);
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
        $entreprise = Entreprise::find($id);
        return response()->json($entreprise);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $entreprise = Entreprise::find($id);
        $entreprise->nom = request('nom');
        $entreprise->ninea = request('ninea');
        $entreprise->adresse = request('adresse');
        $entreprise->email = request('email');
        $entreprise->telephone = request('telephone');
        $entreprise->budget = request('budget');

        $entreprise->save();
        if($entreprise){
            return $this->actualiser();
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
        $entreprise = Entreprise::find($id);

        if($entreprise->delete()){
            return $this->actualiser();
        }
    }
}
