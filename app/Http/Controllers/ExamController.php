<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Exam;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ExamController extends Controller
{
    public function exam_accepted()
    {
    	$page_data['menu'] = 'exam_accepted';
    	return view('admin_panel.exam_accepted')->with($page_data);
    }

    public function get_exam_accepted()
    {
        $users = Exam::orderBy('id','desc');
        return datatables()->eloquent($users)
        ->addIndexColumn()

        ->editColumn('s_paper', function($d) {
            $pdf_icon = asset('admin_assets/assets/img/icons/pdf.svg');
            
            if ($d->s_paper) {
                // Check if file exists in storage
                $fileExists = Storage::disk('public')->exists($d->s_paper);
                
                if ($fileExists) {
                    $url = asset('storage/' . $d->s_paper);
                    $details = '<a class="me-3" href="' . $url . '" target="_blank"><img src="' . $pdf_icon . '" alt="pdf-icon"></a>';
                } else {
                    // Try direct path if storage link check fails
                    $directPath = public_path('storage/' . $d->s_paper);
                    if (file_exists($directPath)) {
                        $url = asset('storage/' . $d->s_paper);
                        $details = '<a class="me-3" href="' . $url . '" target="_blank"><img src="' . $pdf_icon . '" alt="pdf-icon"></a>';
                    } else {
                        $details = '<span class="text-muted">N/A</span>';
                    }
                }
            } else {
                $details = '<span class="text-muted">N/A</span>';
            }

            return $details;
        })

        ->editColumn('guide', function($d) {
            $pdf_icon = asset('admin_assets/assets/img/icons/pdf.svg');
            
            if ($d->guide) {
                // Check if file exists in storage
                $fileExists = Storage::disk('public')->exists($d->guide);
                
                if ($fileExists) {
                    $url = asset('storage/' . $d->guide);
                    $details = '<a class="me-3" href="' . $url . '" target="_blank"><img src="' . $pdf_icon . '" alt="pdf-icon"></a>';
                } else {
                    // Try direct path if storage link check fails
                    $directPath = public_path('storage/' . $d->guide);
                    if (file_exists($directPath)) {
                        $url = asset('storage/' . $d->guide);
                        $details = '<a class="me-3" href="' . $url . '" target="_blank"><img src="' . $pdf_icon . '" alt="pdf-icon"></a>';
                    } else {
                        $details = '<span class="text-muted">N/A</span>';
                    }
                }
            } else {
                $details = '<span class="text-muted">N/A</span>';
            }

            return $details;
        })


        ->editColumn('status', function ($d) {
            return $d->status == 1 ? '<span class="bg-lightgreen badges">Active</span>' : '<span class="bg-lightred badges">Inactive</span>';
        })
        ->addColumn('action', function ($d) {
            $editUrl = asset('admin_assets/assets/img/icons/edit.svg');
            $deleteUrl = asset('admin_assets/assets/img/icons/delete.svg');

            $details = '<a class="me-3" href="'.route('admin_panel.manage-exam', base64_encode($d->id)).'"><img src="' . $editUrl . '" alt="img"></a>';
            $details .= '<a href="javascript:void(0)" data-toggle="modal" data-target="#delete_modal" title="Delete" onclick="delete_confirm(\'/del-exam/' . $d->id . '\')"><img src="' . $deleteUrl . '" alt="img"></a>';
            return $details;
        })
        ->rawColumns(['s_paper','guide','status','action'])

        ->make(true);
    }

    public function manageExam(Request $req, $id = '')
    {
        if($id){
            $id = base64_decode($id);
        }
        if ($req->isMethod('post')) {
            $data = $req->post('id') ? Exam::find($req->post('id')) : new Exam;

            $data->name = $req->post('name');
            $data->syllabus = $req->post('syllabus');
            $data->result = $req->post('result');
            $data->category_id = $req->post('category_id');
            $data->subcategory_id = $req->post('subcategory_id');
            $data->status = $req->post('status');
            $data->content = $req->post('content');

            if ($req->hasFile('s_paper')) {
                if ($data->s_paper && Storage::disk('public')->exists($data->s_paper)) {
                    Storage::disk('public')->delete($data->s_paper);
                }

                $s_paper = $req->file('s_paper');
                $s_paperPath = 'exam/' . uniqid() . '.' . $s_paper->getClientOriginalExtension();
                Storage::disk('public')->put($s_paperPath, file_get_contents($s_paper->getRealPath()));
                $data->s_paper = $s_paperPath;
            }

            if ($req->hasFile('guide')) {
                if ($data->guide && Storage::disk('public')->exists($data->guide)) {
                    Storage::disk('public')->delete($data->guide);
                }
                $guide = $req->file('guide');
                $guidePath = 'exam/' . uniqid() . '.' . $guide->getClientOriginalExtension();
                Storage::disk('public')->put($guidePath, file_get_contents($guide->getRealPath()));
                $data->guide = $guidePath;
            }
            $data->save();
            return redirect()->route('admin_panel.exam-accepted')
                             ->with('success', $req->post('id') ? 'Exam updated successfully' : 'Exam created successfully');
        }
        $page_data['exam_data'] = $id ? Exam::find($id) : null;
        $page_data['menu'] = 'exam_accepted';
        $page_data['category'] = Category::all();
        $page_data['subcategory'] = $id && $page_data['exam_data'] ? Subcategory::where('category_id', $page_data['exam_data']->category_id)->get() : collect();

        return view('admin_panel.add_exam')->with($page_data);
    }


    public function delExam(Request $request, $id)
    {
        $data = Exam::find($id);
        if ($data) {
            $data->delete();
            return Redirect::back()->with('success','Delete successfully!');
        } else {
            return Redirect::back()->with('error','Data Not Found');
        }
    }

    public function showExamBySubcategory($categoryId, $subcategoryId)
    {
        // Fetch the subcategory
        $subcategory = Subcategory::findOrFail($subcategoryId);

        // Fetch the courses associated with the category and subcategory
        $exam = exam::where('category_id', $categoryId)
                        ->where('subcategory_id', $subcategoryId)
                        ->get();

        // Pass the subcategory and courses to the view
        return view('website.web_exam_list', compact('subcategory', 'exam'));
    }
}
