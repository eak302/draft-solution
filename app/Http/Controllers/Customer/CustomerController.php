<?php

namespace App\Http\Controllers\Customer;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request) {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $customer = Customer::where('company_name', 'LIKE', "%$keyword%")
                            ->orWhere('customer_name', 'LIKE', "%$keyword%")
                            ->orWhere('latitude', 'LIKE', "%$keyword%")
                            ->orWhere('longitude', 'LIKE', "%$keyword%")
                            ->latest()->paginate($perPage);
        } else {
            $customer = Customer::latest()->paginate($perPage);
        }

        return view('backend.customer.index', compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        return view('backend.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request) {

        $requestData = $request->all();

        Customer::create($requestData);

        return redirect('admin/customer')->with('flash_message', 'Customer added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id) {
        $customer = Customer::findOrFail($id);

        return view('backend.customer.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        $customer = Customer::findOrFail($id);

        return view('backend.customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id) {

        $requestData = $request->all();

        $customer = Customer::findOrFail($id);
        $customer->update($requestData);

        return redirect('admin/customer')->with('flash_message', 'Customer updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id) {
        Customer::destroy($id);

        return redirect('admin/customer')->with('flash_message', 'Customer deleted!');
    }

    public function dataAjaxCustomer(Request $request) {
        $data = [];

        if($request->has('q')){
            $search = $request->q;
            $data = Customer::where('customer_name','LIKE',"%$search%")->get();
        }

        return response()->json($data);
    }

    // frontend
    public function createCustomer(Request $request) {
        $draft = $request->session()->get('draft');
        return view('frontend.customer.create' ,compact('draft', $draft));
    }

    public function postCreateCustomer(Request $request) {

        $validatedData = $request->validate([
            'company_name' => 'required',
            'customer_name' => 'required',
        ]);
 
        // if(empty($request->session()->get('draft'))){
        //     $draft = new StepFrom();
        //     $draft->fill($validatedData);
        //     $draft->session()->put('draft', $draft);
        // }else{
        //     $draft = $request->session()->get('draft');
        //     $draft->fill($validatedData);
        //     $request->session()->put('draft', $draft);
        // }
        return redirect('/service-create');
 
    }

}
