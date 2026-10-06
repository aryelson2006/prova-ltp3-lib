@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold mb-6">Editar Livro</h1>

    <form action="{{ route('livros.update', $livro) }}" method="POST"
          class="bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="titulo" class="block font-medium mb-1">
                Título
            </label>

            <input type="text"
                   name="titulo"
                   id="titulo"
                   value="{{ old('titulo', $livro->titulo) }}"
                   class="w-full rounded border px-3 py-2">

            @error('titulo')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="ano_publicacao" class="block font-medium mb-1">
                Ano de Publicação
            </label>

            <input type="number"
                   name="ano_publicacao"
                   id="ano_publicacao"
                   value="{{ old('ano_publicacao', $livro->ano_publicacao) }}"
                   class="w-full rounded border px-3 py-2">

            @error('ano_publicacao')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="isbn" class="block font-medium mb-1">
                ISBN
            </label>

            <input type="text"
                   name="isbn"
                   id="isbn"
                   value="{{ old('isbn', $livro->isbn) }}"
                   class="w-full rounded border px-3 py-2">

            @error('isbn')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="autor_id" class="block font-medium mb-1">
                Autor
            </label>

            <select name="autor_id"
                    id="autor_id"
                    class="w-full rounded border px-3 py-2">

                <option value="">Selecione um autor</option>

                @foreach($autores as $autor)
                    <option value="{{ $autor->id }}"
                        {{ old('autor_id', $livro->autor_id) == $autor->id ? 'selected' : '' }}>
                        {{ $autor->nome }}
                    </option>
                @endforeach

            </select>

            @error('autor_id')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-3">
            <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded">
                Atualizar
            </button>

            <a href="{{ route('livros.index') }}"
               class="bg-gray-500 text-white px-4 py-2 rounded">
                Voltar
            </a>
        </div>
    </form>
</div>
@endsection