<?php

namespace App\Http\Controllers;

use App\Models\Monitorings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MonitoringController extends Controller
{
    public function index()
    {


        return view('content.index', [
        "monitorings" => Monitorings::latest()->filter(request(['search']))->get()
       ]);
    }

    public function create()
    {
        return view('content.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'client' => 'required|max:255',
            'name' => 'required|max:255',
            'email' => 'required|email:dns|max:255',
            'image' => 'required|max:255',
            'start_date' => 'required',
            'end_date' => 'required',
            'progress' => 'required|max:100'
        ]);

        $file = $request->file('image');
        $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();

        Storage::disk('local')->put('public/' . $path, file_get_contents($file));

        Monitorings::create([
            'title' => $request->title,
            'client' => $request->client,
            'name' => $request->name,
            'email' => $request->email,
            'image' => $path,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'progress' => $request->progress
        ]);

        return redirect(route('index'))->with('success', 'Add new monitoring success !!');
    }

    public function edit (Monitorings $monitorings)
    {
        return view('content.edit', compact('monitorings'));
    }

    public function update(Request $request, Monitorings $monitorings)
    {
        $rules = [
            'title' => 'required|max:255',
            'client' => 'required|max:255',
            'name' => 'required|max:255',
            'email' => 'required|email:dns|max:255',
            'image' => 'required|max:255',
            'start_date' => 'required',
            'end_date' => 'required',
            'progress' => 'required|max:100'
        ];

        $validateData = $request->validate($rules);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $validateData['image'] = $file = $request->file('image');
            $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();

            Storage::disk('local')->put('public/' . $path, file_get_contents($file));

            $monitorings->update([
                'title' => $request->title,
                'client' => $request->client,
                'name' => $request->name,
                'email' => $request->email,
                'image' => $path,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'progress' => $request->progress
            ]);

            return redirect(route('index'))->with('update_success', 'Update monitoring success !!');
        }
    }

    public function delete(Monitorings $monitorings)
    {
        $monitorings->delete();
        return redirect(route('index'))->with('delete_success', 'Delete monitoring success !!');

    }

}

