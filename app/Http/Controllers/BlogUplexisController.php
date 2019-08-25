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
        $response = (new curl())->curlGet($this->url.$request->text);

        preg_match_all('/title">(.*?)<\/div>(:?.*?)href="(.*?)"/isu', $response, $clipping);

        try {
            foreach ($clipping[1] as $key => $title) {

                $article = new Artigo();
                $validateData = $article->where('titulo', ltrim($title))->first();

                if ($validateData){
                    continue;
                }

                $article->create([
                    'user_id' => auth()->user()->id,
                    'titulo' => ltrim($title), 
                    'link' => $clipping[3][$key] 
                ]);
            }

            return view('home.index')
                        ->with(
                            'sucesso',
                            'Artigos relacionados a '.$request->text.', foram salvos com sucesso!'
                        );
        } catch (Exception $e) {
            return view('home.index')
                        ->with(
                            'erro',
                            'Falha ao tentar salvar artigos relacionados a '.$request->text.'!'
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
