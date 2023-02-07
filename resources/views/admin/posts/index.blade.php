@extends('admin.layouts.app')

@section('content')
    <div class="container">
        @if (session('success_delete'))
            <div class="alert alert-warning" role="alert">
                Il post con id {{ session('success_delete')->id }} e' stato eliminato correttamente
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">User ID</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Citta'</th>
                    <th scope="col">Tags</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->user_id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->city }}</td>
                        <td>
                            @foreach ($post->tags as $tag)
                                {{ $tag->name }}{{ $loop->last ? '' : ', ' }}
                            @endforeach
                        </td>

                        <td>
                            <form action="{{ route('admin.posts.destroy', ['post' => $post]) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <a href="{{ route('guest.posts.show', ['post' => $post]) }}" class="btn btn-primary">Visita</a>
                                <a href="{{ route('admin.posts.edit', ['post' => $post]) }}" class="btn btn-warning">Edita</a>
                                <button class="btn btn-danger btn-delete-me">Elimina</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $posts->links() }}
    </div>
@endsection
