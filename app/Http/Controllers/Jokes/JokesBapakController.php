<?php

namespace App\Http\Controllers\Jokes;

use App\Http\Controllers\Controller;
use App\Repositories\Jokes\JokesBapakRepo;
use Illuminate\Http\Request;

class JokesBapakController extends Controller
{
    public function __construct(JokesBapakRepo $jokes)
    {
        $this->jokes = new JokesBapakRepo();
    }
    public function getList()
    {
        $data = $this->jokes->getList();
        return $data;
    }
    public function getSave(Request $req)
    {
        $data = [
            'jokes_bapak_id' => $req->input('jokes_bapak_id'),
            'nama_jokes' => $req->input('nama_jokes'),
            'jawaban_jokes' => $req->input('jawaban_jokes'),
        ];

        $data = $this->jokes->getSave($data);
        return $data;
    }
    public function getDelete($jokesBapakId)
    {
        $data = [
            'jokes_bapak_id' => $jokesBapakId,
        ];
        $data = $this->jokes->getDelete($data);
        return $data;
    }
}
