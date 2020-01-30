<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
        <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
        <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content" style="width: 70%;">
                <form method="GET" action="{{url('/')}}">
                    <input type="text" name="search">
                    <input type="hidden" value=@if(isset($_GET['page'])) {{$_GET['page']}} @endif name="page">
                    <input type="submit" value="SEARCH">
                </form>
                <table id="myTable" class="display">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->user_id}}</td>
                        <td>{{$user->user_first_name}}</td>
                        <td>{{$user->email}}</td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{ $users->appends($_GET)->links() }}


    <script>
        var table = '';
        $(document).ready( function () {
            table =  $('#myTable').DataTable();
        });
        $('#myTable').dataTable({
            "bPaginate": false,
            "info":     false,
          /*  "bSort": false,*/
            "bLengthChange": false,
            "bFilter": true,
        });


/*        $('#myTable thead').on('click', 'th', function () {
            var index = table.column(this).index();
            var val = table.column(this).name();
            alert('index : '+val);
        });*/
    </script>

    </body>
</html>
