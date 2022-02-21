<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = DB::select('select * from plants ');

       return var_dump($results);
        // return view('user.index', ['users' => $users]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "this is the create method ";
    }

    /**
     * Show the form for insert a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function insert()
    {
        DB::insert('insert into plants (name,species,water_instruction) values (?, ?, ?)', ['assse', 'flower', '3l waterinh per day']);


        return "this is the insert method ";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        return "this is the show method " . $id;
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $affected = DB::update(
            'update plants set name = ?, species = ? where id = ?',
            ['Rose', 'Flower', $id]
        );

        return "this is the update method " . $id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = DB::delete('delete from plants where id = ?', [$id]);

        return "this is the delete method " . $id;
    }

    /**
     * display plants detail
     *
     * @param $id
     * @param $name
     * @param $password
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function plant_detail($id, $name, $password) {

        // return view('pages/plant')->with('id',$id);
        return view('pages.plant',compact('id','name','password'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function plants_list_view() {

        $plants= Plant::all();

        $plant_list = array();
        foreach ($plants as $index => $plant) {
            $plant_list[$index]['title'] = $plant->name;
            $plant_list[$index]['species'] = $plant->species;
        }
        return view('pages/plant_list',compact('plant_list'));
    }

    public function plant_find($id) {
        $plant= Plant::find($id);

        return view('pages/plant_find',compact('plant'));
    }

    public function plant_find_more($id) {

        $plant= Plant::findOrFail($id);

        return view('pages/plant_find',compact('plant'));
    }

    public function basicInsert() {

        $plant= new Plant();
        $plant->name = "lotus";
        $plant->species = "flower";
        $plant->water_instruction = "Watering 4l per day";
        $plant->save();

        return view('pages/plant_find',compact('plant'));
    }

    public function basicUpdate($id) {

       /* $plant=  Plant::find($id);
        if(isset($plant)) {
            $plant->name = "Apple";
            $plant->species = "fruit";
            $plant->water_instruction = "Watering 3l every week";
            $plant->save();
        }*/
        $result = Plant::where('id',$id)->update(['name' => "Spinach", "species" => 'vergie','water_instruction' => '3litter per day']);
        $plant=  Plant::find($id);

        return view('pages/plant_find',compact('plant'));
    }

    public function basicCreate() {

        $plant=  Plant::create(['name' => 'Water Melon','species'=> 'Fruit','water_instruction' => 'Watering 4l every day' ]);
        return view('pages/plant_find',compact('plant'));
    }

    public function softDelete($id) {

        Plant::find($id)->delete();
        return 'the plant with id ' . $id . ' is moved to trash';
    }

    public function viewTrash($id = Null) {

        if(isset($id)) {
           $plants =  Plant::onlyTrashed()->where('id',$id)->get();
        } else {
            $plants = Plant::onlyTrashed()->get();
        }

        return $plants;
    }

    public function restore($id = Null) {

        if(isset($id)) {
            $plants =  Plant::onlyTrashed()->where('id',$id)->restore();
        } else {
            $plants = Plant::onlyTrashed()->restore();
        }

        return $plants;
    }

    public function permanentDelete($id = Null) {
        if(isset($id)) {
            $plants =  Plant::onlyTrashed()->where('id',$id)->forceDelete();
        } else {
            $plants = Plant::onlyTrashed()->forceDelete();
        }

        return $plants;
    }
}
