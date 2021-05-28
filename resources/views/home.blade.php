@extends('layouts.app')

@section('content')
    <h1>home ne`</h1>
    @if(auth('web')->user()->role === \App\Models\User::ROLE_SELLER)
        <h3>da la` nguoi ban' roi`</h3>
    @else
        @if(!auth('web')->user()->sellerRequest)
            <form method="post" action="{{ route('requests.store') }}">
                @csrf
                <button type="submit" class="btn btn-primary">dang ky ban ne`</button>
            </form>
        @else
            <h3>request dang {{ auth('web')->user()->sellerRequest->status }}</h3>
        @endif
    @endif
@endsection
