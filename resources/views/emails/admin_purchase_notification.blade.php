<!DOCTYPE html>
<html>
<head>
    <title>New Request</title>
</head>
<body>

<p>You have a new paid order:</p>
<p>From:</p>
{{ $user->id }} <br>
{{ $user->name }} <br>
{{ $user->email }}
<p>Transaction Id:</p>
<p>{{$transaction}}</p>
</body>
</html>
