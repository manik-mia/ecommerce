<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use App\Models\State;
use Illuminate\Http\Request;

class ShippingAreaController extends Controller
{
    // Show All Divisions
    public function indexDivision()
    {
        $divisions = Division::orderBy( 'name', 'ASC' )->get();
        return view( 'admin.shipping-area.division.index', compact( 'divisions' ) );
    }
    // Store New Division
    public function storeDivision( Request $request )
    {
        $request->validate( [
            'name' => 'required',
        ] );
        $division = Division::create( [
            'name' => $request->name,
        ] );
        if ( $division )
        {
            return redirect()->back()->withSuccess( 'Division Added Successfully' );
        }
        else
        {
            return redirect()->back()->withError( 'Division Add Fail' );
        }
    }
    // Edit Division
    public function editDivision( $id )
    {
        $division = Division::findOrFail( $id );
        return view( 'admin.shipping-area.division.edit-division', compact( 'division' ) );
    }
    // Update Division
    public function updateDivision( Request $request, $id )
    {
        $request->validate( [
            'name' => 'required',
        ] );
        $division = Division::findOrFail( $id )->update( [
            'name' => $request->name,
        ] );
        if ( $division )
        {
            return redirect()->route( 'shipping.division' )->withSuccess( 'Division Added Successfully' );
        }
        else
        {
            return redirect()->back()->withError( 'Division Add Fail' );
        }
    }
    // Delete Division
    public function deleteDivision( $id )
    {
        $division = Division::findOrFail( $id )->delete();
        if ( $division )
        {
            return redirect()->back()->withSuccess( 'Division Deleted Successfully' );
        }
        else
        {
            return redirect()->back()->withError( 'Division Delete Fail' );
        }
    }
    //Division End

    //District Start

    //Show All Districts
    public function indexDistrict()
    {
        $divisions = Division::orderBy( 'name', 'ASC' )->get();
        $districts = District::orderBy( 'name', 'ASC' )->with( 'division' )->get();
        return view( 'admin.shipping-area.district.index', compact( 'districts', 'divisions' ) );
    }
    //New District store
    public function storeDistrict( Request $request )
    {
        $request->validate( [
            'name'        => 'required',
            'division_id' => 'required',
        ], [
            'name.required'        => 'Enter A District Name',
            'division_id.required' => 'Please Select A Division',
        ] );
        $district = District::create( [
            'name'        => $request->name,
            'division_id' => $request->division_id,
        ] );
        if ( $district )
        {
            return redirect()->back()->withSuccess( 'District Added Successfully' );
        }
        else
        {
            return redirect()->back()->withError( 'District Add Fail' );
        }
    }
    //Edit District
    public function editDistrict( $id )
    {
        $divisions = Division::orderBy( 'name', 'ASC' )->get();
        $district  = District::findOrFail( $id );
        return view( 'admin.shipping-area.district.edit-district', compact( 'district', 'divisions' ) );
    }
    //Update District
    public function updateDistrict( Request $request, $id )
    {
        $request->validate( [
            'name'        => 'required',
            'division_id' => 'required',
        ], [
            'name.required'        => 'Enter A District Name',
            'division_id.required' => 'Please Select A Division',
        ] );
        $district = District::findOrFail( $id )->update( [
            'name'        => $request->name,
            'division_id' => $request->division_id,
        ] );
        if ( $district )
        {
            return redirect()->route( 'shipping.district' )->withSuccess( 'District Updated Successfully' );
        }
        else
        {
            return redirect()->back()->withError( 'District Update Fail' );
        }
    }
    //Delete District
    public function deleteDistrict( $id )
    {
        $district = District::findOrFail( $id )->delete();
        if ( $district )
        {
            return redirect()->back()->withSuccess( 'District Deleted Successfully' );
        }
        else
        {
            return redirect()->back()->withError( 'District Delete Fail' );
        }
    }
    //Discrict End

    //State Start

    //Show All States
    public function indexState()
    {
        $states    = State::orderBy( 'name', 'ASC' )->with( 'district', 'division' )->get();
        $divisions = Division::orderBy( 'name', 'ASC' )->get();
        return view( 'admin.shipping-area.state.index', compact( 'states', 'divisions' ) );
    }
    // Store State
    public function storeState( Request $request )
    {
        $request->validate( [
            'name'        => 'required',
            'division_id' => 'required',
            'district_id' => 'required',
        ] );
        $state = State::create( [
            'name'        => $request->name,
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
        ] );
        if ( $state )
        {
            return redirect()->back()->withSuccess( 'State Added Successfully' );
        }
        else
        {
            return redirect()->back()->withError( 'State Add Fail' );
        }
    }
    public function editState( $id )
    {
        $state     = State::with( 'district' )->findOrFail( $id );
        $divisions = Division::orderBy( 'name', 'ASC' )->get();
        return view( 'admin.shipping-area.state.edit-state', compact( 'state', 'divisions' ) );
    }

    public function updateState( Request $request, $id )
    {
        $request->validate( [
            'name'        => 'required',
            'division_id' => 'required',
            'district_id' => 'required',
        ] );
        $district = State::findOrFail( $id )->update( [
            'name'        => $request->name,
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
        ] );
        if ( $district )
        {
            return redirect()->route( 'shipping.state' )->withSuccess( 'State Updated Successfully' );
        }
        else
        {
            return redirect()->back()->withError( 'State Update Fail' );
        }
    }
    //End State

    //Axios Request For  District
    public function getDistrict( $id )
    {
        $allDistricts = District::where( 'division_id', $id )->orderBy( 'name', 'ASC' )->get();
        return json_encode( $allDistricts );
    }
}
