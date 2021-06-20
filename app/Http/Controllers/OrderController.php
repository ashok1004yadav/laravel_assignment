<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Course;
use App\Models\SystemVariable;
use App\Models\UserVariable;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public $module = 'Course Order';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $module_name = $this->module;
        $orders = Order::latest()->paginate(5);
        return view('orders.index',compact('orders','module_name'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        $statuses = SystemVariable::where('field_key', 'status')->get();
        $options = UserVariable::where('field_key', 'option')->get();
        $module_name = $this->module;
        return view('orders.create',compact('courses','statuses','options','module_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // echo count($request->all()['order'])." ------- <pre>";print_r($request->input());echo "</pre>";exit;
        $module_name = $this->module;
        $request->validate([
            'order' => 'required',
            'question' => 'required',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'option_e' => 'required',
            'option_f' => 'required',
            'option_id' => 'required',
            'course_id' => 'required',
            'status_id' => 'required',
        ]);

        $data = $request->input();
        
        for($i=0;$i<count($data['order']);$i++) {
            $order = new Order;
            $order->order = $data['order'][$i];
            $order->question = $data['question'][$i];
            $order->option_a = $data['option_a'][$i];
            $order->option_b = $data['option_b'][$i];
            $order->option_c = $data['option_c'][$i];
            $order->option_d = $data['option_d'][$i];
            $order->option_e = $data['option_e'][$i];
            $order->option_f = $data['option_f'][$i];
            $order->option_id = $data['option_id'][$i];
            $order->course_id = $data['course_id'];
            $order->status_id = $data['status_id'];
            $order->save();
           // echo count($data['order'])." ------- <pre>";print_r($order);echo "</pre>";
        }
//exit;

        //Order::create($request->all());

        return redirect()->route('orders.index')->with('success',$module_name.' created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $module_name = $this->module;
        return view('orders.show',compact('order','module_name'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $module_name = $this->module;
        return view('orders.edit',compact('order','module_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $module_name = $this->module;
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $order->update($request->all());

        return redirect()->route('orders.index')->with('success',$module_name.' updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $module_name = $this->module;
        $order->delete();
        return redirect()->route('orders.index')->with('success',$module_name.' deleted successfully');
    }
}
