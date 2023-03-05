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
        width: 80%;
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

    .mmm {
        margin-left: 10%;
    }

    .gg {
        margin-left: 27%;
    }
</style>

<body>

    <img class="kkk"
        src="https://scontent.flhe10-1.fna.fbcdn.net/v/t39.30808-6/330830592_525983946272750_3014192541995780091_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=730e14&_nc_eui2=AeGJOOGN7TFLDr_A9w-hA2EdajhfQx7xiz1qOF9DHvGLPaZP0xMjzF8icJ3xsO6XFwRuVrthed1xh1xbZg5M6UtV&_nc_ohc=ceHHp5TkidEAX_OhtUh&_nc_ht=scontent.flhe10-1.fna&oh=00_AfC85Dlm6s9keg3myyq11Ie0GQd17h6Z6wNFKC4BitjSMg&oe=63F256A0"
        width="150" height="150">
    <div class="mm">---------------------------------------------------------------------------</div>
    <br>
    <h2 class="mm">Contact Us</h2>
    <h5 class="mm">Address: Chah Sheikhan Wala, Ichara Lahore</h5>
    <h5 class="mm">Email: umarmirza279@gmail.com</h5>
    <h5 class="mm">Phone Number: +923054586324</h5>
    @foreach ($user as $users)
    <h5 class="mm">Cashier Name: {{ $users->name }}</h5>
    @endforeach
    <br>
    @foreach ($returntransactions as $returntransaction)
        <form class="mmm">


            <table id="customers" style="margin-top: 20px">
                <thead>
                    <tr>
                        <th>Return History ID</th>
                        <th>Return History Product</th>
                        <th>Return History Quantity</th>
                        <th>Return History Price</th>
                        <th>Return History Sub Total</th>
                        <th>Return History Date</th>
                        <th>Return History Time</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($returntransaction->returnhistory as $returnhistory)
                        <tr>
                            <td>{{ $returnhistory->id }}</td>
                            <td>{{ $returnhistory->rhproduct }}</td>
                            <td>{{ $returnhistory->rhquantity }}</td>
                            <td>{{ $returnhistory->rhprice }}</td>
                            <td>{{ $returnhistory->rhquantity * $returnhistory->rhprice }}
                            </td>
                            <td>{{ date('d/m/Y', strtotime($returnhistory->created_at)) }}</td>
                            @php
                                date_default_timezone_set('Asia/Karachi');
                            @endphp

                            <td>{{ date('h : i A', strtotime($returnhistory->created_at)) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </form>
    @endforeach
    <br>

    <div class="mmm">
        ------------------------------------------------------------------------------------------------------------------------------------------------
    </div>


    <br><br>
    <a href="dashboard" class="btn btn-outline-warning mm">Back</a>
</body>

</html>
