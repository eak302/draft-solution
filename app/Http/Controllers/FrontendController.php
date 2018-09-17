<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(Request $request, $form)
    {
        $step_form = [
            [
                'link' => 'home',
                'name' => config('app.name'),
            ], [
                'link' => 'customer',
                'name' => 'ข้อมูลลูกค้า',
            ], [
                'link' => 'service',
                'name' => 'เลือกประเภทบริการ/เทคโนโลยี',
            ], /*[
        'link' => 'technology',
        'name' => 'สรุปรายละเอียด',
        ], [
        'link' => 'success',
        'name' => 'บันทึก ' . config('app.name'),
        ],*/
        ];
        if ($form == 'home') {
            $request->session()->forget('draft');
            $draft = $request->session()->get('draft');
            return view("frontend.$form", compact(['step_form', 'draft']));
        }
        $service = Service::all();
        $draft = $request->session()->get('draft');
        return view("frontend.$form.create", compact(['step_form', 'draft', 'service']));
    }

    public function postCreateCustomer(Request $request)
    {
        if ($request->input('customer_type') == 'customer-old') {
            $validatedData = $request->validate([
                'customer_type' => 'required',
                'customer_name_old' => 'required',
            ]);
        } else {
            $validatedData = $request->validate([
                'customer_type' => 'required',
                'company_name' => 'required',
                'customer_name' => 'required',
            ]);
        }

        if (empty($request->session()->get('draft'))) {
            $draft = new Customer();
            $draft->fill($validatedData);
            $draft->customer_type = $request->input('customer_type');
        } else {
            $draft = $request->session()->get('draft');
            $draft->fill($validatedData);
            $draft->customer_type = $request->input('customer_type');
        }
        $draft->draft_level = 1;
        $request->session()->put('draft', $draft);
        return redirect('/create/service');

    }

    public function clear(Request $request)
    {
        $request->session()->forget('draft');
        return redirect('/create/customer');
    }
    
    public function sale()
    {
        //return 'sale page';
        //return view('backend.layouts.main');
        return view('home');
    }
    
    public function saleadmin()
    {
        return 'saleadmin page';
    }
    
    public function supervisor()
    {
        return 'supervisor page';
    }
}
