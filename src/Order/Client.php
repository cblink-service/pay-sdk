<?php

namespace Cblink\Service\Pay\Order;

use Cblink\Service\Pay\Kernel\BaseApi;
use Ramsey\Uuid\Uuid;

class Client extends BaseApi
{
    /**
     * 获取订单列表
     *
     * @param array $query
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function lists(array $query = [])
    {
        return $this->httpGet('/api/base/order', $query);
    }

    /**
     * 创建订单
     *
     * @param array $data
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function create(array $data = [])
    {
        if (empty($data['expired_time'])) {
            $data['expired_time'] = 7200;
        }

        if (empty($data['client_ip'])) {
            $data['client_ip'] = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
        }

        if (empty($data['request_id'])) {
            $data['request_id'] = Uuid::uuid1()->toString();
        }

        if (empty($data['original_amount']) && !empty($data['amount'])) {
            $data['original_amount'] = $data['amount'];
        }

        if (empty($data['currency'])) {
            $data['currency'] = 'cny';
        }

        return $this->httpPost('api/base/order', $data);
    }

    /**
     * 获取订单详情
     *
     * @param $id
     * @param bool $repay
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function query($id, bool $repay = false)
    {
        return $this->httpGet(sprintf('api/base/order/%s', $id), [
            'repay' => (int) $repay
        ]);
    }

    /**
     * 关闭订单
     *
     * @param $id
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function close($id)
    {
        return $this->httpPost(sprintf('api/base/order/%s/close', $id));
    }
}