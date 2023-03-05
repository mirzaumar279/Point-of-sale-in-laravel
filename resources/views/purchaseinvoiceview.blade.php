<!doctype html>
<html lang="en">

<head>
    <title>POS</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />

</head>
<style>
    .h {
        background-color: rgb(0, 0, 63);
        width: 100%;
        text-align: center;
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-weight: 30px;
        color: white;
    }

    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        text-align: center;
    }

    #customers td,
    #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        background-color: rgb(0, 0, 63);
        color: white;
    }

    a:link {
        text-decoration: none;
    }

    a {
        color: white;
    }

    .kk {
        background-color: rgb(0, 0, 63);
        font-size: large;
        font-family: Georgia;
    }

    .con9 {
        background-image: linear-gradient(60deg, #26c6da, #00acc1);
        width: 150px;
        height: 120px;

        border-radius: 10px;
        margin-left: 20px;
        box-shadow: 1px 2px 7px 2px black;
    }

    .font11 {
        text-align: center;
        color: white;
        font-family: Georgia;
        font-size: 20px;
        font-weight: bold;
        margin-top: 10px;
    }

    .font12 {
        text-align: center;
        color: white;
        font-family: Georgia;
        font-size: 30px;
        font-weight: bold;
    }

    .ii {
        color: white;
        text-align: center;
        font-size: 30px;
    }

    .search {
        width: 500px;
        height: 45px;
        text-align: center;
        font-size: 25px;
        font-family: Georgia;
        border-radius: 10px;
    }

    .im {
        border: 2px solid orange;
        border-radius: 5px;
    }
</style>

<body>
    <h1 class="h">Purchase Invoice</h1>
    <form class="col-9">
        <div class="form-group">
            <input type="search" name="search" placeholder="Search by Vendor Name" value="{{ $search }}"
                class="search" />

            <button class="btn btn-outline-primary">
                Search
            </button>
            <a href="{{ url('purchaseinvoiceview') }}">
                <button class="btn btn-outline-success" type="button">
                    Reset
                </button>
            </a>
        </div>
    </form>
    @if (session()->has('msg'))
        <div class="alert alert-success" role="alert">
            {{ session('msg') }}
        </div>
    @elseif (session()->has('msgggg'))
        <div class="alert alert-danger" role="alert">
            {{ session('msgggg') }}
        </div>
    @endif
    <table id="customers">
        <thead>
            <tr>
                <th>ID</th>
                <th>Vendor ID</th>
                <th>Vendor Name</th>
                <th>Invoice Number</th>
                <th>Status</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($purchaseinvoiceArr as $purchase)
                <tr>
                    <td>{{ $purchase->id }}</td>
                    <td>{{ $purchase->vendor_id }}</td>
                    <td>{{ $purchase->vendorname }}</td>
                    <td>{{ $purchase->invoicenumber }}</td>
                    <td>{{ $purchase->Status }}</td>
                    <td>{{ date('d/m/Y', strtotime($purchase->created_at)) }}</td>
                    <td>
                        <a href="purchaseinvoicedelete/{{ $purchase->id }}" class="btn btn-outline-danger"><i
                                class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td class="kk" colspan="9"><a href="purchaseinvoiceadd">Purchase Invoice</a>
                </td>
            </tr>
        </tbody>
    </table>
    <a href="dashboard" class="btn btn-outline-warning">Back</a>
</body>

</html>
