<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CommissionRequest;
use Illuminate\Http\Request;

class CommissionController extends Controller
{
    public function index()
    {
        $requests = CommissionRequest::orderBy('created_at', 'desc')->paginate(20);

        return view('admin.commissions.index', compact('requests'));
    }

    public function show(CommissionRequest $commission)
    {
        return view('admin.commissions.show', [
            'commission' => $commission,
        ]);
    }

    public function update(Request $request, CommissionRequest $commission)
    {
        if ($request->input('action') === 'delete') {
            $commission->delete();

            return redirect()
                ->route('admin.commissions.index')
                ->with('status', 'Commission deleted.');
        }

        $validated = $request->validate([
            'status'      => ['required', 'in:new,in_progress,completed,cancelled'],
            'admin_notes' => ['nullable', 'string'],
        ]);

        $commission->update($validated);

        return back()->with('status', 'Commission updated.');
    }
}
