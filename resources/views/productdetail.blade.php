<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>POS</title>

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
        .im
        {
            border: 5px solid orange;
            border-radius: 5px;
        }
        .kkl
        {
            margin-left: 400px;
        }
        .kkll
        {
            margin-left: 500px;
        }
    </style>
</head>

<body>
    <h1 class="h1">Product Details</h1>
    <div class="container">
        <div class="card row">
           
            <div class="card-body">
            <img class="kkl" src="{{ asset('uploads/productimage/' . $productArr->Pimage) }}" width="250px" height="300px"
                alt="image">
                <br><br>
                
            <h2 class="kkl"><b>{{ $productArr->Pname }}</b> ({{ $productArr->id }})</h2>
            @php
                $generate = new Picqer\Barcode\BarcodeGeneratorHTML();
                
            @endphp
            <h3 class="kkl">Product Details</h3>
            <h5 class="kkl">Description is : {{ $productArr->Pdescription }}</h5>
            <h5 class="kkl">Price is : {{ $productArr->Pprice }}</h5>
            <h5 class="kkl">{!! $generate->getBarcode("$productArr->Pname", $generate::TYPE_CODE_128) !!}
            </h5>
            </div>
        
        </div>
        </div>
        <br />
        <a href="{{ url('productview') }}">
            <button class="btn btn-outline-warning kkll" type="button">
                Back
            </button>
        </a>

    </div>
    </div>
</body>

</html>
