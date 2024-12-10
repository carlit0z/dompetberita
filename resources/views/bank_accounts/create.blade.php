<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Bank Account</title>
</head>

<body>
    <h1>Add New Bank Account</h1>

    <form action="{{ route('bank_accounts.store') }}" method="POST">
        @csrf
        <label for="bank_name">Bank Name:</label><br>
        <input type="text" id="bank_name" name="bank_name" required><br><br>

        <label for="account_number">Account Number:</label><br>
        <input type="text" id="account_number" name="account_number" required><br><br>

        <label for="balance">Balance:</label><br>
        <input type="number" id="balance" name="balance" required><br><br>

        <label for="currency">Currency:</label><br>
        <input type="text" id="currency" name="currency" required><br><br>

        <input type="submit" value="Add Bank Account">
    </form>
</body>

</html>
