<?php

namespace App\Http\Controllers\Api;

use App\Api\ApiMessages;
use App\Http\Controllers\Controller;
use App\Models\Ordered;
use App\Http\Requests\StoreOrderedRequest;
use App\Http\Requests\UpdateOrderedRequest;
use App\Models\Client;
use Illuminate\Support\Facades\Validator;

class OrderedController extends Controller
{
    private $ordered;
    private $client;
    public function __construct(Ordered $ordered, Client $client)
    {
        $this->ordered = $ordered;
        $this->client = $client;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Ordereds = $this->ordered::all()->load('User', 'Client');
        return response()->json($Ordereds, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderedRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderedRequest $request)
    {
        $data = $request->all();

        //validando os parametros passado para cadastro de Client
        Validator::make($data, [
            'client.name' => 'required',
            'client.fone' => 'required',
            'client.email' => 'email|required'
        ])->validate();


        //validando os parametros passado para cadastro de Image
        Validator::make($data, [
            'images.*.title'  => 'required',
            'images.*.image' => 'file|required'
        ])->validate();

        try {

            //criar um novo usuario
            if (isset($data['client']) && count($data['client'])) {
                $client = $this->client->create($data['client']);
            }

            //criar a ordered
            $ordered_id = $client->Ordered()->create($data);

            //fazer upload de images
            $images = $data['images'];

            if ($images) {
                $imageUpload = [];
                foreach ($images as $image) {
                    $path = $image['image']->store('images', "public");
                    $imageUpload[] = ['url' => $path, "title" => $image['title'], "ordered_id" => $ordered_id['id']];
                }
                $this->ordered->image()->createMany($imageUpload);
            }

            //repondendo a solicitação de cadastro usando json
            return response()->json([
                'data' => [
                    'msg' => 'Ordered cadastrado com sucesso',
                ]

            ], 200);
        } catch (\Exception $e) {
            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Api\Ordered  $ordered
     * @return \Illuminate\Http\Response
     */
    public function show(Ordered $ordered)
    {
        //vai apresentar ordered com client user e stage
        $Ordered = $ordered->load('Client', 'User', 'Stage');
        return response()->json($Ordered, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderedRequest  $request
     * @param  \App\Models\Api\Ordered  $ordered
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateOrderedRequest $request)
    {
        $data = $request->all();

        //validando os parametros passado para cadastro de Client
        Validator::make($data, [
            'client.name' => 'required',
            'client.fone' => 'required',
            'client.email' => 'email|required'
        ])->validate();


        //validando os parametros passado para cadastro de Image
        Validator::make($data, [
            'images.*.title'  => 'required',
            'images.*.image' => 'file|required'
        ])->validate();
        try {

            if (isset($data['client']) && count($data['client'])) {
                $client = $this->client->findOrFail($data['client']['id']);
                $client->update($data['client']);
            }

            $ordered = $this->ordered->findOrFail($id);
            $ordered_id = $ordered->update($data);

            $images = $data['images'];

            if ($images) {
                $imageUpload = [];

                foreach ($images as $image) {
                    $path = $image['image']->store('images', "public");
                    $imageUpload[] = ['url' => $path, "title" => $image['title'], "ordered_id" => $ordered_id['id']];
                }
                $this->ordered->image()->updateMany($imageUpload);
            }

            return response()->json([
                'data' => [
                    'msg' => 'Ordered cadastrado com sucesso',
                ]

            ], 200);
        } catch (\Exception $e) {
            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Api\Ordered  $ordered
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $ordered = $this->ordered->findOrFail($id);
            $ordered->delete();

            return response()->json([
                'data' => [
                    'msg' => 'Ordered Removido com Sucesso!',
                ]
            ], 200);
        } catch (\Throwable $th) {
            $message = new ApiMessages($th->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }
}
