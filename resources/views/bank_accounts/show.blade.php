<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Account Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">
    <h1 class="mb-4">Bank Account Details</h1>

    <!-- Card for Bank Account Details -->
    <div class="card">
        <div class="card-header">
            Account Information
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $bankAccounts->bank_name }}</h5> <!-- Akses sebagai objek -->
            <p class="card-text">
                <strong>Account Number:</strong> {{ $bankAccounts->account_number }}<br>
                <strong>Balance:</strong> {{ $bankAccounts->balance }} {{ $bankAccounts->currency }}
            </p>
            <a href="{{ route('bank-accounts.index') }}" class="btn btn-primary">Back to Accounts</a>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
