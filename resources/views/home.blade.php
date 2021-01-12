@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

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
                <div class="row">
                    <div class="col-md-4 offset-md-8">
                        <a href="{{ route('capturar') }}">
                            <button type="button" class="btn btn-success">Capturar Carros</button>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="text-center mt-4 mb-4">Lista de artigos</h3>
                    </div>
                </div>
                @if(count($artigos) > 0)
                    @foreach ($artigos as $key => $artigo)

                        <div class="card-body">
                            <a href="{{$artigo->link_veiculo}}" style="text-decoration: none;color: #000;" target="_blank">
                                <div class="row">
                                    <div class="col-3">
                                    <img width="827" height="593" src="{{$artigo->img_veiculo}}" style="border-radius: 20px;" class="img-fluid">
                                    </div>
                                    <div class="col-9">
                                        <h5><strong>{{$artigo->nome_veiculo}}</strong></h5>
                                        <ul style="list-style: none;">
                                                <li class="list-artigos"><span style="font-weight: bold;color: #222;">Ano:</span> <span>{{$artigo->ano_veiculo}}</span></li>
                                                <li class="list-artigos"><span style="font-weight: bold;color: #222;">Quilometragem:</span> <span>{{$artigo->quilometragem_veiculo}}</span></li>
                                                <li class="list-artigos"><span style="font-weight: bold;color: #222;">Combustível:</span> <span>{{$artigo->combustivel_veiculo}}</span></li>
                                                <li class="list-artigos"><span style="font-weight: bold;color: #222;">Câmbio:</span> <span>{{$artigo->cambio_veiculo}}</span></li>
                                                <li class="list-artigos"><span style="font-weight: bold;color: #222;">Portas:</span> <span>{{$artigo->portas_veiculo}}</span></li>
                                                <li class="list-artigos"><span style="font-weight: bold;color: #222;">Cor:</span> <span>{{$artigo->cor_veiculo}}</span></li>
                                                <li class="list-artigos"><span style="font-weight: bold;color: #01b4b3;">Preço:</span> <span>{{'R$ '.$artigo['preco_veiculo']}}</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 offset-8">
                                    <form action="{{ route('capturar.destroy', ['id' => $artigo->id_veiculo])}}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Remover</button>
                                    </form>
                                    </div>
                                </div>
                            </a>

                            <hr>
                        </div>

                    @endforeach

                @else
                    <p class="text-center">Nenhum Artigo Encontrado.</p>
                @endif

                {{$artigos->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
