<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artigo;

class testeUplexisController extends Controller
{
    private $url = 'https://uplexis.com.br/blog/';

    public function __construct(Artigo $artigos)
    {
        $this->artigos = $artigos;
    }

    public function requisicao()
    {   
        // Start curl.
        $ci = curl_init();
        // Seta algumas opções
        curl_setopt($ci, CURLOPT_URL, $this->url);
        curl_setopt($ci, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ci, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ci, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ci, CURLOPT_SSL_VERIFYHOST, false);
        // Envia a requisição e salva a resposta
        $response = curl_exec($ci);
        // Conferir se houve algum error.
        if(curl_exec($ci) == false){
            echo 'Curl error: '.curl_error($ci);
        }
        // Fecha a requisição e limpa a memória
        curl_close($ci);

        // Get answer and do data separation.
        preg_match_all('/Blog<\/h2>(.*?)page-link/isu', $response, $toSeparate);
        // Take separation and cut out data.
        preg_match_all('/title">(.*?)<\/div>(:?.*?)href="(.*?)"/isu', $toSeparate[1][0], $clipping);

        // Inserting articles into the database.
        foreach ($clipping[1] as $key => $title) {

            $insert = $this->artigos->create([
                'users_id' => 1,
                'titulo' => ltrim($title), 
                'link' => $clipping[3][$key] 
            ]);

        }

        echo '<pre>';
        print_r($insert);
        exit();

    }









    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
    public function destroy($id)
    {
        //
    }
}
