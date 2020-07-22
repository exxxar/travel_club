<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserTicketStoreRequest;
use App\Http\Requests\UserTicketUpdateRequest;
use App\Http\Resources\UserTicket as UserTicketResource;
use App\Http\Resources\UserTicketCollection;
use App\UserTicket;
use Illuminate\Http\Request;

class UserTicketController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\UserTicketCollection
     */
    public function index(Request $request)
    {
        $userTickets = UserTicket::all();

        return new UserTicketCollection($userTickets);
    }

    /**
     * @param \App\Http\Requests\UserTicketStoreRequest $request
     * @return \App\Http\Resources\UserTicket
     */
    public function store(UserTicketStoreRequest $request)
    {
        $userTicket = UserTicket::create($request->all());

        return new UserTicketResource($userTicket);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\UserTicket $userTicket
     * @return \App\Http\Resources\UserTicket
     */
    public function show(Request $request, UserTicket $userTicket)
    {
        return new UserTicketResource($userTicket);
    }

    /**
     * @param \App\Http\Requests\UserTicketUpdateRequest $request
     * @param \App\UserTicket $userTicket
     * @return \App\Http\Resources\UserTicket
     */
    public function update(UserTicketUpdateRequest $request, UserTicket $userTicket)
    {
        $userTicket->update($request->validated());

        return new UserTicketResource($userTicket);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\UserTicket $userTicket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, UserTicket $userTicket)
    {
        $userTicket->delete();

        return response()->noContent(200);
    }
}
