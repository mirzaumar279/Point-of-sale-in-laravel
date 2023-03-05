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

    .back {
        background-color: rgb(218, 216, 216);
        width: 100%;
        height: 530px;
        box-shadow: 1px 2px 7px 2px black;
    }

    .back1 {
        background-color: green;
        color: white;
        text-align: center;
        font-size: 30px;
    }

    .f {
        font-size: 20px;
        margin-top: 20px;
        width: 210px;
    }

    .ff {
        font-size: 25px;
        margin-top: 20px;
        text-align: center;
        font-weight: bold;
    }

    .a {
        font-size: 20px;
        font-weight: bold;
    }

    .b {
        color: rgb(0, 95, 0);
        font-size: 20px;
    }

    .c {
        text-align: center;
    }

    .fff {
        font-size: 20px;
        margin-top: 20px;
        bottom: 10px;
    }
</style>

<body>
    <h1 class="h">Order Product</h1>

    @if (session()->has('msg'))
        <div class="alert alert-success" role="alert">
            {{ session('msg') }}
        </div>
    @elseif (session()->has('msgggg'))
        <div class="alert alert-danger" role="alert">
            {{ session('msgggg') }}
        </div>
    @elseif (session()->has('msgg'))
        <div class="alert alert-warning" role="alert">
            {{ session('msgg') }}
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col">
                <span class="counter">
                    <span class="counter-controls">
                        <button data-action="increase" class="btn btn-primary">
                            <span>Serial Number : 782676-<span class="counter-value"></span></span>
                        </button>
                    </span>
                </span>
                <span class="save">
                    <button data-action="save" class="btn btn-warning">
                        <span>Save</span>
                    </button>
                </span>
                <span class="reset">
                    <button data-action="reset" class="btn btn-danger">
                        <span>Reset</span>
                    </button>
                </span>
                
                <br><br>
                <form>
                    <table id="customers">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Order Product</th>
                                <th>Order Quantity</th>
                                <th>Order Price</th>
                                <th>Sub Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($orderArr as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->oproduct }}</td>
                                    <td>{{ $order->oquantity }}</td>
                                    <td>{{ $order->oprice }}</td>
                                    <td>{{ $order->oquantity * $order->oprice }}
                                        @php
                                            $total += $order->oquantity * $order->oprice;
                                        @endphp
                                    </td>
                                    <td>
                                        {{-- <a href="orderedit/{{ $order->id }}" class="btn btn-outline-success"><i
                                                class="fa fa-pen"></i></a>
                                        &nbsp; --}}
                                        <a href="orderdelete/{{ $order->id }}" class="btn btn-outline-danger"><i
                                                class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td class="kk" colspan="8"><a href="orderadd">Add Order</a></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                <br><br>
                <a href="dashboard" class="btn btn-outline-warning">Back</a>
                &nbsp;
                &nbsp;
                <a href="orderdeleteall" class="btn btn-outline-danger">Delete All Data</a>
            </div>
            <div class="row">
                <div class="col">
                    <form action="transactionsubmit" method="post">
                        @csrf
                        <div class="back">
                            <div class="back1">Total: {{ $total }}</div>

                            <div class="col">
                                <a href="printview" class="btn btn-primary f">Print</a>
                                <div class="ff">Payment Method</div>
                                <div class="c"><input type="radio" name="method" id="method"
                                        class="a">&nbsp;<span class="a">Cash</span>&nbsp;<i
                                        class="fa fa-money-bill b"></i></div>

                                <div class="fff">Total</div>
                                <input type="text" name="total" class="form-control" id="total"
                                    value="{{ $total }}" />
                                <div class="fff">Payment</div>
                                <input type="text" name="payment" class="form-control" id="payment" />

                                <div class="fff">Change</div>
                                <input type="text" name="change" class="form-control" id="change"
                                    onclick="calc()" />
                                <br>
                                <div class="c"><input type="submit" class="btn btn-outline-success"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <script>
        function calc() {
            var x = parseInt(document.getElementById('total').value);
            var y = parseInt(document.getElementById('payment').value);
            document.getElementById('change').value = y - x;

        }
        const actions = Array.from(document.querySelectorAll('[data-action]'));

        let counter = localStorage.getItem("counter") || 0;

        document.querySelector(".counter-value").innerText = counter;

        actions.forEach(action => {
            action.addEventListener('click', () => {
                const action_name = action.dataset.action;

                action.classList.add("animate");

                setTimeout(() => {
                    action.classList.remove("animate");
                }, 1000);

                switch (action_name) {
                    case 'increase':
                        counter++;
                        break;
                    case 'decrease':
                        counter--;
                        break;
                    case 'reset':
                        counter = 0;
                        break;
                    case 'save':
                        localStorage.setItem("counter", counter);
                        break;
                    case 'clear-save':
                        localStorage.removeItem("counter");
                        break;
                }

                document.querySelector(".counter-value").innerText = counter;
            });
        });
    </script>
</body>

</html>
