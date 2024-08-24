<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background: #f0f4f8;
        }

        .card {
            border: none;
            border-radius: 15px;
        }

        .card-header {
            background-color: #007bff;
            color: white;
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 10px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .form-control {
            border-radius: 10px;
        }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center vh-100">

    <div class="card shadow-sm" style="width: 100%; max-width: 420px;">
        <div class="card-header">
            Payment
        </div>
        <div class="card-body p-4">
            <h5 class="text-center text-muted mb-4">Amount Due: <span class="text-dark">{{ $price }}</span></h5>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form method="POST" action="{{ route('updatePaid') }}">
                @csrf
                <div class="mb-4">
                    <label for="payment_amount" class="form-label">Enter Payment Amount:</label>
                    <input type="number" id="payment_amount" name="payment_amount" class="form-control" required>
                </div>

                <input type="hidden" id="price" name="price" value="{{ $price }}">

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">Pay Now</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
