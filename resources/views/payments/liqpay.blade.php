<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" id="css-main" href="{{ mix('css/dashmix.css') }}">
</head>
<body>
<div id="page-loader" class="show bg-gd-sea"></div>
{!! $html !!}

<script>
    document.addEventListener("DOMContentLoaded", () => {
        let form = document.getElementsByTagName("form")[0];
        form.submit();
    });
</script>
</body>
</html>
