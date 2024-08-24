@extends('layout.navbar')

@section('title', 'Request')
@section('activeRequest', 'active')

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container mt-5">
        <h2 class="text-center mb-4">Friend Requests</h2>
        <div class="row">
            @foreach ($friendRequest as $user)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 border-0 shadow-sm rounded-3">
                        <div class="position-relative">
                            <img src="{{ asset('storage/' . $user->profile_path) }}" alt="{{ $user->name }}'s profile"
                                class="card-img-top rounded-top-3" style="height: 230px; object-fit: cover;">
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold">{{ $user->name }}</h5>
                            <p class="card-text text-muted">{{ $user->hobby }}</p>
                            <div class="d-flex justify-content-around mt-3">
                                <form method="POST" action="{{ route('friend.store') }}">
                                    @csrf
                                    <input type="hidden" name="request_id" value="{{ $user->request_id }}">
                                    <input type="hidden" name="friend_id" value="{{ $user->id }}">
                                    <button type="submit" class="btn btn-success btn-sm px-4">Accept</button>
                                </form>
                                <form method="POST" action="{{ route('friend-request.destroy', $user->request_id) }}">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm px-4">Decline</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
