@extends('layouts.app')

@section('content')

    <style>
        .card,
        .card-footer {
            background: linear-gradient(135deg, rgba(240, 248, 255, 0.7), rgba(224, 255, 250, 0.7));
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: transform 0.2s ease-in-out;
        }

        .card:hover {
            transform: scale(1.02);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .btn:hover {
            transform: scale(1.08);
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
        }

        .card-body {
            color: #2C3E50;
        }

        .alert-success {
            background: rgba(40, 167, 69, 0.2);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border: 1px solid rgba(40, 167, 69, 0.3);
        }

        .btn {
            backdrop-filter: none;
        }
    </style>


    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-primary">📌 My Notes</h2>
            <a href="{{ route('notes.create') }}" class="btn btn-success px-4 py-2 rounded-pill shadow">
                ➕ Add New Note
            </a>
        </div>

        @if (session('success'))
            <div id="success-alert" class="alert alert-success alert-dismissible fade show rounded-pill shadow-sm"
                role="alert">
                ✅ {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('warning'))
            <div id="warning-alert" class="alert alert-warning alert-dismissible fade show rounded-pill shadow-sm"
                 role="alert">
                ⚠️ {{ session('warning') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <script>
            setTimeout(function() {
                let successAlert = document.getElementById('success-alert');
                if (successAlert) {
                    let fadeEffect = setInterval(function() {
                        if (!successAlert.style.opacity) {
                            successAlert.style.opacity = 1;
                        }
                        if (successAlert.style.opacity > 0) {
                            successAlert.style.opacity -= 0.1;
                        } else {
                            clearInterval(fadeEffect);
                            successAlert.remove();
                        }
                    }, 50);
                }
            }, 800);

            setTimeout(function() {
                let warningAlert = document.getElementById('warning-alert');
                if (warningAlert) {
                    let fadeEffect = setInterval(function() {
                        if (!warningAlert.style.opacity) {
                            warningAlert.style.opacity = 1;
                        }
                        if (warningAlert.style.opacity > 0) {
                            warningAlert.style.opacity -= 0.1;
                        } else {
                            clearInterval(fadeEffect);
                            warningAlert.remove();
                        }
                    }, 50);
                }
            }, 800);
        </script>

        @if ($notes->isEmpty())
            <div class="text-center p-5 bg-light rounded-3 shadow-lg">
                <h4 class="text-muted">📭 No notes available</h4>
                <p class="text-secondary">Start by creating your first note!</p>
                <a href="{{ route('notes.create') }}" class="btn btn-primary px-4 py-2 rounded-pill shadow">Create Note</a>
            </div>
        @else
            <div class="row">
                @foreach ($notes as $note)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-lg rounded-4 border-0">
                            <div class="card-body">
                                <h5 class="fw-bold text-primary">{{ Str::limit($note->title, 30) }}</h5>
                                <p class="text-muted ">{{ Str::limit($note->content, 80) }}</p>
                                <small
                                    class="text-secondary fst-italic text-end d-block ">{{ $note->created_at->format('d M Y, H:i A') }}</small>
                            </div>
                            <div class="card-footer  border-0 d-flex justify-content-between p-3">
                                <div class="d-flex justify-content-center mt-0">
                                    <form action="{{ route('notes.destroy', $note->id) }}" method="POST"
                                        class="d-flex gap-3">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('notes.show', $note->id) }}"
                                            class="btn btn-primary btn-sm rounded-pill fw-bold px-4 py-2 d-flex align-items-center justify-content-center"
                                            style="background-color: #6EA8FE; border-color: #6EA8FE;"> 👁 View </a>

                                        <a href="{{ route('notes.edit', $note->id) }}"
                                            class="btn btn-warning btn-sm rounded-pill fw-bold px-4 py-2 d-flex align-items-center justify-content-center"
                                            style="background-color: #FFD56B; border-color: #FFD56B;"> ✏ Edit </a>

                                        <button type="submit"
                                            class="btn btn-danger btn-sm rounded-pill fw-bold px-4 py-2 d-flex align-items-center justify-content-center"
                                            style="background-color: #FF6B6B; border-color: #FF6B6B;"
                                            onclick="return confirm('⚠ Are you sure?');"> 🗑 Delete </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="d-flex justify-content-end align-items-center mt-5">
            <div class="text-center mt-5">
                <form action="{{ route('notes.destroyAll') }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="btn btn-danger px-4 py-2 d-flex align-items-center gap-2"
                            style="background-color: #ee3f3f; border-color: #ee3f3f; border-radius: 40px"
                            onclick="return confirm('⚠️ Warning: This will permanently delete ALL notes. This action cannot be undone. Are you sure you want to continue?');">
                        <i class="bi bi-trash"></i>
                        🗑 Delete All Notes
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection
