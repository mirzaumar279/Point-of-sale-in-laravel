<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>POS</title>

        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
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
    
            a:link {
                text-decoration: none;
               
            }
    
            .m1{
                background-image: url("https://media.istockphoto.com/id/948005450/photo/smiling-african-waitress-using-a-restaurant-point-of-sale-terminal.jpg?b=1&s=170667a&w=0&k=20&c=iE9qjDY6thpHux3AISSSZeu_Um5h2cOxUqZ5vrQgNpQ=");
                background-repeat: no-repeat;
                width: 40%;
                margin-top: 50px;
                height: 316px;
                border: 4px solid white;
                margin-left: 370px;
                box-shadow: 1px 2px 15px 6px black;
                animation: slider 15s infinite linear;
            }
            @keyframes slider
            {
                0%{background-image: url("https://media.istockphoto.com/id/948005450/photo/smiling-african-waitress-using-a-restaurant-point-of-sale-terminal.jpg?b=1&s=170667a&w=0&k=20&c=iE9qjDY6thpHux3AISSSZeu_Um5h2cOxUqZ5vrQgNpQ=");}
                35%{background-image: url("https://media.istockphoto.com/id/1212064164/photo/smiling-barista-using-digital-tablet-while-working-in-a-bar.jpg?b=1&s=170667a&w=0&k=20&c=rBThT_8yKboa3PXYcwFTIg9-l6Tx8r_y2bsyhm36a70=");}
                75%{background-image: url("https://media.istockphoto.com/id/1282265489/photo/waiter-holding-credit-card-swipe-machine-while-customer-typing-code-in-modern-cafe.jpg?b=1&s=170667a&w=0&k=20&c=hruPi-3CxlPXRQZbcjyN8ThLNL-ZEsHmV_Tm4wCAU_M=");}
            }
            .left
            {
                margin-left: 450px;
            }      
        </style>
    </head>
    <body class="antialiased">
        <h1 class="h1">Point Of Sale System</h1>
        <div class="m1"></div>
        <div class="container">
            <div class="row">
                <div class="col">
    
                </div>
            </div>
            <br><br>
            <div class="row left">
                <div class="col">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-warning">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-success">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>
</div>
          
        </div>
    </body>
</html>
