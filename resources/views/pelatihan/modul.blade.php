@extends('layouts.main')

@section('container')
<div class="container mt-5">
    <p class="h1 fw-bold text-center mb-3">Modul {{ $training->tittle }}</p>
    <div class="col-lg-10 offset-1">
        <a href="/pelatihan" class="btn btn-primary mb-4 p-2 bd-highlight">Kembali</a>
        <div class="accordion accordion-flush" id="accordionFlushExample">
            @foreach ($modules as $modul)
                <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-{{ $modul->slug }}" aria-expanded="false">
                    {{ $modul->subject }}
                    </button>
                </h2>
                <div id="flush-{{ $modul->slug }}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <iframe class="col-12" height="720" src="https://www.youtube.com/embed/{{ $modul->videoLink }}" frameborder="0" allowfullscreen>
                        </iframe>
                    </div>
                </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
    
@endsection