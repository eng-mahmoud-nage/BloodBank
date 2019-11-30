<?php

namespace App\Http\Controllers;

use App\Governorate;
use Illuminate\Http\Request;

class GovernorateController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
        $records = Governorate::all();
        return view('admin.pages.governorates.all', compact('records'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
      $record = new Governorate();
        return view('admin.pages.governorates.createOrUpdate', compact('record'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
        $request->validate([
            'name' => 'required|unique:governorates'
        ]);
        Governorate::create($request->all());
        return redirect(url(route('governorate.index')))->with('success', 'Governorate Created');
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
      $record = Governorate::find($id);
      return view('admin.pages.governorates.createOrUpdate', compact('record'));
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
          'name' => 'required|unique:governorates,name,'.$id
      ]);
      Governorate::find($id)->update($request->all());
      return redirect(url(route('governorate.index')))->with('success', 'Governorate Updated');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
      Governorate::find($id)->delete();
      return redirect(url(route('governorate.index')))->with('warning', 'Governorate Deleted');
  }

}

?>
