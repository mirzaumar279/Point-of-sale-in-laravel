<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Crud Operation</title>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .h1 {
            background-color: rgb(0, 0, 88);
            width: 100%;
            font-size: 30px;
            font-family: Georgia;
            text-align: center;
            font-weight: bold;
            color: white;
        }

        a:link {
            text-decoration: none;
        }

        a {
            color: black;
        }

        .kk {
            background-color: rgb(0, 0, 63);
            font-size: large;
            font-family: Georgia;
        }
    </style>
</head>

<body>
    <h1 class="h1">Vendor Detail</h1>
    <div class="container">
        <div class="card row mt-3">
            <div class="card-title">
            <div class="card-body">

            <h2>Vendor Name : <b>{{ $vendorArr->vname }}</b> ({{ $vendorArr->id }})</h2>
            <h3>Contact Details</h3>
            <h5>Email : {{ $vendorArr->vemail }}</h5>
            <h5>Address : {{ $vendorArr->vaddress }}</h5>
            <h5>Phone : {{ $vendorArr->vphone }}</h5>
            <h5>Company Name : {{ $vendorArr->company }}</h5>
        </div>
    </div>
</div>
        <br />
        <a href="{{ url('vendorview') }}">
            <button class="btn btn-outline-warning" type="button">
                Back
            </button>
        </a>

    
    </div>
</body>

</html>
