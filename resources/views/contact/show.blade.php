@extends('layouts.template')

@section('content')
    <div class="rounded-lg bg-gray-800 border border-slate-600 p-4 text-slate-200 flex flex-col gap-3">
        <div>
            <label for="name" class="block mb-2 text-sm font-medium">Nome:</label>
            <input type="text" id="name" name="name" value="{{$contact ? $contact->name : ''}}" disabled class="border text-sm rounded-lg bg-gray-700 text-slate-400 block w-full p-2.5">
        </div>
        <div>
            <label for="contact" class="block mb-2 text-sm font-medium">Contato:</label>
            <input type="text" value="{{$contact ? $contact->contact : ''}}" disabled class="border text-sm rounded-lg bg-gray-700 block w-full text-slate-400 p-2.5">
        </div>
        <div>
            <label for="email" class="block mb-2 text-sm font-medium">Email:</label>
            <input type="email" value="{{$contact ? $contact->email : ''}}" disabled class="border text-sm rounded-lg bg-gray-700 block w-full text-slate-400 p-2.5">
        </div>
        <div class="mt-2 flex gap-2">
            <a href="{{route('contact.index')}}" class="font-medium text-green-500 rounded-lg px-2 py-1 border border-green-400 hover:bg-green-400 hover:border-slate-300 hover:text-slate-300 float-right">Voltar</a>
            <a href="{{route('contact.edit', $contact->id)}}" class="font-medium rounded-lg text-blue-500 px-2 py-1 border border-blue-400 hover:bg-blue-400 hover:border-slate-300 hover:text-slate-300 float-right">Editar</a>
            <form action="{{ route('contact.destroy', $contact->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="font-medium text-red-500 rounded-lg px-2 py-1 border border-red-400 hover:bg-red-400 hover:border-slate-300 hover:text-slate-300 float-right">Deletar</button>
            </form>
        </div>
    </div>
@endsection
