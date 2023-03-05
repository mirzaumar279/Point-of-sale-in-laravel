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

        .mar {
            margin-left: 350px;
        }

        .mar1 {
            margin-left: 200px;
        }

        .mar2 {
            margin-left: 30px;
        }
    </style>

</head>

<body>
    <h1 class="h1">Purchase Invoice Items</h1>
    <div class="row">
        <div class="offset-lg-1 col-lg-10">
            <form class="container" method="post" action="purchaseinvoiceitemsubmit" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-title"></div>
                    <div class="card-body">
                        @csrf
                        <div class="col-lg-6 mar1">
                            <div class="form-group">
                                <select id="vendorname" name="vendorname" class="form-control v">

                                    <option>--Choose Vendor--</option>

                                    @foreach ($product as $products)
                                        <option data-product_id="{{ $products->id }}"
                                            data-productname="{{ $products->productname }}"
                                            data-tquantity="{{ $products->quantity }}" value="{{ $products->id }}">
                                            {{ $products->vname }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>


                        <div class="row mar2 product-details-row">
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>Product Name</label><br />
                                    <input type="text" name="productname" id="productname" required readonly
                                        class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>Product ID</label><br />
                                    <input type="number" name="product_id" id="product_id" required readonly
                                        class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>Total Quantity</label><br />
                                    <input type="number" id="tquantity" name="tquantity" required readonly
                                        class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>Received Quantity</label><br />
                                    <input type="number" name="rquantity" required class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>Cost Unit</label><br />
                                    <input type="number" name="cost" required class="form-control" />
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-3 mar">
                            <div class="form-group">
                                <input type="submit" class="btn btn-outline-success" />&nbsp;<a
                                    href="purchaseinvoiceitemview" class="btn btn-outline-warning">Back</a>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <br>
    <br>

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
                $('#product_id').val($(this).find(':selected').data('product_id'))
            })
        })
        $(document).ready(function() {

            $('#vendorname').on('change', function() {
                console.log('changed')
                $('#tquantity').val($(this).find(':selected').data('tquantity'))
            })
        })
    </script>
</body>

</html>
