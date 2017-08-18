<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Http\Requests\StoreEmployee;
use App\Http\Requests\UpdateEmployee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::paginate(10);

        return view('employees.index')
            ->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = \App\Branch::all();
        $positions = \App\Position::all();

        return view('employees.create')
            ->with('branches', $branches)
            ->with('positions', $positions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployee $request)
    {
        $employee = new Employee;

        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->maiden_name = $request->input('maiden_name');
        $employee->salary = $request->input('salary');
        $employee->date_of_hire = $request->input('date_of_hire');

        $branch = \App\Branch::find($request->input('branch'));
        $employee->branch()
            ->associate($branch);

        $position = \App\Position::find($request->input('position'));
        $employee->position()
            ->associate($position);

        $employee->save();

        return redirect()
            ->route('employees.index')
            ->with('success', 'Empleado creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        $employee = Employee::find($employee->id);

        return view('employees.show')
            ->with('employee', $employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $branches = \App\Branch::all();
        $positions = \App\Position::all();
        $employee = Employee::find($employee->id);

        return view('employees.edit')
            ->with('branches', $branches)
            ->with('positions', $positions)
            ->with('employee', $employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployee $request, Employee $employee)
    {
        $employee = Employee::find($employee->id);

        if ($request->has('first_name')) {
            $employee->first_name = $request->input('first_name');
        }
        if ($request->has('last_name')) {
            $employee->last_name = $request->input('last_name');
        }
        if ($request->has('maiden_name')) {
            $employee->maiden_name = $request->input('maiden_name');
        }
        if ($request->has('salary')) {
            $employee->salary = $request->input('salary');
        }
        if ($request->has('date_of_hire')) {
            $employee->date_of_hire = $request->input('date_of_hire');
        }
        if ($request->has('branch')) {
            if ($request->input('branch') != 0) {
                $branch = App\Branch::find($request->input('branch'));
                $employee->branch()
                    ->associate($branch);
            }
        }
        if ($request->has('position')) {
            if ($request->input('position') != 0) {
                $position = App\Position::find($request->input('position'));
                $employee->position()
                    ->associate($position);
            }
        }

        $employee->save();

        return redirect()
            ->route('employees.index')
            ->with('success', 'Empleado actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee = Employee::find($employee->id);
        $employee->delete();

        return redirect()
            ->route('employees.index')
            ->with('success', 'Empleado eliminado satisfactoriamente');
    }
}
