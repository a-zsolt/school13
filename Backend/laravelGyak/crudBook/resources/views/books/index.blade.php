@extends('layouts.app')

@section('content')
    @if(session('status'))
        <div class="alert alert-primary text-center" role="alert" id="status-alert">
            {{ session('status') }}
        </div>
        <script>
            setTimeout(function() {
                let alert = document.getElementById('status-alert');
                if (alert) {
                    alert.style.transition = "opacity 0.5s ease";
                    alert.style.opacity = "0";
                    setTimeout(function() { alert.remove(); }, 500);
                }
            }, 5000);
        </script>
    @endif
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Cím</th>
                <th scope="col">Szerző</th>
                <th scope="col">Év</th>
                <th scope="col">Ár</th>
                <th scope="col">Műveletek</th>
            </tr>
        </thead>
        <tbody>
            @forelse($books as $book)
                <tr>
                    <th scope="row">{{$book->title}}</th>
                    <td>{{$book->author}}</td>
                    <td>{{$book->published_year}}</td>
                    <td>{{$book->price}} Ft</td>
                    <td>
                        <div class="d-inline-flex gap-2">
                            <a href="{{ route('books.edit', ['id' => $book->id]) }}" class="btn btn-outline-info">Szerkesztés</a>
                            <form method="POST" action="{{ route('books.destroy', ['id' => $book->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">X</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <td colspan="5">
                    <div class="alert alert-info" role="alert">
                        Nincsen megjeleníthető könyv!
                    </div>
                </td>
            @endforelse
        </tbody>
    </table>
@endsection
