<!DOCTYPE html>
<html>
<head>
    <title>Vote Confirmation</title>
</head>
<body>
    <h1>Thank you for voting!</h1>
    <p>You have successfully voted for {{ $candidate->name }} for the position of {{ $candidate->position->name }}.</p>
</body>
</html>
