<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data["route"] = route("users.create");
        return view('bo.user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data["route"] = route("users.store");
        return view('bo.user.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|max:100',
            'email'         => 'required|email|unique:users,email',
            'phone_number'  => 'required|max:20',
            'password'      => 'required|max:20',
        ]);

        $request["password"]   = bcrypt($request->password);
        $request["company_id"] = auth()->guard('company')->user()->company_id;

        Owner::create($request->all());

        return redirect()->route('users.index')->with('success', 'Berhasil membuat data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data["route"] = route("users.update", $id);
        $data["model"]  = Owner::find($id);
        return view('bo.user.form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'          => 'required|max:100',
            'email'         => 'required|email|unique:users,email,'.$id,
            'phone_number'  => 'required|max:20',
        ]);

        $model = Owner::find($id);

        if ($request->password) {
            $request["password"] = bcrypt($request->password);
        }else{
            $request["password"] = $model->password;
        }

        $model->update($request->all());
        return redirect()->route('users.index')->with('success', 'Berhasil update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = Owner::find($id);
        $model->delete();
        return redirect()->route('users.index')->with('success', 'Berhasil hapus data');
    }
}
