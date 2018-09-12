<?php

namespace App\Http\Controllers\TechnologyPicture;

use App\Http\Controllers\Controller;
use App\TechnologyPicture;
use Illuminate\Http\Request;

class TechnologyPictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $picture = TechnologyPicture::where('name', 'LIKE', "%$keyword%")
                ->orWhere('picture', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $picture = TechnologyPicture::latest()->paginate($perPage);
        }

        return view('backend.technology-picture.index', compact('picture'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.technology-picture.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            // 'picture' => 'required|array|max:2048',
            // 'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $technology = new TechnologyPicture();

        if ($request->hasFile('picture')) {
            // $names = [];
            // foreach ($request->file('picture') as $picture) {
            $picture = $request->file('picture');
            $name = str_slug($request->name) . '.' . $picture->getClientOriginalExtension();
<<<<<<< HEAD
//            $destinationPath = storage_path('/uploads/technology/picture');
//            $imagePath = $destinationPath . "/" . $name;
//            $picture->move($destinationPath, $name);
=======
            // $destinationPath = storage_path('/uploads/technology/picture');
            // $imagePath = $destinationPath . "/" . $name;
            // $picture->move($destinationPath, $name);
>>>>>>> 523014c58264f4a5ab5646cb1c91e111ffd2b5d9
            // $names[] = $name;
            // }
            // $technology->picture = implode(",", $names);
            $technology->picture = $name;
            $request->picture->storeAs('public/uploads/technology/picture/', $name);
        }

        $technology->name = $request->get('name');

        $technology->save();
        return redirect('/admin/technology-picture');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $picture = TechnologyPicture::findOrFail($id);

        return view('backend.technology-picture.show', compact('picture'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $picture = TechnologyPicture::findOrFail($id);

        return view('backend.technology-picture.edit', compact('picture'));
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
        $requestData = $request->all();

        $picture = TechnologyPicture::findOrFail($id);
        $picture->update($requestData);

        return redirect('admin/technology-picture')->with('flash_message', 'Technology Picture updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TechnologyPicture::destroy($id);

        return redirect('admin/technology-picture')->with('flash_message', 'Technology Picture deleted!');
    }
}
