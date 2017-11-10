<?php

namespace App\Http\Controllers;

use App\Sensor;
use App\Site;
use App\Transmission;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->type == 1) {
            return view('admin.sites.addSite');
        } else {
            return view('corpManager.sites.addSite');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'address' => 'required|string|max:255',
            'num' => 'required|string|max:5',
            'city' => 'required|string|max:265',
            'province' => 'required|string|max:2',
        ]);

        $site = new Site();
        $site->name =  $request->get('name');
        $site->description = $request->get('description');
        $site->address = $request->get('address');
        $site->num = $request->get('num');
        $site->city = $request->get('city');
        $site->province = $request->get('province');
        if(Auth::user()->type == 1) {
            $site->client_id = $request->get('client_id');
        } else {
            $site->client_id = Auth::user()->client_id;
        }
        $site->save();

        if(Auth::user()->type == 1) {
            return redirect('/admin/sites')->with('success', 'Nuovo sito aggiunto con successo');
        } else {
            return redirect('/corpManager/sites')->with('success', 'Nuovo sito aggiunto con successo');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $site = Site::find($id);

        if(Auth::user()-> type == 1) {
            return view('admin.sites.showSite')->with('site', $site);
        } elseif (Auth::user()->type == 2) {
            return view('corpManager.sites.showSite')->with('site', $site);
        } else {
            return view('employee.sites.showSite')->with('site', $site);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $site = Site::find($id);
        if(Auth::user()->type == 1) {
            return view ('admin.sites.editSite')->with('site', $site);
        } else {
            return view ('corpManager.sites.editSite')->with('site', $site);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'address' => 'required|string|max:255',
            'num' => 'required|string|max:5',
            'city' => 'required|string|max:265',
            'province' => 'required|string|max:2',
        ]);

        $site = Site::find($id);
        $site->name =  $request->get('name');
        $site->description = $request->get('description');
        $site->address = $request->get('address');
        $site->num = $request->get('num');
        $site->city = $request->get('city');
        $site->province = $request->get('province');

        $site->save();

        if(Auth::user()->type == 1) {
            return redirect('/admin/sites')->with('success', 'Sito modificato con successo');
        } else {
            return redirect('/corpManager/sites')->with('success', 'Sito modificato con successo');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $site = Site::find($id);
        DB::delete('DELETE FROM transmission_data WHERE site_id = ' . $id . ';');
        $sensors = Sensor::all();
        $transmissions = Transmission::all();
        foreach ($sensors as $sensor) {
            if ($sensor->site_id == $id){
                foreach ($transmissions as $tr) {
                    if (substr($tr->trans_string, 8, 4) == $sensor->id) {
                        $tr->delete();
                    }
                }
            }
        }
        DB::delete('DELETE FROM sensors WHERE site_id = ' . $id . ';');
        $site->delete();

        if(Auth::user()->type == 1) {
            return redirect('admin/sites')->with('success', 'Sito rimosso con successo');
        } else {
            return redirect('corpManager/sites')->with('success', 'Sito rimosso con successo');
        }
    }
}
