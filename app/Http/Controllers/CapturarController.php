<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreArtigos;
use App\Models\Artigos;

class CapturarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('capturar');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = [];
        $dado = $request->get('capturar');
        $html = $this->getArtigos($dado);
        $regexArray = $this->regexArtigo();

        foreach ($regexArray as $ind => $reg) {
            preg_match_all($reg, $html, $dados[$ind]);
            unset($dados[$ind][0]);
        }

        $qtdCar = count($dados['id_carro'][1]);
        $zero = 0;

        for ($i = 0; $i < $qtdCar; $i++) {
            $carro[$i]['id_veiculo'] = $dados['id_carro'][1][$i];
            $carro[$i]['id_usuario'] = auth()->User()->id;
            $carro[$i]['link_veiculo'] = $dados['link_titulo'][1][$i];
            $carro[$i]['nome_veiculo'] = $dados['link_titulo'][2][$i];
            $carro[$i]['img_veiculo'] = $dados['img_carro'][2][$i];

            $preco = explode('036; ', $dados['preco_veiculo'][1][$i]);
            $carro[$i]['preco_veiculo'] = strip_tags($preco[1]);
            for ($j = 0; $j < 6; $j++) {
                $carro[$i]['ano_veiculo'] = $dados['dados_carro'][2][$zero + 0];
                $carro[$i]['quilometragem_veiculo'] = $dados['dados_carro'][2][$zero + 1];
                $carro[$i]['combustivel_veiculo'] = $dados['dados_carro'][2][$zero + 2];
                $carro[$i]['cambio_veiculo'] = $dados['dados_carro'][2][$zero + 3];
                $carro[$i]['portas_veiculo'] = $dados['dados_carro'][2][$zero + 4];
                $carro[$i]['cor_veiculo'] = $dados['dados_carro'][2][$zero + 5];
            }
            $zero += 6;
            $artigo = Artigos::create($carro[$i]);
        }

        return redirect()->route('home')->with('success', 'Captura Realizada com Sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request, $id) {

        $artigo = Artigos::findOrFail($id);

        if ($artigo) {
            $artigo->delete();
            return redirect()->route('home')->with('success', 'Artigo removido com sucesso!');
        }

        return redirect()->route('home')->with('error', 'Houve um erro ao deletar o artigo');
    }

    private function getArtigos($dado)
    {

        $headers = array(
            'Accept: application/json',
            'Content-Type: application/json',
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.questmultimarcas.com.br/estoque?termo=' . $dado);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $html = curl_exec($ch);
        curl_close($ch);

        return $html;
    }

    private function regexArtigo()
    {
        $regex = [
            'id_carro' => '/<article class="card clearfix" id="\s*(.*)\s*">/',
            'img_carro' => '/<div class="card__img">\s*<a href="\s*(.*)\s*">\s*< *img[^>]*src *= *["\']?([^"\']*)/i',
            'link_titulo' => '/<h2 class="card__title ui-title-inner">\s*<a href="\s*(.*)\s*">\s*(.*)\s*<\/a><\/h2>/',
            'preco_veiculo' => '/<span class="card__price-number">\s*(.*)\s*<\/span>/',
            'dados_carro' =>
            '/<span class="card-list__title">\s*(.*)\s*<\/span>\s*<span class="card-list__info">\s*(.*)\s*<\/span>/'
        ];
        return $regex;
    }
}
