<?php

namespace Jacksonit\Shipping;

use Validator;
use GuzzleHttp\Client;


class TrendzyCloud
{
    public $url             = '';
    public $token           = '';
    public $shop_id         = '';

    /**
     * Create new
     *
     * @return void
     */
    public function __construct()
    {
        $this->url              = config('trendzycloud.cloud.url');
        //$this->token            = config('shipping.ghn.token');
        //$this->shop_id          = config('shipping.ghn.shop_id');
    }

    /**
     *
     * @param array $input
     * @return Response
     */
    public function shippingFee($image)
    {
        try
        {

            $client = new Client();

            $response = $client->request('POST', $this->url, [
                'multipart' => [
                    [
                        'name'     => 'FileContents',
                        'contents' => $image,
                        'filename' => $name
                    ]
                ],
            ]);

            $records = json_decode($response->getBody()->getContents());

            if(empty($records) || $records->code != 200 || $records->message != 'Success') throw new \Exception('GHN Error');

            return ['result'=> 'OK', 'records' => ['total' => $records->data->total, 'service_fee' => $records->data->service_fee, 'coupon_value' => $records->data->coupon_value]];
        } catch (\Exception $e) {
            return ['result'=> 'NG', 'message' => $e->getMessage()];
        }
    }

}