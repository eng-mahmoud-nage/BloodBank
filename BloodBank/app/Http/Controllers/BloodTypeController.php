<?php

namespace App\Http\Controllers;

use App\BloodType;
use Illuminate\Http\Request;

class BloodTypeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $records = BloodType::all();
        return view('admin.pages.bloodtypes.all', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $record = new BloodType();
        return view('admin.pages.bloodtypes.createOrUpdate', compact('record'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:blood_types'
        ]);
        BloodType::create($request->all());
        return redirect(url(route('bloodtype.index')))->with('success', 'BloodType Created');
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
        $record = BloodType::find($id);
        return view('admin.pages.bloodtypes.createOrUpdate', compact('record'));
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
            'name' => 'required|unique:blood_types,name,'.$id
        ]);
        BloodType::find($id)->update($request->all());
        return redirect(url(route('bloodtype.index')))->with('success', 'BloodType Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        BloodType::find($id)->delete();
        return redirect(url(route('bloodtype.index')))->with('warning', 'BloodType Deleted');
    }

}

?>
