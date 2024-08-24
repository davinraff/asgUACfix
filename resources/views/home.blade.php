@extends('layout.navbar')

@section('title', 'Home')
@section('activeHome', 'active')

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container mt-4">
        <h2 class="text-center mb-4">Your Notifications</h2>
        <div class="p-4 bg-light rounded-3 shadow-sm">
            @if(Auth::user()->notifications->isEmpty())
                <p class="text-center text-muted">You have no new notifications</p>
            @else
                <ul class="list-group">
                    @foreach (Auth::user()->notifications as $notification)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>{{ $notification->data['message'] }}</span>
                            <a href="{{ route('notifications.destroy', $notification->id) }}"
                               class="btn btn-outline-danger btn-sm"
                               onclick="event.preventDefault(); document.getElementById('delete-form-{{ $notification->id }}').submit();">
                                Dismiss
                            </a>
                            <form id="delete-form-{{ $notification->id }}" action="{{ route('notifications.destroy', $notification->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

        <div class="mt-5">
            <!-- Search Form -->
            <form method="GET" action="{{ route('user.index') }}" class="input-group mb-4 shadow-sm">
                <input type="text" name="search" class="form-control" placeholder="Search users by name" value="{{ request('search') }}">
                <button type="submit" class="btn btn-dark">Search</button>
            </form>

            <div class="row">
                @foreach ($dataUser as $user)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-img-wrapper">
                                <img src="{{ asset('storage/' . $user->profile_path) }}" alt="{{ $user->name }}'s profile"
                                    class="card-img-top rounded-0" style="height: 200px; object-fit: cover;">
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $user->name }}</h5>
                                <p class="text-muted">{{ $user->hobby }}</p>
                                <form method="POST" action="{{ route('friend-request.store') }}">
                                    @csrf
                                    <input type="hidden" name="receiver_id" value="{{ $user->id }}">
                                    <button type="submit" class="btn btn-outline-primary w-100 mt-2">Add Friend</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
