<?php

namespace App\Http\Controllers\Technology;

use App\Http\Controllers\Controller;
use App\Service;
use App\Technology;
use App\TechnologyPicture;
use App\Video;
use Illuminate\Http\Request;

class TechnologyController extends Controller
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
            $technology = Technology::where('name', 'LIKE', "%$keyword%")
                ->orWhere('picture', 'LIKE', "%$keyword%")
                ->orWhere('video', 'LIKE', "%$keyword%")
                ->orWhere('equipment', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $technology = Technology::latest()->paginate($perPage);
        }

        return view('backend.technology.index', compact('technology'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $service = Service::all();
        $picture = TechnologyPicture::all();
        $video = Video::all();
        return view('backend.technology.create', compact('service', 'video', 'picture'));
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
        $this->validate($request, [
            'name' => 'required',
            'picture' => 'required|array',
            'picture.*' => 'required',
            'video' => 'required|array',
            'video.*' => 'required',
        ]);

        $technology = new technology();
        // dd($request->input('video'));

<<<<<<< HEAD
        if ($request->hasFile('picture')) {
            // $names = [];
            // foreach ($request->file('picture') as $picture) {
            $picture = $request->file('picture');
            $name = str_slug($request->name) . '.' . $picture->getClientOriginalExtension();
//            $destinationPath = storage_path('/uploads/technology/picture');
//            $imagePath = $destinationPath . "/" . $name;
//            $picture->move($destinationPath, $name);
            // $names[] = $name;
            // }
            // $technology->picture = implode(",", $names);
            $technology->picture = $name;
            $request->picture->storeAs('public/uploads/technology/picture/', $name);
=======
        if (count($request->input('picture')) > 0) {
            $technology->picture = implode(",", $request->input('picture'));
        }
        if (count($request->input('video')) > 0) {
            $technology->video = implode(",", $request->input('video'));
>>>>>>> 523014c58264f4a5ab5646cb1c91e111ffd2b5d9
        }

        $technology->name = $request->get('name');
        $technology->service = $request->get('service');

        $technology->save();
        return redirect('/admin/technology');
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
        $technology = Technology::findOrFail($id);

        return view('backend.technology.show', compact('technology'));
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
        $service = Service::all();
        $video = Video::all();
        $equipment = Equipment::all();
        $technology = Technology::findOrFail($id);

        return view('backend.technology.edit', compact('technology', 'service', 'video', 'equipment'));
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

        $technology = Technology::findOrFail($id);
        $technology->update($requestData);

        return redirect('admin/technology')->with('flash_message', 'Technology updated!');
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
        Technology::destroy($id);

        return redirect('admin/technology')->with('flash_message', 'Technology deleted!');
    }

    public function dataAjaxTechnology(Request $request)
    {
        $data = [];
        if ($request->has('q')) {
            $search = $request->q;
            $data = Technology::where('service', '=', "$search")->get();
        }

        return response()->json($data);
    }

}
