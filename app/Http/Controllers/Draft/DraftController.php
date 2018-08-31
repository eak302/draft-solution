<?php

namespace App\Http\Controllers\Draft;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Draft;
use Illuminate\Http\Request;

class DraftController extends Controller
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
            $draft = Draft::where('water_need_qty', 'LIKE', "%$keyword%")
                ->orWhere('purpose', 'LIKE', "%$keyword%")
                ->orWhere('budget', 'LIKE', "%$keyword%")
                ->orWhere('start_date', 'LIKE', "%$keyword%")
                ->orWhere('service_duration', 'LIKE', "%$keyword%")
                ->orWhere('pipe_size', 'LIKE', "%$keyword%")
                ->orWhere('pipe_setup_price', 'LIKE', "%$keyword%")
                ->orWhere('technology', 'LIKE', "%$keyword%")
                ->orWhere('sale_name', 'LIKE', "%$keyword%")
                ->orWhere('company', 'LIKE', "%$keyword%")
                ->orWhere('other', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $draft = Draft::latest()->paginate($perPage);
        }

        return view('backend.draft.index', compact('draft'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('backend.draft.create');
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
        
        Draft::create($requestData);

        return redirect('admin/draft')->with('flash_message', 'Draft added!');
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
        $draft = Draft::findOrFail($id);

        return view('backend.draft.show', compact('draft'));
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
        $draft = Draft::findOrFail($id);

        return view('backend.draft.edit', compact('draft'));
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
        
        $draft = Draft::findOrFail($id);
        $draft->update($requestData);

        return redirect('admin/draft')->with('flash_message', 'Draft updated!');
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
        Draft::destroy($id);

        return redirect('admin/draft')->with('flash_message', 'Draft deleted!');
    }
}
