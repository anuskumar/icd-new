<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function category()
    {
        $page_data['menu'] = 'category';
        return view('admin_panel.category')->with($page_data);
    }

    public function get_category()
    {
        $users = Category::orderBy('id', 'desc');
        return datatables()->eloquent($users)
            ->addIndexColumn()
            ->editColumn('status', function ($d) {
                return $d->status == 1 ? '<span class="bg-lightgreen badges">Active</span>' : '<span class="bg-lightred badges">Inactive</span>';
            })
            ->addColumn('action', function ($d) {
                $editUrl = asset('admin_assets/assets/img/icons/edit.svg');
                $deleteUrl = asset('admin_assets/assets/img/icons/delete.svg');

                $details = '<a class="me-3" href="' . route('admin_panel.manage-category', $d->id) . '"><img src="' . $editUrl . '" alt="img"></a>';
                $details .= '<a href="javascript:void(0)" data-toggle="modal" data-target="#delete_modal" title="Delete" onclick="delete_confirm(\'/del-category/' . $d->id . '\')"><img src="' . $deleteUrl . '" alt="img"></a>';
                return $details;
            })
            ->rawColumns(['status', 'action'])

            ->make(true);
    }

    public function manageCategory(Request $req,$id='')
    {
    	if($_POST)
    	{
    		if ($req->post('id') == '') {
                $data = new Category;
              } else {
                $data = Category::find($req->post('id'));
            }

    		$data->name = $req->post('name');
    		$data->status = $req->post('status');

    		$data->save();
    		if ($req->post('id')) {
            	return redirect()->route('admin_panel.category')->with('success', 'Category updated successfully');
            } else {
                $admins = \App\Models\User::where('user_type', 'A')->get();
                \Illuminate\Support\Facades\Notification::send($admins, new \App\Notifications\NewCategoryNotification($data));
                return redirect()->route('admin_panel.category')->with('success', 'Category created successfully');
            }
    	}
    	if ($id) {
            $page_data['category'] = Category::find($id);
        }
    	$page_data['menu'] = 'category';
        return view('admin_panel.add_category')->with($page_data);
    }


    public function delCategory(Request $request, $id)
    {
        $data = Category::find($id);
        if ($data) {
            $data->delete();
            return Redirect::back()->with('success', 'Delete successfully!');
        } else {
            return Redirect::back()->with('error', 'Data Not Found');
        }
    }
}
