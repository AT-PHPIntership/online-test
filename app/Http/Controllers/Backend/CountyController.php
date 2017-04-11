<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\CountyRequest;
use App\Http\Controllers\Controller;
use App\Repositories\CountyRepository as County;
use App\Repositories\CityRepository as City;

class CountyController extends Controller
{
    /**
     * County, City
     *
     * @var county
     * @var city
     */
    private $county;
    private $city;

    /**
     * Create a new CountyRepository instance.
     *
     * @param CountyRepository $county county
     * @param CityRepository   $city   city
     *
     * @return void
     */
    public function __construct(County $county, City $city)
    {
        $this->county = $county;
        $this->city = $city;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['counties'] = $this->county->all(['id', 'name', 'city_id']);
        return view('backend.county.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['cities'] = $this->city->all(['id', 'name'])->lists('name', 'id');
        return view('backend.county.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request\Backend\CountyRequest $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CountyRequest $request)
    {
        $result = $this->county->create($request->all());
        if ($result) {
            flash(trans('messages.create_county_successfull'), 'success');
        } else {
            flash(trans('messages.error_create_county'), 'danger');
        }
        return redirect()->route('admin.county.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['cities'] = $this->city->all(['id', 'name'])->lists('name', 'id');
        $data['county'] = $this->county->find($id, ['id', 'name', 'city_id']);
        return view('backend.county.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     * @param int                      $id      id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(CountyRequest $request, $id)
    {
        $data = $request->except('_method', '_token');
        $result = $this->county->update($data, $id);
        if ($result) {
            flash(trans('messages.edit_county_successfull'), 'success');
        } else {
            flash(trans('messages.error_edit_county'), 'danger');
        }
        return redirect()->route('admin.county.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id id city
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $business = $this->county->find($id)->businesses;
        if (count($business) > 0) {
            return trans('messages.not_allow_delete_county');
        }

        $result = $this->county->delete($id);
        if ($result) {
            return trans('messages.delete_county_successfull');
        } else {
            return trans('messages.error_delete_county');
        }
    }
}
