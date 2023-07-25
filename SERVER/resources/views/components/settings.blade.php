@extends("user")


@section('cont')

    <table>
        <tr> <th>name</th> <th>age</th> </tr>
        <tr> <td>{{$user['name']}}</td> <td>{{$user['age']}}</td> </tr>
    </table>

    @foreach ($color as $item)

    <button style="background-color:{{$item}};">Click</button>

    @endforeach

@endsection
