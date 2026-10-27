<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate; // Importar o Gate

class EmployerController extends Controller
{
    // O construtor foi removido daqui!

    public function create() {
        // Verifica se o utilizador pode criar. Se não puder, dá erro 403 automaticamente.
        #Gate::authorize('create-employer');

        return view('Employer.create');
    }

    public function store(Request $request) {
        // Protege também o envio do formulário
        #Gate::authorize('create-employer');

        auth()->user()->employer()->create(
            $request->validate([
                'company_name' => 'required|min:3|unique:employers,company_name'
            ])
        );

        return redirect()->route('jobs.index')
            ->with('success', 'Your employer account was created!');
    }
}
