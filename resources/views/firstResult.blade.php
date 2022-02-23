<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WeatherAPI Result via Http Method</title>

    {{--    <link rel="stylesheet" href="{{ resource_path('css/app.css') }}">--}}

    <style>

        .styled-table {
            border-collapse: collapse;
            margin: 0 auto;
            font-size: 0.9em;
            font-family: sans-serif;
            min-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .styled-table thead tr {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }

        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }


    </style>


</head>
<body>

<table class="styled-table">
    <thead>
    <tr>
        <th>Data</th>
        <th>Values</th>
    </tr>
    </thead>

    <tbody>
    <tr>
        <td>City Id</td>
        <td>{{ $data['id'] }}</td>
    </tr>
    <tr>
        <td>Coordinates</td>
        <td>{{ $data['coord']['lon'] }}, {{ $data['coord']['lat'] }}</td>
    </tr>
    <tr>
        <td>Country</td>
        <td>{{ $data['sys']['country'] }}</td>
    </tr>
    <tr>
        <td>Place</td>
        <td>{{ $data['name'] }}</td>
    </tr>
    <tr>
        <td>Weather</td>
        <td>{{ $data['weather'][0]['main'] }}</td>
    </tr>
    <tr>
        <td>Description</td>
        <td>{{ $data['weather'][0]['description'] }}</td>
    </tr>
    <tr>
        <td>Temperature</td>
        <td>{{ $data['main']['temp'] }} K</td>
    </tr>
    <tr>
        <td>Pressue</td>
        <td>{{ $data['main']['pressure'] }} hPa</td>
    </tr>
    <tr>
        <td>Wind Speed</td>
        <td>{{ $data['wind']['speed'] }} miles/hour</td>
    </tr>
    <tr>
        <td>Humidity</td>
        <td>{{ $data['main']['humidity'] }} %</td>
    </tr>
    <tr>
        <td>Clouds</td>
        <td>{{ $data['clouds']['all'] }} %</td>
    </tr>
    </tbody>

    <tfoot>
    <tr>
        <th>Data</th>
        <th>Values</th>
    </tr>
    </tfoot>

</table>


</body>
</html>


