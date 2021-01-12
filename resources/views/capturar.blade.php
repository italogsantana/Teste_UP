@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Capturar artigos</div>

                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>

                <form method="POST" action='{{ route("salvarArtigo") }}'>
                    @csrf
                    <div class="row">
                        <div class="col-md-11 ml-3">
                            <input type="text" name="capturar" id="capturar" class="form-control" placeholder="Digite o termo de pesquisa" />
                        </div>
                    </div>
                    <div class="row mt-3 mb-3">
                        <div class="col-md-3 offset-md-9">
                                <button type="submit" id="btnCapturar" class="btn btn-danger">Capturar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
