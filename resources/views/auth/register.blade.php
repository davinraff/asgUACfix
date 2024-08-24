<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-light d-flex justify-content-center align-items-center vh-100">

    <div class="card shadow border-0" style="width: 100%; max-width: 500px;">
        <div class="card-header bg-primary text-white text-center">
            <h2>Register</h2>
        </div>
        <div class="card-body p-4">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ url('/register') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}"
                        required autofocus>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password:</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="gender" class="form-label">Gender:</label>
                    <select id="gender" name="gender" class="form-select" required>
                        <option value="" disabled selected>Select your gender</option>
                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                        <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="instagram_username" class="form-label">Instagram Username:</label>
                    <input type="text" id="instagram_username" name="instagram_username" class="form-control"
                        value="{{ old('instagram_username') }}" required>
                </div>

                <div class="mb-3">
                    <label for="hobby" class="form-label">Hobbies:</label>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="hobby[]" value="futsal"
                                    {{ is_array(old('hobby')) && in_array('futsal', old('hobby')) ? 'checked' : '' }}>
                                <label class="form-check-label">Futsal</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="hobby[]" value="basket"
                                    {{ is_array(old('hobby')) && in_array('basket', old('hobby')) ? 'checked' : '' }}>
                                <label class="form-check-label">Basketball</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="hobby[]" value="game"
                                    {{ is_array(old('hobby')) && in_array('game', old('hobby')) ? 'checked' : '' }}>
                                <label class="form-check-label">Playing Game</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="hobby[]" value="nyanyi"
                                    {{ is_array(old('hobby')) && in_array('nyanyi', old('hobby')) ? 'checked' : '' }}>
                                <label class="form-check-label">Sing</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="hobby[]" value="voli"
                                    {{ is_array(old('hobby')) && in_array('voli', old('hobby')) ? 'checked' : '' }}>
                                <label class="form-check-label">Volleyball</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="mobile_number" class="form-label">Mobile Number:</label>
                    <input type="text" id="mobile_number" name="mobile_number" class="form-control"
                        value="{{ old('mobile_number') }}" required>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">Register</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
