<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use App\Models\Category;
use App\Models\College;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdmissionController extends Controller
{
    public function admission()
    {
    	$page_data['menu'] = 'admission';
    	return view('admin_panel.admission')->with($page_data);
    }

    public function get_admission()
    {
        $users = Admission::orderBy('id','desc');
        return datatables()->eloquent($users)
        ->addIndexColumn()
        ->editColumn('category_id', function ($d) {
            return $d->category ? $d->category->name : 'N/A';
        })
        ->editColumn('college_id', function ($d) {
            return $d->college ? $d->college->name : 'N/A';
        })
        ->editColumn('course_id', function ($d) {
            return $d->course ? $d->course->name : 'N/A';
        })
        ->editColumn('status', function ($d) {
            return $d->status == 1 ? '<span class="bg-lightgreen badges">Active</span>' : '<span class="bg-lightred badges">Inactive</span>';
        })
        ->addColumn('action', function ($d) {
            $editUrl = asset('admin_assets/assets/img/icons/edit.svg');
            $deleteUrl = asset('admin_assets/assets/img/icons/delete.svg');

            $details = '<a class="me-3" href="'.route('admin_panel.manage-admission', $d->id).'"><img src="' . $editUrl . '" alt="img"></a>';
            $details .= '<a href="javascript:void(0)" data-toggle="modal" data-target="#delete_modal" title="Delete" onclick="delete_confirm(\'/del-admission/' . $d->id . '\')"><img src="' . $deleteUrl . '" alt="img"></a>';
            return $details;
        })
        ->rawColumns(['category_id','college_id','course_id','status','action'])

        ->make(true);
    }

    public function manageAdmission(Request $req,$id='')
    {
    	if($_POST)
  		{
  			if ($req->post('id') == '') {
	            $data = new Admission;
	          } else {
	            $data = Admission::find($req->post('id'));
	        }

			$data->category_id = $req->post('category_id');
			$data->course_id = $req->post('course_id');
			$data->college_id = $req->post('college_id');
			$data->status = $req->post('status');
			$data->content = $req->post('content');

			$data->save();
			if ($req->post('id')) {
            	return redirect()->route('admin_panel.admission')->with('success', 'Admission updated successfully');
	        } else {
                $admins = \App\Models\User::where('user_type', 'A')->get();
                \Illuminate\Support\Facades\Notification::send($admins, new \App\Notifications\NewAdmissionNotification($data));
	            return redirect()->route('admin_panel.admission')->with('success', 'Admission created successfully');
	        }
  		}
  		if ($id) {
	        $page_data['admission'] = Admission::find($id);
	    }
		$page_data['menu'] = 'admission';
        $page_data['category'] = Category::get();
        $page_data['course'] = Course::get();
        $page_data['college'] = College::get();
	    return view('admin_panel.add_admission')->with($page_data);
    }


    public function delAdmission(Request $request, $id)
    {
        $data = Admission::find($id);
        if ($data) {
            $data->delete();
            return Redirect::back()->with('success','Delete successfully!');
        } else {
            return Redirect::back()->with('error','Data Not Found');
        }
    }
}
