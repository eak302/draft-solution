<?php

namespace App\Http\Controllers\Equipment;

use App\Http\Controllers\Controller;

use App\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $equipment = Equipment::where('name', 'LIKE', "%$keyword%")
                ->orWhere('detail', 'LIKE', "%$keyword%")
                ->orWhere('picture', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $equipment = Equipment::latest()->paginate($perPage);
        }

        return view('backend.equipment.index', compact('equipment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('backend.equipment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $equipment = new Equipment();

        if ($request->hasFile('picture')) {
            $this->validate($request, [
                'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $picture = $request->file('picture');
            $name = str_slug($request->name) . '.' . $picture->getClientOriginalExtension();
            $destinationPath = storage_path('/uploads/equipment');
            $picturePath = $destinationPath . "/" . $name;
            $picture->move($destinationPath, $name);
            $equipment->picture = '/uploads/equipment' . $name;
//            $equipment->picture = $request->get($destinationPath . 'name');
        }

        $equipment->name = $request->get('name');
        $equipment->detail = $request->get('detail');
        
        $equipment->save();
        return redirect('/admin/equipment');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $equipment = Equipment::findOrFail($id);

        return view('backend.equipment.show', compact('equipment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $equipment = Equipment::findOrFail($id);

        return view('backend.equipment.edit', compact('equipment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $equipment = Equipment::findOrFail($id);
        $equipment->update($requestData);

        return redirect('admin/equipment')->with('flash_message', 'Equipment updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Equipment::destroy($id);

        return redirect('admin/equipment')->with('flash_message', 'Equipment deleted!');
    }
}
