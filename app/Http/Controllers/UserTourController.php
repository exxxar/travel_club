<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserTourStoreRequest;
use App\Http\Requests\UserTourUpdateRequest;
use App\Http\Resources\UserTour as UserTourResource;
use App\Http\Resources\UserTourCollection;
use App\UserTour;
use Illuminate\Http\Request;

class UserTourController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\UserTourCollection
     */
    public function index(Request $request)
    {
        $userTours = UserTour::all();

        return new UserTourCollection($userTours);
    }

    /**
     * @param \App\Http\Requests\UserTourStoreRequest $request
     * @return \App\Http\Resources\UserTour
     */
    public function store(UserTourStoreRequest $request)
    {
        $userTour = UserTour::create($request->all());

        return new UserTourResource($userTour);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\UserTour $userTour
     * @return \App\Http\Resources\UserTour
     */
    public function show(Request $request, UserTour $userTour)
    {
        return new UserTourResource($userTour);
    }

    /**
     * @param \App\Http\Requests\UserTourUpdateRequest $request
     * @param \App\UserTour $userTour
     * @return \App\Http\Resources\UserTour
     */
    public function update(UserTourUpdateRequest $request, UserTour $userTour)
    {
        $userTour->update($request->validated());

        return new UserTourResource($userTour);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\UserTour $userTour
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, UserTour $userTour)
    {
        $userTour->delete();

        return response()->noContent(200);
    }
}
