@extends('layouts.app')

@section('content')
    
<form action="/rest" method="post">
<table>
    @csrf
    <tr>
        <th>
            message:
        </th>
        <td>
            <input type="text" name="message" value="{{old('message')}}">
        </td>
    </tr>

    <tr>
        <th>
            url:
        </th>
        <td>
            <input type="text" name="url" value="{{old('url')}}">
        </td>
    </tr>

    <th>
    
    </th>
    <td>
        <input type="submit" name="url" value="send">
    </td>
</tr>

</table>
</form>





@endsection