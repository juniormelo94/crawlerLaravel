<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artigo;

class testeUplexisController extends Controller
{
    private $url = 'https://uplexis.com.br/blog/?s=';

    public function __construct(Artigo $artigos)
    {
        $this->artigos = $artigos;
    }

    public function requisicao(Request $request)
    {   
        $capture = $request->all();

        $ci = curl_init();
        
        curl_setopt($ci, CURLOPT_URL, $this->url.$capture['texto']);
        curl_setopt($ci, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ci, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ci, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ci, CURLOPT_SSL_VERIFYHOST, false);

        $response = curl_exec($ci);

        if(curl_exec($ci) == false){
            echo 'Curl error: '.curl_error($ci);
        }
        
        curl_close($ci);

        preg_match_all('/title">(.*?)<\/div>(:?.*?)href="(.*?)"/isu', $response, $clipping);

        $insert = [];

        foreach ($clipping[1] as $key => $title) {

            $validateData = $this->artigos->where('titulo', ltrim($title))->first();

            if ($validateData){
                continue;
            }

            $insert[] = $this->artigos->create([
                'users_id' => 1,
                'titulo' => ltrim($title), 
                'link' => $clipping[3][$key] 
            ]);
        }

        echo '<pre>';
        print_r($insert);
        exit();


        if($response)
            return redirect()->route('template')
                             ->with('sucesso', 'Artigos relacionados a '.$search['texto'].', foram salvos com sucesso!');
        else
            return redirect()->route('template')
                             ->with('erro', 'Falha ao tentar salvar artigos relacionados a '.$search['texto'].'!');
    }

    public function index()
    {
        return view('home.index');
    }

    public function table()
    {
        $dataArticles = $this->artigos->get();

        if($dataArticles){
            return view('home.table', compact('dataArticles'));
        }
        return redirect()->route('index')
                             ->with('erro', 'Falha ao tentar buscar dados!');

    }

    public function destroy(Request $request, $id)
    {
        dd($id);        //get the promotor viewed by id.
        $dataShowPromotor = $this->promotores->find($id);

        //delete promotor.
        $deletePromotor = $dataShowPromotor->delete();

        if($deletePromotor)
            return redirect(route('promotoresindex'));
        else
            return "Deletar item ".$id;
    }


    public function delete(Request $request, $id)
    {
        dd($id);  

        $dataShowPromotor = $this->promotores->find($id);

        //delete promotor.
        $deletePromotor = $dataShowPromotor->delete();

        if($deletePromotor)
            return redirect(route('promotoresindex'));
        else
            return "Deletar item ".$id;
    }









    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     //
    // }

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
    // public function destroy($id)
    // {
    //     //
    // }
}
