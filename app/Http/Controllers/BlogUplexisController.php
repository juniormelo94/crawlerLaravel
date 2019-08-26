<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Artigo;
use App\Services\CurlService as curl;

class BlogUplexisController extends Controller
{
    private $url = 'https://uplexis.com.br/blog/?s=';

    /**
     * @return view
     */
    public function index()
    {
        return view('home.index');
    }

    /**
     * Executa busca no blog da Uplexis.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return view
     */
    public function search(Request $request)
    {   
        $response = (new curl())->curlGet($this->url.$request->search);

        preg_match_all('/title">(.*?)<\/div>(:?.*?)href="(.*?)"/isu', $response, $clipping);

        try {
            foreach ($clipping[3] as $key => $link) {

                $article = new Artigo();
                $validateData = $article->where('link', $link)->first();

                if ($validateData){
                    continue;
                }

                $article->create([
                    'user_id' => auth()->user()->id,
                    'titulo' => ltrim($clipping[1][$key]), 
                    'link' => $link 
                ]);
            }

            return view('home.index')
                        ->with(
                            'message',
                            'Artigos relacionados a '.$request->search.', foram salvos com sucesso!'
                        );
        } catch (Exception $e) {
            return view('home.index')
                        ->with(
                            'message',
                            'Falha ao tentar salvar artigos relacionados a '.$request->search.'!'
                        );
        }
    }

    /**
     * List articles.
     *
     * @return view.
     */
    public function listArticles()
    {
        $dataArticles = Artigo::get();
        $dataArticles = $dataArticles ? $dataArticles : [];

        return view('home.listArticles', compact('dataArticles'));
    }

    /**
     * Delete article.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        try {
            $dataArticle = Artigo::find($id);
            $deleteArticle = $dataArticle->delete();

            return (new Response([
                    'status' => 'success',
                    'message' => 'Artigo excluido com sucesso!'
                ], 200))->header('Content-Type', 'json');
        } catch (Exception $e) {
            return (new Response([
                    'status' => 'errors',
                    'message' => 'Falha ao tentar excluir artigo!'
                ], 500))->header('Content-Type', 'json');
        }
    }
}
