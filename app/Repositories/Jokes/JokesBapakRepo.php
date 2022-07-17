<?php

namespace App\Repositories\Jokes;

use Carbon\Carbon;
use App\Models\Jokes\JokesBapak;

class JokesBapakRepo
{
    public function getList()
    {
        try {
            $data = JokesBapak::data()
                ->get()
                ->makeHidden(['dibuat_pada', 'diubah_pada', 'dihapus_pada']);
            return response()->json([
                'status' => 200,
                'message' => 'Jokes bapak-bapak nih bos ┳━┳ ノ( ゜-゜ノ)',
                'data' => [
                    'jokes_bapak' => $data,
                ],
            ]);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }
    public function getSave($params)
    {
        try {
            $namaJokes = isset($params['nama_jokes'])
                ? $params['nama_jokes']
                : '';
            if (strlen($namaJokes) == 0) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Nama jokes tidak boleh kosong',
                ]);
            }
            $jawabanJokes = isset($params['jawaban_jokes'])
                ? $params['jawaban_jokes']
                : '';
            if (strlen($jawabanJokes) == 0) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Jawaban jokes tidak boleh kosong',
                ]);
            }
            $jokesId = isset($params['jokes_bapak_id'])
                ? $params['jokes_bapak_id']
                : '';
            if (strlen($jokesId) == 0) {
                $data = new JokesBapak();
                $data->dibuat_pada = Carbon::now();
            } else {
                $data = JokesBapak::find($jokesId);
                if (is_null($data)) {
                    return response()->json([
                        'status' => 404,
                        'message' => 'Data tidak ditemukan',
                    ]);
                }
                if (!is_null($data->dihapus_pada)) {
                    return response()->json([
                        'status' => 404,
                        'message' => 'Data sudah dihapus',
                    ]);
                }
                $data->diubah_pada = Carbon::now();
            }

            $data->nama_jokes = $namaJokes;
            $data->jawaban_jokes = $jawabanJokes;
            $data->save();
            return response()->json([
                'status' => 200,
                'message' => 'Jokes bapak-bapak nih bos ┳━┳ ノ( ゜-゜ノ)',
                'data' => [
                    'jokes_bapak' => $data,
                ],
            ]);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }
    public function getDelete($params)
    {
        try {
            $jokesId = isset($params['jokes_bapak_id'])
                ? $params['jokes_bapak_id']
                : '';

            $data = JokesBapak::find($jokesId);
            if (is_null($data)) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Data tidak ditemukan',
                ]);
            }
            if (!is_null($data->dihapus_pada)) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Data sudah dihapus',
                ]);
            }
            $data->dihapus_pada = Carbon::now();
            $data->save();
            return response()->json([
                'status' => 200,
                'message' => 'Data Jokes berhasil dihapus',
            ]);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }
}
