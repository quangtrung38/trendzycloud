<?php

namespace quangtrung38\trendzycloud;

use GuzzleHttp\Client;

class TrendzyCloud
{
    public $token = '';

    /**
     * Create new
     *
     * @return void
     */
    public function __construct()
    {
        $this->token = config('trendzycloud.token');
    }

    /**
     *
     * @param array $request
     * @return Response
     */
    public function uploadImage($request)
    {
        try
        {
            $file = $request['file'];

            $options = [
                'multipart' => [
                    [
                        'Content-type' => 'multipart/form-data',
                        'name'         => 'image',
                        'contents'     => fopen($file->getPathname(), 'r'),
                        'filename'     => $file->getClientOriginalName(),
                        'Mime-Type'    => $file->getmimeType()
                    ],
                    [
                        'name' => 'userId',
                        'contents' => $request['userId']
                    ]
                ]
            ];

            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json', 'token' => $this->token ]
            ]);
            $response = $client->request('POST', config('trendzycloud.base_api') . '/image', $options);

            $records = json_decode($response->getBody()->getContents());

            return ['result'=> 'OK', 'records' => $records->data];
        } catch (\Exception $e) {
            return ['result'=> 'NG', 'message' => $e->getMessage()];
        }
    }

    public function deleteImage($request)
    {
        try
        {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json', 'token' => $this->token ]
            ]);
            $response = $client->delete(config('trendzycloud.base_api') . '/image/' . $request['key'], []);

            $records = json_decode($response->getBody()->getContents());

            return ['result'=> 'OK', 'records' => $records];
        } catch (\Exception $e) {
            return ['result'=> 'NG', 'message' => $e->getMessage()];
        }
    }

    /**
     *
     * @param array $request
     * @return Response
     */
    public function uploadVideo($request)
    {
        try
        {
            $file = $request['file'];

            $data = [
                'multipart' => [
                    [
                        'Content-type' => 'multipart/form-data',
                        'name'         => 'video',
                        'contents'     => fopen($file->getPathname(), 'r'),
                        'filename'     => $file->getClientOriginalName(),
                        'Mime-Type'    => $file->getmimeType()
                    ],
                    [
                        'name' => 'userId',
                        'contents' => $request['userId']
                    ]
                ]
            ];

            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json', 'token' => $this->token ]
            ]);
            $response = $client->request('POST', config('trendzycloud.base_api') . '/video', $data);

            $records = json_decode($response->getBody()->getContents());

            return ['result'=> 'OK', 'records' => $records->data];
        } catch (\Exception $e) {
            return ['result'=> 'NG', 'message' => $e->getMessage()];
        }
    }

    public function deleteVideo($request)
    {
        try
        {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json', 'token' => $this->token ]
            ]);
            $response = $client->delete(config('trendzycloud.base_api') . '/video/' . $request['key'], []);

            $records = json_decode($response->getBody()->getContents());

            return ['result'=> 'OK', 'records' => $records];
        } catch (\Exception $e) {
            return ['result'=> 'NG', 'message' => $e->getMessage()];
        }
    }

    /**
     *
     * @param array $request
     * @return Response
     */
    public function uploadDocument($request)
    {
        try
        {
            $file = $request['file'];

            $data = [
                'multipart' => [
                    [
                        'Content-type' => 'multipart/form-data',
                        'name'         => 'document',
                        'contents'     => fopen($file->getPathname(), 'r'),
                        'filename'     => $file->getClientOriginalName(),
                        'Mime-Type'    => $file->getmimeType()
                    ],
                    [
                        'name' => 'userId',
                        'contents' => $request['userId']
                    ]
                ]
            ];

            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json', 'token' => $this->token ]
            ]);
            $response = $client->request('POST', config('trendzycloud.base_api') . '/document', $data);

            $records = json_decode($response->getBody()->getContents());

            return ['result'=> 'OK', 'records' => $records->data];
        } catch (\Exception $e) {
            return ['result'=> 'NG', 'message' => $e->getMessage()];
        }
    }

    public function deleteDocument($request)
    {
        try
        {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json', 'token' => $this->token ]
            ]);
            $response = $client->delete(config('trendzycloud.base_api') . '/document/' . $request['key'], []);

            $records = json_decode($response->getBody()->getContents());

            return ['result'=> 'OK', 'records' => $records];
        } catch (\Exception $e) {
            return ['result'=> 'NG', 'message' => $e->getMessage()];
        }
    }

}