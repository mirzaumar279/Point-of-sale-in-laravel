<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>POS</title>

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
            width: 50%;
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

            font-size: large;
            font-family: Georgia;
            margin-left: 40%;
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

        .kkk {
            margin-left: 37%;
        }

        .mm {
            margin-left: 25%;
        }

        .gg {
            margin-left: 27%;
        }
    </style>
</head>

<body>
    <img class="mm"
        src="https://scontent.flhe10-1.fna.fbcdn.net/v/t39.30808-6/330830592_525983946272750_3014192541995780091_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=730e14&_nc_eui2=AeGJOOGN7TFLDr_A9w-hA2EdajhfQx7xiz1qOF9DHvGLPaZP0xMjzF8icJ3xsO6XFwRuVrthed1xh1xbZg5M6UtV&_nc_ohc=ceHHp5TkidEAX_OhtUh&_nc_ht=scontent.flhe10-1.fna&oh=00_AfC85Dlm6s9keg3myyq11Ie0GQd17h6Z6wNFKC4BitjSMg&oe=63F256A0"
        width="150" height="150" onclick="printpage()">
        <br>
        <h2 class="mm">Contact Us</h2>
        <h5 class="mm">Address: <b>Chah Sheikhan Wala, Ichara Lahore</b></h5>
        <h5 class="mm">Email: <b>umarmirza279@gmail.com</b></h5>
        <h5 class="mm">Phone Number: <b>+923054586324</b></h5>
        <br>
    <div class="mm">----------------------------------------------------</div>
    <br>
    <h2 class="mm">Transaction Details</h2>
    <h5 class="mm">Total Amount : <b>{{ $transactionArr->tamount }}</b></h5>
    <h5 class="mm">Customer Paid : <b>{{ $transactionArr->tpaid }}</b></h5>
    <h5 class="mm">Return Balance : <b>{{ $transactionArr->tbalance}}</b></h5>
    <h5 class="mm">Payment Method : <b>{{ $transactionArr->method}}</b></h5>
    <h5 class="mm">Payment Date: <b>{{ date('d/m/Y', strtotime($transactionArr->created_at)) }}</b></h5>
    </div>
    </div>
    </div>
    </div>
    </div>
    <script>
        function printpage() {
            window.print();
        }
    </script>
</body>

</html>
