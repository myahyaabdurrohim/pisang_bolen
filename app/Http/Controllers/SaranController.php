<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Saran;
use Illuminate\View\View;

class SaranController extends Controller
{
    public function index(): View
    {
        
        $saran = Saran::latest()->get();
        return view('admin.saran.saranList', compact('saran'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // 'name' => 'required|string|max:255',
            // 'email' => 'required|string|email|max:255',
            'saran' => 'required'
        ]);

        Saran::create($validatedData);
        return redirect()->back()->with('success', 'Pesan Anda telah terkirim.');
    }
}
