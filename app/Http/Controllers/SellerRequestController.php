<?php

namespace App\Http\Controllers;

use App\Models\SellerRequest;
use App\Models\User;
use Illuminate\Http\Request;

class SellerRequestController extends Controller
{
    public function index()
    {
        $requests = SellerRequest::paginate(10);

        return view('request.index', compact('requests'));
    }

    public function store(Request $request)
    {
        $data = [
            'user_id' => auth('web')->id(),
        ];
        SellerRequest::create($data);

        return redirect()->back();
    }

    public function update(Request $request, SellerRequest $sellerRequest)
    {
        if ($request->status === SellerRequest::STATUS_ACCEPTED) {
            $user = $sellerRequest->user;
            $user->update([
                'role' => User::ROLE_SELLER,
            ]);
            $sellerRequest->delete();
        } else {
            $sellerRequest->update([
                'status' => SellerRequest::STATUS_REJECTED,
            ]);
        }

        return redirect()->back();
    }
}
