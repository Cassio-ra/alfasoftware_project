@extends('layouts.template')

@section('content')
    <div class="rounded-lg bg-gray-800 border border-slate-600 p-4">
        <form action="{{ $contact ? route('contact.update', $contact->id) : route('contact.store') }}" method="POST" class="max-w-sm mx-auto flex flex-col gap-3 text-slate-300">
            @csrf
            @if($contact)
                @method('PUT')
            @endif
            <div>
                <label for="name" class="block mb-2 text-sm font-medium {{$errors->has('name') ? 'text-red-700' : ''}}">Nome:</label>
                <input type="text" id="name" name="name" value="{{old('name', $contact ? $contact->name : '')}}" class="border placeholder-white-400/15 text-sm rounded-lg bg-gray-700 block w-full p-2.5 {{$errors->has('name') ? 'text-red-500 border-red-500' : ''}}" placeholder="Cássio Rezende">
                @if($errors->has('name'))
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{$errors->first('name')}}!</p>
                @endif
            </div>
            <div>
                <label for="contact" class="block mb-2 text-sm font-medium {{$errors->has('contact') ? 'text-red-700' : ''}}">Contato:</label>
                <input type="text" id="contact" name="contact" value="{{old('contact', $contact ? $contact->contact : '')}}" class="border placeholder-white-400/15 text-sm rounded-lg bg-gray-700 block w-full p-2.5 {{$errors->has('contact') ? 'text-red-500 border-red-500' : ''}}" placeholder="123456789" maxlength="9">
                @if($errors->has('contact'))
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{$errors->first('contact')}}!</p>
                @endif
            </div>
            <div>
                <label for="email" class="block mb-2 text-sm font-medium {{$errors->has('email') ? 'text-red-700' : ''}}">Email:</label>
                <input type="email" id="email" name="email" value="{{old('email', $contact ? $contact->email : '')}}" class="border placeholder-white-400/15 text-sm rounded-lg bg-gray-700 block w-full p-2.5 {{$errors->has('email') ? 'text-red-500 border-red-500' : ''}}" placeholder="Cassio_ra@outlook.com">
                @if($errors->has('email'))
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{$errors->first('email')}}!</p>
                @endif
            </div>
            @if($contact)
                <input type="text" hidden id="id" name="id" value="{{old('id', $contact->id)}}">
            @endif
            <div class="mt-2">
                <button type="submit" class="float-right border border-green-300 bg-green-600 rounded-md p-1 px-2">{{$contact ? 'Atualizar!' : 'Cadastrar!'}}</button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        $('#contact').on('input', function(e) {
            var inputValue = this.value.trim();
            this.value = inputValue.replace(/\D/g, '');
        });
    </script>
@endsection
