@extends('layouts.template')

@section('content')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 h-14 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nome
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Contato
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 flex justify-center mt-3">
                        <a href="{{route('contact.create')}}" class="rounded-lg border border-slate-400 hover:border-slate-300 hover:bg-slate-600 hover:scale-105 transition-all transition-200 p-2">Novo Contato</a>
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach($contacts as $contact)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $contact->name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $contact->contact }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $contact->email }}
                    </td>
                    <td class="px-6 py-4 flex">
                        <a href="{{route('contact.show', $contact->id)}}" class="font-medium text-green-500 rounded-l-lg px-2 py-1 border border-green-400 hover:bg-green-400 hover:border-slate-300 hover:text-slate-300 float-right">Visualizar</a>
                        <a href="{{route('contact.edit', $contact->id)}}" class="font-medium text-blue-500 px-2 py-1 border border-blue-400 hover:bg-blue-400 hover:border-slate-300 hover:text-slate-300 float-right">Editar</a>
                        <form action="{{ route('contact.destroy', $contact->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-medium text-red-500 rounded-r-lg px-2 py-1 border border-red-400 hover:bg-red-400 hover:border-slate-300 hover:text-slate-300">Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
