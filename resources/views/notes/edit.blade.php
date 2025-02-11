@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-warning">✏️ Edit Note</h2>
            <a href="{{ route('notes.index') }}" class="btn btn-secondary px-4 py-2 rounded-pill shadow">⬅ Back</a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show rounded-3 shadow-sm" role="alert">
                <strong>❌ Oops!</strong> There were some problems:
                <ul class="mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-lg border-0 rounded-4 p-4">
            <form action="{{ route('notes.update', $note->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label fw-bold">📌 Title</label>
                    <input type="text" name="title" id="title" class="form-control rounded-3 shadow-sm"
                        value="{{ old('title', $note->title) }}" placeholder="Enter note title..." required>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label fw-bold">📝 Content</label>
                    <textarea name="content" id="content" class="form-control rounded-3 shadow-sm" rows="15"
                        placeholder="Edit your note..." required>{{ old('content', $note->content) }}</textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('notes.index') }}" class="btn btn-danger px-4 py-2 rounded-pill shadow">❌ Cancel</a>
                    <button type="submit" class="btn btn-warning px-4 py-2 rounded-pill shadow">✅ Update Note</button>
                </div>


            </form>
        </div>
    </div>
@endsection
