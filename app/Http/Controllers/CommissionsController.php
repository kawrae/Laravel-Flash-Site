<?php

namespace App\Http\Controllers;

use App\Models\CommissionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CommissionsController extends Controller
{
    public function create()
    {
        return view('pages.commissions');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'            => ['required', 'string', 'max:120'],
            'email'           => ['required', 'email', 'max:160'],
            'instagram'       => ['nullable', 'string', 'max:160'],
            'budget'          => ['nullable', 'string', 'max:60'],
            'placement'       => ['nullable', 'string', 'max:120'],
            'size'            => ['nullable', 'string', 'max:60'],
            'preferred_dates' => ['nullable', 'string', 'max:160'],
            'description'     => ['required', 'string', 'max:5000'],
            'agree'           => ['accepted'],
            'images'          => ['nullable', 'array', 'max:5'],
            'images.*'        => ['file', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ]);

        $req = CommissionRequest::create([
            'name'            => $data['name'],
            'email'           => $data['email'],
            'instagram'       => $data['instagram'] ?? null,
            'budget'          => $data['budget'] ?? null,
            'placement'       => $data['placement'] ?? null,
            'size'            => $data['size'] ?? null,
            'preferred_dates' => $data['preferred_dates'] ?? null,
            'description'     => $data['description'],
        ]);

        $paths = [];
        if (!empty($data['images'])) {
            foreach ($data['images'] as $file) {
                $paths[] = $file->store('commissions/'.$req->id, 'public');
            }
        }

        if ($paths) {
            $req->update(['image_paths' => json_encode($paths)]);
        }


        return back()->with('status', 'Thanks! Your request has been received — I’ll be in touch soon.');
    }
}
