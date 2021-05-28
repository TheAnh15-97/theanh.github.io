@extends('layouts.app')

@section('content')
    <h1>request ne`</h1>
    <table class="table table-striped">
        <thead class="table-dark">
        <tr>
            <th>email</th>
            <th>status</th>
            <th>action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($requests as $request)
            <tr>
                <td>{{ $request->user->email }}</td>
                <td>{{ $request->status }}</td>
                <td>
                    @if($request->status === \App\Models\SellerRequest::STATUS_PENDING)
                        <form action="{{ route('requests.update', $request->id) }}" method="post">
                            @method('put')
                            @csrf
                            <button class="btn btn-primary" name="status"
                                    value="{{ \App\Models\SellerRequest::STATUS_ACCEPTED }}">accept
                            </button>
                            <button class="btn btn-secondary" name="status"
                                    value="{{ \App\Models\SellerRequest::STATUS_REJECTED }}">reject
                            </button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
