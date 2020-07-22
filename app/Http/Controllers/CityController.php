<?php

namespace App\Http\Controllers;

use App\City;
use App\Http\Requests\CityStoreRequest;
use App\Http\Requests\CityUpdateRequest;
use App\Http\Resources\City as CityResource;
use App\Http\Resources\CityCollection;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\CityCollection
     */
    public function index(Request $request)
    {
        $cities = City::all();

        return new CityCollection($cities);
    }

    /**
     * @param \App\Http\Requests\CityStoreRequest $request
     * @return \App\Http\Resources\City
     */
    public function store(CityStoreRequest $request)
    {
        $city = City::create($request->all());

        return new CityResource($city);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\City $city
     * @return \App\Http\Resources\City
     */
    public function show(Request $request, City $city)
    {
        return new CityResource($city);
    }

    /**
     * @param \App\Http\Requests\CityUpdateRequest $request
     * @param \App\City $city
     * @return \App\Http\Resources\City
     */
    public function update(CityUpdateRequest $request, City $city)
    {
        $city->update($request->validated());

        return new CityResource($city);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\City $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, City $city)
    {
        $city->delete();

        return response()->noContent(200);
    }
}
