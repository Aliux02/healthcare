<style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
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
    <a href="{{ route('ceo.index') }}">Atgal</a>
<table>
    <tr>
      <th>name</th>
      <th>surname</th>
      <th>verify</th>
    </tr>
    @foreach ($unverifiedDoctors as $doc)
    <tr>
        <td> {{$doc->name}}</td>
        <td> {{$doc->surname}}</td>
        <td> 
            <form action="{{ route('medic.verifymedic') }}" method="post">
                <input type="hidden" name="id" value="{{$doc->id}}">
                @csrf
                <button type="submit">Aktyvinti</button>
            </form>
        </td>
  
    </tr>
@endforeach
    

   
  </table>