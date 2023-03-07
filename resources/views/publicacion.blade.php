<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mi Publicacion') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900" style="display: flex;
    flex-direction: column;
    align-items: center;">
                <tbody>

<div class="max-w-sm rounded overflow-hidden shadow-lg" style="width:50%" >
  <div class="px-6 py-4" style="display:flex; flex-direction:column; align-items:center">
    <div class="font-bold text-xl mb-2">{{$image->User->name}}</div>
    <p class="text-gray-700 text-base">
    <img src="/storage/images/{{$image->image_path}}" style="width:200px; height:200px;border-radius:4%">
    <h2>{{$image->description}}</h2>
    
    </p>
  </div>
  

  <div class="px-6 pt-4 pb-2">
    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
  </div>
</div>
@if ($usuario->id == $image->User->id)
<form method="POST" action="{{route('borrarPubli',$image->id)}}" id="formularioEliminar">
      @method('delete')     
      @csrf

     
          
     <input type="submit" value="Eliminar">
                        
</form>

@endif
<form method="POST" action="{{ route('uploadComment',$image->id) }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="content" :value="__('Imagen')" />
            <x-text-input id="content" name="content" type="textarea" class="mt-1 block w-full" :value="old('content', 'Escribe aqui el comentario')" required autofocus autocomplete="content" />
            <x-input-error class="mt-2" :messages="$errors->get('image')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Comentar') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Publicado') }}</p>
            @endif
        </div>
    </form>
</tbody>


</div>

@foreach($image->Comment as $comment)

<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-grey overflow-hidden shadow-sm sm:rounded-lg" style="background-color:grey;">
                <div class="p-6 text-gray-900" style="display: flex;
    flex-direction: column;
    align-items: center;">
    <a><img src="/storage/userPhotos/{{$comment->User->image}}" style="height:80px;width:80px;border-radius:50%;"></a>
    <h2>{{$comment->User->nick}}</h2>
    <h2>{{$comment->content}}</h2>
    @if ($comment->User->id == Auth::User()->id)
<form method="POST" action="{{route('deleteCom',$comment->id)}}" id="form">
      @method('delete')     
      @csrf

     
      <br>    
     <input type="submit" value="Eliminar Comentario">
                        
</form>

@endif

</div>
</div>
</div>
@endforeach
</x-app-layout>