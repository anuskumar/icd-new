<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SubcategoryController extends Controller
{
    public function subcategory()
    {
    	$page_data['menu'] = 'subcategory';
    	return view('admin_panel.subcategory')->with($page_data);
    }

    public function get_subcategory()
    {
        $users = Subcategory::orderBy('id','desc');
        return datatables()->eloquent($users)
        ->addIndexColumn()
        ->editColumn('status', function ($d) {
            return $d->status == 1 ? '<span class="bg-lightgreen badges">Active</span>' : '<span class="bg-lightred badges">Inactive</span>';
        })
        ->addColumn('action', function ($d) {
            $editUrl = asset('admin_assets/assets/img/icons/edit.svg');
            $deleteUrl = asset('admin_assets/assets/img/icons/delete.svg');

            $details = '<a class="me-3" href="'.route('admin_panel.manage-subcategory', $d->id).'"><img src="' . $editUrl . '" alt="img"></a>';
            $details .= '<a href="javascript:void(0)" data-toggle="modal" data-target="#delete_modal" title="Delete" onclick="delete_confirm(\'/del-category/' . $d->id . '\')"><img src="' . $deleteUrl . '" alt="img"></a>';
            return $details;
        })
        ->rawColumns(['status','action'])

        ->make(true);
    }

    public function manageSubcategory(Request $req, $id = '')
    {
        if ($req->isMethod('post')) {
            if ($req->post('id') == '') {
                $data = new Subcategory;
            } else {
                $data = Subcategory::find($req->post('id'));
            }

            $data->name = $req->post('name');
            $data->category_id = $req->post('category_id'); // The setCategoryIdAttribute will handle JSON encoding
            $data->rank = $req->post('rank');
            $data->status = $req->post('status');

            $data->save();

            if ($req->post('id')) {
                return redirect()->route('admin_panel.subcategory')->with('success', 'Subcategory updated successfully');
            } else {
                $admins = \App\Models\User::where('user_type', 'A')->get();
                \Illuminate\Support\Facades\Notification::send($admins, new \App\Notifications\NewSubcategoryNotification($data));
                return redirect()->route('admin_panel.subcategory')->with('success', 'Subcategory created successfully');
            }
        }

        if ($id) {
            $page_data['subcategory'] = Subcategory::find($id);
        }
        $usedRanks = Subcategory::where('id', '!=', $id)->pluck('rank')->toArray();
        info($usedRanks);

        $page_data['usedRanks'] = $usedRanks;
        $page_data['category'] = Category::all();
        $page_data['menu'] = 'subcategory';

        return view('admin_panel.add_subcategory')->with($page_data);
    }


    public function delSubcategory(Request $request, $id)
    {
        $data = Subcategory::find($id);
        if ($data) {
            $data->delete();
            return Redirect::back()->with('success','Delete successfully!');
        } else {
            return Redirect::back()->with('error','Data Not Found');
        }
    }
}
