@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-primary">📝 {{ $note->title }}</h2>
            <a href="{{ route('notes.index') }}" class="btn btn-secondary px-4 py-2 rounded-pill shadow">⬅ Back</a>
        </div>

        <div class="card shadow-lg border-0 rounded-4 p-4 glass-effect">
            <div class="card-body">
                <p class="card-text fs-5 text-dark">{{ $note->content }}</p>
                <hr>
                <div class="d-flex justify-content-between">
                    <small class="text-muted fst-italic">🕒 Created at:
                        {{ $note->created_at->format('d M Y, H:i A') }}</small>
                    <div>
                        <a href="{{ route('notes.edit', $note->id) }}"
                            class="btn btn-warning px-4 py-2 rounded-pill shadow">✏️ Edit</a>
                        <form action="{{ route('notes.destroy', $note->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger px-4 py-2 rounded-pill shadow"
                                onclick="return confirm('Are you sure?');">🗑 Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
