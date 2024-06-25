<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Finance;

// use App\Models\Customers;

/**
 * DashboardController
 */
class DashboardController extends \App\Http\Controllers\Controller
{
    
    /**
     * Method index
     *
     * @return string|null
     */
    public function index()
    {
        $finance = Finance::all();

        return view('admin.dashboard.index', [
            'finance' => $finance
        ]);
    }

    /**
     * Method addOrUpdate
     *
     * @param int|string|null $id
     *
     * @return string|null
     */
    public function addOrUpdate($id = null)
    {
        try {

            if ($id != null) {
                $financeSelected = Finance::find($id);

                return view('admin.dashboard.edit', [
                    'financeSelected' => $financeSelected
                ]);
            }

            return view('admin.dashboard.edit');
        } catch (\Exception $e) {
            \Log::error('Add/Edit Finance :: ' . $e->getMessage());
            return Redirect(route('dashboard'));
        }
    }

    /**
     * Method save
     *
     * @param Request $request
     *
     * @return string|null
     */
    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'trans_name' => ['required', 'string'],
            'amount' => 'required|numeric',
            'status' => ['required', 'string']
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $finance = ($request->id) ? Finance::find($request->id) : new Finance;
            $finance->trans_name = $request->trans_name;
            $finance->amount = $request->amount;
            $finance->status = $request->status;
           
            if ($finance->save()) {
                return redirect(route('dashboard'))
                    ->with('success', ($request->id) ? 'Successfully Edit Finance.' : 'Successfully Add Finance.');
            }
        } catch (\Exception $e) {
            \Log::error('Save Finance :: ' . $e->getMessage());
            return redirect(route('dashboard.add'))
                ->with('error', ($request->id) ? 'Something went wrong. Failed to edit finance!' : 'Something went wrong. Failed to add finance!');
        }
    }

    /**
     * Method delete
     *
     * @param int|string $id
     *
     * @return string|null
     */
    public function delete($id)
    {
        $finance = Finance::find($id);

        try {
            if ($finance->delete()) {
                return redirect(route('dashboard'))->with('success', 'Successfully delete finance.');
            }
        } catch (\Exception $e) {
            \Log::error('Delete Finance :: ' . $e->getMessage());
        }
        
        return redirect(route('dashboard'))->with('error', 'Failed delete finance.');
    }
    
}
