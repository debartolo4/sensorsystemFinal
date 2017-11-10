<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Sensor;
use App\Site;
use App\Transmission;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customers.addCustomer');
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
            'name' => 'required',
            'partita_IVA' => 'required|min:11|max:11|string',
        ]);
        $addCu = new Customer();
        $addCu->name = $request->get('name');
        $addCu->partita_IVA = $request->get('partita_IVA');
        $addCu->t_data = 0;
        $addCu->save();

        return redirect('/admin/corpManagers/addCorpManager')->with('success', 'Nuovo azienda cliente aggiunta con successo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);

        if(Auth::user()-> type == 1) {
            return view('admin.customers.showCustomer')->with('customer', $customer);
        } elseif (Auth::user()->type == 2) {
            return view('corpManager.customers.showCustomer')->with('customer', $customer);
        } else {
            return view('employee.customers.showCustomer')->with('customer', $customer);
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
        $customer = Customer::find($id);
        return view ('admin.customers.editCustomer')->with('customer', $customer);
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
        $addCu = Customer::find($id);
        $addCu->name = $request->get('name');
        $addCu->partita_IVA = $request->get('partita_IVA');

        $addCu->save();

        return redirect('admin/users')->with('success', 'Azienda cliente modificata con successo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        DB::delete('DELETE FROM users WHERE client_id = ' . $id . ';');
        DB::delete('DELETE FROM transmission_data WHERE client_id = ' . $id . ';');
        $sites = Site::all();
        $sensors = Sensor::all();
        $transmissions = Transmission::all();
        foreach ($sites as $site) {
            if ($site->client_id == $id) {
                foreach ($sensors as $sensor) {
                    if ($sensor->site_id == $site->id) {
                        foreach ($transmissions as $tr) {
                            if (substr($tr->trans_string, 8, 4) == $sensor->id) {
                                $tr->delete();
                            }
                        }
                        DB::delete('DELETE FROM sensors WHERE site_id = '.$site->id.';');
                    }
                }
            }
        }
        DB::delete('DELETE FROM sites WHERE client_id = '.$id.';');
        $customer->delete();

        return redirect('admin/users')->with('success', 'Azienda cliente rimossa con successo');
    }

    /**
     * Enable data transfer.
     *
     * @return \Illuminate\Http\Response
     */
    public function t_data()
    {
        $cust = Customer::find(Auth::user()->client_id);
        $cust->t_data = 1;
        $cust->save();
        return view('corpManager.home')->with('success','Il trasferimento automatico dei dati è stato abilitato');
    }

}

