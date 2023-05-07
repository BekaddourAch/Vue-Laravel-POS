<?php

namespace App\Http\Controllers\api;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Model\Employee;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\DB;

// import the Intervention Image Manager Class 
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return response()->json($employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:employees|max:255',
            'email' => 'required',
            'phone' => 'required|unique:employees',

        ]);

        if ($request->photo) {
            $position = strpos($request->photo, ';');
            $sub = substr($request->photo, 0, $position);
            $ext = explode('/', $sub)[1];

            $name = time() . "." . $ext;
            // create an image manager instance with favored driver
            $manager = new ImageManager();

            // to finally create image instances 
            $img = $manager->make($request->photo)->resize(240, 200);
            $upload_path = '/backend/employee/';
            $image_url = $upload_path . $name;
            $img->save($image_url);

            $employee = new Employee;
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->phone = $request->phone;
            $employee->address = $request->address;
            $employee->sallery = $request->sallery;
            $employee->photo = $image_url;
            $employee->nid = $request->nid;
            $employee->joining_date = $request->joining_date;
            $employee->save();
        } else {
            $employee = new Employee;
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->phone = $request->phone;
            $employee->address = $request->address;
            $employee->sallery = $request->sallery;
            $employee->nid = $request->nid;
            $employee->joining_date = $request->joining_date;
            $employee->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = DB::table('employees')->where('id', $id)->first();
        return response()->json($employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['joining_date'] = $request->joining_date;
        $data['sallery'] = $request->sallery;
        $data['photo'] = $request->photo;
        $data['nid'] = $request->nid;
        $image = $request->newphoto;

        if ($image) {
            $position = strpos($image, ';');
            $sub = substr($image, 0, $position);
            $ext = explode('/', $sub)[1];

            $name = time() . "." . $ext;
            // create an image manager instance with favored driver
            $manager = new ImageManager();
            // to finally create image instances  
            $img = $manager->make($image)->resize(240, 200);
            $upload_path = 'backend/employee/';
            $image_url = $upload_path . $name;
            $success = $img->save($image_url);
            error_log($success);
            if ($success) {
                $data['photo'] = $image_url;
                $img = DB::table('employees')->where('id', $id)->first();
                $image_path = $img->photo;
                $done = @unlink($image_path);
                $user = DB::table('employees')->where('id', $id)->update($data);
            }
        } else {
            $oldphoto = $request->photo;
            $data['photo'] =  $oldphoto;
            $user = DB::table('employees')->where('id', $id)->update($data);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = DB::table('employees')->where('id', $id)->first();
        $photo = $employee->photo;
        if ($photo) {
            @unlink($photo);
            DB::table('employees')->where('id', $id)->delete();
        } else {
            DB::table('employees')->where('id', $id)->delete();
        }
    }
}