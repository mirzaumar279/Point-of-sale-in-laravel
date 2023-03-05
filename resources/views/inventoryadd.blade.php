<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
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

        .v {
            text-align: center;
        }
    </style>

</head>

<body>
    <h1 class="h1">Insert Inventory Data</h1>
    <div class="row">
        <div class="offset-lg-3 col-lg-6">
            <form class="container" method="post" action="inventorysubmit" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-title"></div>
                    <div class="card-body">
                        <div class="row">
                            @csrf
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <select id="vendorname" name="vendorname" class="form-control v">

                                        <option>--Choose Vendor--</option>

                                        @foreach ($product as $products)
                                            <option data-costunit="{{ $products->costunit }}"
                                                data-productname="{{ $products->itemname }}"
                                                data-rquantiy="{{ $products->rquantiy }}" value="{{ $products->id }}">
                                                {{ $products->vendorname }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Product Name</label><br />
                                    <input type="text" name="productname" id="productname" required readonly
                                        class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Product Quantity</label><br />
                                    <input type="number" name="rquantiy" id="rquantiy" required readonly class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Product Cost</label><br />

                                    <input type="number" name="costunit" id="costunit" required readonly class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Product Sale</label><br />

                                    <input type="number" name="sale" required class="form-control" />
                                </div>
                            </div>


                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="submit" class="btn btn-outline-success" />&nbsp;<a href="inventoryview"
                                    class="btn btn-outline-warning">Back</a>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {

            $('#vendorname').on('change', function() {
                console.log('changed')
                $('#productname').val($(this).find(':selected').data('productname'))
            })
        })
        $(document).ready(function() {

            $('#vendorname').on('change', function() {
                console.log('changed')
                $('#costunit').val($(this).find(':selected').data('costunit'))
            })
        })
        $(document).ready(function() {

            $('#vendorname').on('change', function() {
                console.log('changed')
                $('#rquantiy').val($(this).find(':selected').data('rquantiy'))
            })
        })
    </script>
</body>

</html>
