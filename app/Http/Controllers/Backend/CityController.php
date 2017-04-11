<?php
namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\CityRequest;
use App\Repositories\CityRepository as City;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    /**
     * City
     *
     * @var City
     */
    private $city;
    
    /**
     * Create a new CityRepository instance.
     *
     * @param CityRepository $city city
     *
     * @return void
     */
    public function __construct(City $city)
    {
        $this->city = $city;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['cities'] = $this->city->all();
        return view('backend.city.index')->with($data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.city.create');
    }

    /**
     * Show the form for edit and edit name city.
     *
     * @param \Illuminate\Http\Request $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['city'] = $this->city->find($id);
        if (empty($data['city'])) {
            flash(trans('messages.error_not_found'), 'danger');
            return back();
        }
        return view('backend.city.edit')->with($data);
    }

    /**
     * Update the form when click edit button.
     *
     * @param \Illuminate\Http\Request $request request
     * @param \Illuminate\Http\Request $id      id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(CityRequest $request, $id)
    {
        $data = $request->except('_method', '_token');
        $result = $this->city->update($data, $id);
        if ($result) {
            flash(trans('messages.create_city_successfully'), 'success');
        } else {
            flash(trans('messages.error_create_city'), 'danger');
        }
        return redirect()->route('admin.city.index');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
        $result = $this->city->create($request->all());
        if ($result) {
            flash(trans('messages.create_city_successfully'), 'success');
        } else {
            flash(trans('messages.error_create_city'), 'danger');
        }
        return redirect()->route('admin.city.index');
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
        $cate = $this->city->find($id);
        if (empty($cate)) {
            return trans('messages.error_not_found');
        }
        
        $business = $this->city->find($id)->businesses;
        if (count($business) > 0) {
            return trans('messages.not_allow_delete_county');
        }
        
        $result = $this->city->delete($id);
        if ($result) {
            return trans('messages.delete_city_successfully');
        }
        return trans('messages.error_delete_city');
    }
}
