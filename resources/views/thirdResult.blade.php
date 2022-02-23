<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WeatherAPI Result via Http Method</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

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


