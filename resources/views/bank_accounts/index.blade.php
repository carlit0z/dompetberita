<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Accounts</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">
    <h1 class="mb-4">Bank Accounts</h1>

    <!-- Success message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Daftar akun bank -->
    <ul class="list-group">
        @foreach ($bankAccounts as $account)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong>{{ $account->bank_name }}</strong> ({{ $account->account_number }})<br>
                    <span>Balance: {{ $account->balance }} {{ $account->currency }}</span>
                </div>
                <div>
                    <!-- Tombol View -->
                    <a href="{{ route('bank-accounts.show', $account->id) }}" class="btn btn-primary btn-sm">View</a>

                    <!-- Tombol Delete dengan Form -->
                    <form action="{{ route('bank-accounts.delete', $account->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>

    <!-- Tombol untuk menambah akun bank baru (jika dibutuhkan) -->
    {{-- <a href="{{ route('bank-accounts.create') }}" class="btn btn-success mt-4">Add New Bank Account</a> --}}

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
