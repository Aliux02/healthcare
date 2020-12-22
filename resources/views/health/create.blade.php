<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Document</title>
</head>
<body>
    <form action="{{route('health.store',$patient_id)}}" method="post">
        <table>
        <thead>
            <tr>
            <th><label for="temperature">Temperature:</label></th>
            <th><label for="taste">Taste:</label></th>
            <th><label for="smell">Smell:</label></th>
            <th><label for="energetic">Energetic:</label></th>
            <th><label for="nose">Nose:</label></th>
            <th><label for="throught">Throught:</label></th>
            <th><label for="cough">Couht:</label></th>
            <th><label for="respiration">Respiration:</label></th>
            <th><label for="pain">Pain:</label></th>
            <th><label for="submit"></label></th>
            </tr>
            <tr>
            <th class="border px-4 py-2">
                <input type="text" id="temperature" name="temperature" value=""></th>
            <th class="border px-4 py-2">
                <input type="radio" id="taste" name="taste" value="1">
                <input type="radio" id="taste" name="taste" value="2">
                <input type="radio" id="taste" name="taste" value="3">
                <input type="radio" id="taste" name="taste" value="4">
                <input type="radio" id="taste" name="taste" value="5">
            </th>
            <th class="border px-4 py-2">
                <input type="radio" id="smell" name="smell" value="1">
                <input type="radio" id="smell" name="smell" value="2">
                <input type="radio" id="smell" name="smell" value="3">
                <input type="radio" id="smell" name="smell" value="4">
                <input type="radio" id="smell" name="smell" value="5">
            </th>
            <th class="border px-4 py-2">
                <input type="radio" id="energetic" name="energetic" value="1">
                <input type="radio" id="energetic" name="energetic" value="2">
                <input type="radio" id="energetic" name="energetic" value="3">
                <input type="radio" id="energetic" name="energetic" value="4">
                <input type="radio" id="energetic" name="energetic" value="5">
            </th>
            <th class="border px-4 py-2">
                <input type="radio" id="nose" name="nose" value="1">
                <input type="radio" id="nose" name="nose" value="2">
                <input type="radio" id="nose" name="nose" value="3">
                <input type="radio" id="nose" name="nose" value="4">
                <input type="radio" id="nose" name="nose" value="5">
            </th>
            <th class="border px-4 py-2">
                <input type="radio" id="throught" name="throught" value="1">
                <input type="radio" id="throught" name="throught" value="2">
                <input type="radio" id="throught" name="throught" value="3">
                <input type="radio" id="throught" name="throught" value="4">
                <input type="radio" id="throught" name="throught" value="5">
            </th>
            <th class="border px-4 py-2">
                <input type="radio" id="cough" name="cough" value="1">
                <input type="radio" id="cough" name="cough" value="2">
                <input type="radio" id="cough" name="cough" value="3">
                <input type="radio" id="cough" name="cough" value="4">
                <input type="radio" id="cough" name="cough" value="5">
            </th>
            <th class="border px-4 py-2">
                <input type="radio" id="respiration" name="respiration" value="1">
                <input type="radio" id="respiration" name="respiration" value="2">
                <input type="radio" id="respiration" name="respiration" value="3">
                <input type="radio" id="respiration" name="respiration" value="4">
                <input type="radio" id="respiration" name="respiration" value="5">
            </th>
            <th class="border px-4 py-2">
                <input type="radio" id="pain" name="pain" value="1">
                <input type="radio" id="pain" name="pain" value="2">
                <input type="radio" id="pain" name="pain" value="3">
                <input type="radio" id="pain" name="pain" value="4">
                <input type="radio" id="pain" name="pain" value="5">
            </th>
            <th><input type="hidden" name="patient_id" value="{{$patient_id}}">
            <input type="submit" value="Submit"></th>
            </tr>
        </table>
        @csrf
    </form>
</body>
</html>