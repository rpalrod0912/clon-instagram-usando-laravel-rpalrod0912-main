@foreach($listar as $user)
    <img src="{{$user->image}}" height="100px"><i>{{$user->nick}}</i><br/>
@endforeach