<?php

namespace Cblink\Service\Pay\Refund;

use Cblink\Service\Pay\Kernel\BaseApi;

class Client extends BaseApi
{
    /**
     * 退单列表
     *
     * @param array $query
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function lists(array $query = [])
    {
        return $this->httpGet('api/base/refund', $query);
    }

    /**
     * 创建退单
     *
     * @param array $data
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function create(array $data = [])
    {
        return $this->httpPost('api/base/refund', $data);
    }

    /**
     * 查询退单
     *
     * @param $id
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function query($id)
    {
        return $this->httpGet(sprintf('api/base/refund/%s', $id));
    }
}