<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gente') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900" style="display: flex;
    flex-direction: column;
    align-items: center;">
                <tbody>
@foreach ($user as $usr)
<div class="max-w-sm rounded overflow-hidden shadow-lg" style="width:50%">

  <div class="px-6 py-4" style="display:flex; flex-direction:column; align-items:center">
    @if($usr->id !== Auth::User()->id)
    <div class="font-bold text-xl mb-2">{{$usr->nick}}</div>
    <div class="font-bold text-m mb-2">Nombre:{{$usr->name}}</div>
    <div class="font-bold text-m mb-2">Apellidos:{{$usr->surname}}</div>
    <div class="font-bold text-s mb-2">{{$usr->email}}</div>

    <p class="text-gray-700 text-base">
    @if($usr->image=="default.png")
            <img src="{{ $usr->image}}" style="width:200px; height:200px;border-radius:50%">
    @else
    <img src="/storage/userPhotos/{{$usr->image}}" style="width:200px; height:200px;border-radius:50%">
    @endif
    <!-- Comentarios -->
    @endif
    </p>
  </div>
</a>
</div>
@endforeach

</tbody>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

