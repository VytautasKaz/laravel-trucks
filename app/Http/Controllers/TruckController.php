<?php

namespace App\Http\Controllers;

use App\Forms\TruckForm;
use App\Models\Truck;
use App\Models\Truckmaker;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

class TruckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (isset($request->truckmaker_id) && $request->truckmaker_id !== 0)
            $trucks = Truck::where('truckmaker_id', $request->truckmaker_id)->sortable()->paginate(999);
        else
            $trucks = Truck::sortable()->paginate(999);

        return view('trucks.index', compact('trucks'), ['trucks' => $trucks, 'truckmakers' => Truckmaker::orderBy('name')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(TruckForm::class, [
            'method' => 'POST',
            'route' => 'trucks.store'
        ]);
        return view('trucks.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $year = date("Y");
        $this->validate($request, [
            'truckmaker_id' => 'required',
            'year' => 'required|gte:1900|lte:' . $year,
            'name' => 'required',
            'owners_count' => 'nullable|gte:1'
        ]);

        $nameValidation = explode(' ', $request->name);
        if (count($nameValidation) < 2) {
            return redirect()->back()->with('status_error', 'Full owner name required.');
        }

        $truck = new Truck();
        $truck->fill($request->all());
        $truck->save();
        return ($truck->save() == 1)
            ? redirect()->route('trucks.index')->with('status_success', 'Truck added successfully!')
            : redirect()->route('trucks.index')->with('status_error', 'Truck addition failed.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function show(Truck $truck)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function edit(Truck $truck)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Truck $truck)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function destroy(Truck $truck)
    {
        $truck->delete();
        return redirect()->route('trucks.index')->with('status_success', 'Truck removed successfully!');
    }
}
