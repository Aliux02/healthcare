

<x-jet-label for="hospitalsSelect" value="{{ __('Hospital') }}" />
<select name="hospitalsSelect" id="hospitals" size="<?=count($hospitals)?>" onchange="getHospitals()" multiple>


    @foreach ($hospitals as $hospital)
    <option value="{{$hospital->name}}">{{$hospital->name}}</option>
    @endforeach

</select>