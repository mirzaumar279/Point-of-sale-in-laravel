<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>POS</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />

    <!-- Styles -->
    @livewireStyles
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .h1 {
            background-color: rgb(0, 0, 68);
            width: 100%;
            text-align: center;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            font-weight: 30px;
            color: white;
        }

        .con6 {
            background-image: linear-gradient(60deg, #ffa726, #fb8c00);
            width: 150px;
            height: 120px;

            border-radius: 10px;
            margin-left: 20px;
            box-shadow: 1px 2px 7px 2px black;
        }

        .con7 {
            background-image: linear-gradient(60deg, #66bb6a, #43a047);
            width: 150px;
            height: 120px;

            border-radius: 10px;
            margin-left: 20px;
            box-shadow: 1px 2px 7px 2px black;
        }

        .con8 {
            background-image: linear-gradient(60deg, #ef5350, #e53935);
            width: 150px;
            height: 120px;

            border-radius: 10px;
            margin-left: 20px;
            box-shadow: 1px 2px 7px 2px black;
        }

        .con9 {
            background-image: linear-gradient(60deg, #26c6da, #00acc1);
            width: 150px;
            height: 120px;

            border-radius: 10px;
            margin-left: 20px;
            box-shadow: 1px 2px 7px 2px black;
        }

        .con10 {
            background-image: linear-gradient(60deg, #ba54f5, #ba54f5);
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

        .i {
            color: white;
            text-align: center;
            font-size: 40px;
        }

        .ii {
            color: white;
            text-align: center;
            font-size: 30px;
        }

        a:link {
            text-decoration: none;
            background-color: transparent;
        }

        a {
            color: white;
        }

        .ss {
            margin-top: 70px;
        }

        .margin {
            margin-top: 30px;
        }

        .margin2 {
            margin-top: 30px;
            margin-left: 30px;
        }
    </style>
</head>

<body class="font-sans antialiased">

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')
        <h1 class="h1">Point Of Sale System</h1>
        <div class="container ss">
            <div class="row">
                <div class="col">
                    <div class="con9">
                        <div class="font11">
                            <a href="productview">Add Prducts</a>
                        </div>
                        <div class="i">
                            <a href="productview">
                                <i class="fa fa-box"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="con9">
                        <div class="font11">
                            <a href="vendorview">Vendor</a>
                            <div class="i">
                                <a href="vendorview">
                                    <i class="fa fa-user"></i>
                                </a>
                            </div>
                        </div>
                        <div class="font12"></div>
                    </div>
                </div>
                <div class="col">
                    <div class="con9 ">
                        <div class="font11">
                            <a href="assignedview">Assigned Products</a>
                            <div class="i">
                                <a href="assignedview">
                                    <i class="fa fa-boxes"></i>
                                </a>
                            </div>
                        </div>
                        <div class="font12"></div>
                    </div>
                </div>
                <div class="col">
                    <div class="con9 ">
                        <div class="font11">
                            <a href="purchaseinvoiceitemview">Purchase Invoice Item</a>
                            <div class="i">
                                <a href="purchaseinvoiceitemview">
                                    <i class="fa fa-boxes"></i>
                                </a>
                            </div>
                        </div>
                        <div class="font12"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="con9 ">
                        <div class="font11">
                            <a href="purchaseinvoiceview">Purchase Invoice</a>
                            <div class="i">
                                <a href="purchaseinvoiceview">
                                    <i class="fa fa-boxes"></i>
                                </a>
                            </div>
                        </div>
                        <div class="font12"></div>
                    </div>
                </div>

                <div class="col">
                    <div class="con9 ">
                        <div class="font11">
                            <a href="inventoryview">Inventory Products</a>
                            <div class="i">
                                <a href="inventoryview">
                                    <i class="fa fa-boxes"></i>
                                </a>
                            </div>
                        </div>
                        <div class="font12"></div>
                    </div>
                </div>
                <div class="col">
                    <div class="con9 ">
                        <div class="font11">
                            <a href="orderview">Product Orders</a>
                        </div>
                        <div class="i">
                            <a href="orderview">
                                <i class="fa fa-users"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="con9 ">
                        <div class="font11">
                            <a href="historyview">View History</a>
                        </div>
                        <div class="i">
                            <a href="historyview">
                                <i class="fa fa-file"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="con9">
                        <div class="font11">
                            <a href="transactionview">Transaction</a>
                            <div class="i">
                                <a href="transactionview">
                                    <i class="fa fa-money-bill"></i>
                                </a>
                            </div>
                        </div>
                        <div class="font12"></div>
                    </div>
                </div>
                <div class="col">
                    <div class="con9 ">
                        <div class="font11">
                            <a href="returnview">Return Products</a>
                            <div class="i">
                                <a href="returnview">
                                    <i class="fa fa-boxes"></i>
                                </a>
                            </div>
                        </div>
                        <div class="font12"></div>
                    </div>
                </div>


                <div class="col">
                    <div class="con9">
                        <div class="font11">
                            <a href="returntransactionview">Return Transaction</a>
                            <div class="i">
                                <a href="returntransactionview">
                                    <i class="fa fa-money-bill"></i>
                                </a>
                            </div>
                        </div>
                        <div class="font12"></div>
                    </div>
                </div>


                <div class="col">
                    <div class="con9">
                        <div class="font11">
                            <a href="returnhistoryview">Return History</a>
                            <div class="i">
                                <a href="returnhistoryview">
                                    <i class="fa fa-file"></i>
                                </a>
                            </div>
                        </div>
                        <div class="font12"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>
