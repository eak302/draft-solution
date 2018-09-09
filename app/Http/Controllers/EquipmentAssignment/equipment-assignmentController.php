<?php

namespace App\Http\Controllers\EquipmentAssignment;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\equipment-assignment;
use Illuminate\Http\Request;

class equipment-assignmentController extends Controller
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
            $equipment-assignment = equipment-assignment::where('technology_name', 'LIKE', "%$keyword%")
                ->orWhere('equipment_name', 'LIKE', "%$keyword%")
                ->orWhere('equipment_picture', 'LIKE', "%$keyword%")
                ->orWhere('layer', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $equipment-assignment = equipment-assignment::latest()->paginate($perPage);
        }

        return view('backend.equipment-assignment.index', compact('equipment-assignment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('backend.equipment-assignment.create');
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
        
        $requestData = $request->all();
        
        equipment-assignment::create($requestData);

        return redirect('admin/equipment-assignment')->with('flash_message', 'equipment-assignment added!');
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
        $equipment-assignment = equipment-assignment::findOrFail($id);

        return view('backend.equipment-assignment.show', compact('equipment-assignment'));
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
        $equipment-assignment = equipment-assignment::findOrFail($id);

        return view('backend.equipment-assignment.edit', compact('equipment-assignment'));
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
        
        $equipment-assignment = equipment-assignment::findOrFail($id);
        $equipment-assignment->update($requestData);

        return redirect('admin/equipment-assignment')->with('flash_message', 'equipment-assignment updated!');
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
        equipment-assignment::destroy($id);

        return redirect('admin/equipment-assignment')->with('flash_message', 'equipment-assignment deleted!');
    }
}
