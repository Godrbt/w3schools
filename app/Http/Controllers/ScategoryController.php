<?php

namespace App\Http\Controllers;

use App\Models\Scategory;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;

use Illuminate\Validation\Rule;

class ScategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $scategories = Scategory::where('parent_id',null)->orderby('title','asc')->get();

        return view('backend.scategory.index',compact('scategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $scategories = Scategory::where('parent_id',null)->orderby('title','asc')->get();
        return view('backend.scategory.create',compact('scategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:scategories',
            'parent_id' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
            'status' => 'nullable',
        ]);

        $data['status'] = $request->status ?? 0;



        // Inside your image upload logic:
        if ($request->hasFile('image')) {
            $imageName = uniqid() . '.' . strtolower($request->image->getClientOriginalExtension());
            $request->image->move(public_path('uploads/images/scategory/'), $imageName);
            $data['image'] = $imageName;  // Store the relative path in the database
        }


        Scategory::create($data);
        return redirect()->back()->with('success','Course has been created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Scategory $scategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Scategory $scategory)
    {
        $scategory = Scategory::whereId($scategory->id)->first();

        $categories = Scategory::where('parent_id', null)->where('id', '!=', $scategory->id)->orderby('title', 'asc')->get();

        return view('backend.scategory.edit',compact('scategory','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Scategory $scategory)
    {

        $data = $request->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('scategories')->ignore($scategory->id)],
            'parent_id' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
            'status' => 'nullable',
        ]);

        $data['status'] = $request->status ?? 0;

        if($request->hasFile('image'))
        {

            $destination = public_path('uploads/images/scategory/') . $scategory->image;

            if(\File::exists($destination))
             {
                 \File::delete($destination);
             }

            $imageName = uniqid().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads/images/scategory/'),$imageName);
            $data['image'] = $imageName;
        }



        if($request->title != $scategory->title || $request->parent_id != $scategory->parent_id)
            {
                if(isset($request->parent_id))
                {
                    $checkDuplicate = Scategory::where('title', $request->title)->where('parent_id', $request->parent_id)->first();
                    if($checkDuplicate)
                    {
                        return redirect()->back()->with('error', 'Category already exist in this parent.');
                    }
                }
                else
                {
                    $checkDuplicate = Scategory::where('title', $request->title)->where('parent_id', null)->first();
                    if($checkDuplicate)
                    {
                        return redirect()->back()->with('error', 'Category already exist with this name.');
                    }
                }
            }

            $scategory->update($data);

        // $scategory->title = $request->title;
        // $scategory->parent_id = $request->parent_id;
        // $scategory->slug = $request->slug;
        // $scategory->save();

        return redirect()->route('scategory.index')->with('success','Service Category updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Scategory $scategory)
    {
        // $scategory = Scategory::with('services')->findOrFail($scategory->id);
        if($scategory->services->count())
        {
            return back()->withErrors('Already linked to topics, could not be deleted!');
        }
        //dd($scategory->toArray());

        //delete image
        if($scategory->image)
        {
            $destination = public_path('uploads/images/scategory/').$scategory->image;
            if(\File::exists($destination))
            {
                \File::delete($destination);
            }
        }

        if(count($scategory->subcategory))
        {
            $subcategories = $scategory->subcategory;

            foreach($subcategories as $cat)
            {
                $cat = Scategory::findOrFail($cat->id);
                $cat->parent_id = null;
                $cat->save();
            }
        }

        //foreign keys lets add categories to pivot table
        $services = $scategory->services;
        $scategory->services()->detach();
        $scategory->delete();
        return redirect()->back()->with('success', 'Service Category has been deleted successfully.');
    }
}
