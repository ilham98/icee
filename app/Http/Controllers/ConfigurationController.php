<?php

namespace App\Http\Controllers;

use App\Configuration;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{
    public function index() {
    	$configuration = Configuration::first();
    	return view('admin.pages.configurations', compact('configuration'));
    }

    public function store(Request $request) {
    	$configuration = Configuration::first();
    	$body = $request->all();
    	$configuration->update($body);
    	return redirect('/configurations')->with('edit-success', 'success');;
    }
}
