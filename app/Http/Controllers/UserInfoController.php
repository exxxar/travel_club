<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserInfoStoreRequest;
use App\Http\Requests\UserInfoUpdateRequest;
use App\Http\Resources\UserInfo as UserInfoResource;
use App\Http\Resources\UserInfoCollection;
use App\UserInfo;
use Illuminate\Http\Request;

class UserInfoController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\UserInfoCollection
     */
    public function index(Request $request)
    {
        $userInfos = UserInfo::all();

        return new UserInfoCollection($userInfos);
    }

    /**
     * @param \App\Http\Requests\UserInfoStoreRequest $request
     * @return \App\Http\Resources\UserInfo
     */
    public function store(UserInfoStoreRequest $request)
    {
        $userInfo = UserInfo::create($request->all());

        return new UserInfoResource($userInfo);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\UserInfo $userInfo
     * @return \App\Http\Resources\UserInfo
     */
    public function show(Request $request, UserInfo $userInfo)
    {
        return new UserInfoResource($userInfo);
    }

    /**
     * @param \App\Http\Requests\UserInfoUpdateRequest $request
     * @param \App\UserInfo $userInfo
     * @return \App\Http\Resources\UserInfo
     */
    public function update(UserInfoUpdateRequest $request, UserInfo $userInfo)
    {
        $userInfo->update($request->validated());

        return new UserInfoResource($userInfo);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\UserInfo $userInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, UserInfo $userInfo)
    {
        $userInfo->delete();

        return response()->noContent(200);
    }
}
