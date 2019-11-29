<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;

class CityController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $records = City::all();
        return view('admin/pages/cities.all')->with(['records' => $records]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.pages.cities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:cities'
        ]);
        $c = City::create($request->except('governorate_id'));
        $c->governorate_id = $request->input('governorate')+1;
        $c->save();
        return redirect(url(route('city.index')))->with('success', 'City Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $record = City::find($id);
        return view('admin/pages/cities.edit')->with(['record' => $record]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:cities'
        ]);
        City::find($id)->update($request->all());
        return redirect(url(route('city.index')))->with('success', 'City Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        City::find($id)->delete();
        return redirect(url(route('city.index')))->with('warning', 'City Deleted');
    }

}

?>
