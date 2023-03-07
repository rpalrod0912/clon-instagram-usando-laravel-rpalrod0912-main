<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis Publicaciones') }}
        </h2>
    </x-slot>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900" style="display: flex;
    flex-direction: column;
    align-items: center;">
                <tbody>
@foreach ($image as $imag)
<div class="max-w-sm rounded overflow-hidden shadow-lg" style="width:50%">
  <div class="px-6 py-4">
    @foreach($user as $usr)
    @if($usr->id == $imag->user_id)
    <div class="font-bold text-xl mb-2">{{$usr->nick}}</div>
    @endif
    @endforeach

    <p class="text-gray-700 text-base">
    <img src="/storage/images/{{$imag->image_path}}" style="width:200px; height:200px;border-radius:50%">
    <h2>{{$imag->description}}</h2>

    </p>
  </div>
  <div class="px-6 pt-4 pb-2">
    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
  </div>
</div>
@endforeach



</tbody>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
