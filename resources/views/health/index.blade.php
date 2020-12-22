<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }
        h2 {
            text-align:center;
        }
        a{
            text-decoration: none;
            font-weight: bold;
            color: blue;
            text-decoration: underline;
        }
        td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        }

        tr:nth-child(even) {
        background-color: #dddddd;
        }
    </style>
</head>
<body>

    <h2>Patient's health parameters</h2><br>
    <a href="{{ route('home') }}">atgal</a><br><br>
    <button type="submit">
        <a href="{{route('health.create',$patient)}}">ADD parameters</a>
    </button><br><br><br>
    <table>
    <tr>
        <th>Temperature</th>
        <th>Taste</th>
        <th>Smell</th>
        <th>Energetic</th>
        <th>Nose</th>
        <th>Throught</th>
        <th>Cough</th>
        <th>Respiration</th>
        <th>Pain</th>
        <th>Edit</th>
    </tr>
    @foreach($healths as $health)
    <tr>
        <td>{{$health->temperature}}</td>
        <td>{{$health->taste}}</td>
        <td>{{$health->smell}}</td>
        <td>{{$health->energetic}}</td>
        <td>{{$health->nose}}</td>
        <td>{{$health->throught}}</td>
        <td>{{$health->cough}}</td>
        <td>{{$health->respiration}}</td>
        <td>{{$health->pain}}</td>
        <td>
            <form action="{{route('health.edit',$health)}}" method="post">
                <input type="submit" value="EDIT">
                @csrf
            </form>
        </td>
    </tr>
    @endforeach
    </table>    
</body>
</html>