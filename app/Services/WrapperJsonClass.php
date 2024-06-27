<?php

namespace App\Services;

use Exception;
use Illuminate\Http\Response;
use App\Exceptions\ApiException;
use Illuminate\Http\Client\Factory;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Request;
use App\Services\Contracts\WrapperJsonContract;

class WrapperJsonClass implements WrapperJsonContract
{
    /**
     *
     * @var Factory
     */
    protected Factory $client;

    /**
     *
     * @var string
     */
    protected string $url;

    /**
     *
     * @param Factory $client
     */
    public function __construct(Factory $client)
    {
        $this->client = $client;
        $this->url = env('E_USER_API');
    }

    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param array $userLoginInfo
     * @return array
     */
    public function openSession($userLoginInfo): array
    {
        $requestUrl = $this->url . "/api/v1/user/login";
        $response = $this->getClient()->post($requestUrl, $userLoginInfo);
        $user = $this->handleResponse($response, $requestUrl, $userLoginInfo);
        return $user;
    }

    /**
     * @param string $token
     * @return array
     */
    public function closeSession($token): array
    {
        $requestUrl = $this->url . "/api/v1/user/logout";
        $response = $this->getClient()->withToken($token["value"])->post($requestUrl);
        $user = $this->handleResponse($response, $requestUrl);
        return $user;
    }

    /**
     * @return array
     */
    public function getAllPackages(): array
    {
        $requestUrl = $this->url . '/api/v1/subscription/packages';
        $openPack = $this->getClient()->get($requestUrl);
        $response = $this->handleResponse($openPack, $requestUrl);
        return $response['data']['packages'];
    }

    /**
     * @param string $token
     * @param array $data
     * @return void
     */
    public function makeSubscriptionPayment($token, $data)
    {
        $requestUrl = $this->url . '/api/v1/subscription/create';
        $payResponse = $this->getClient()->withToken($token['value'])->post($requestUrl, $data);
        $response = $this->handleResponse($payResponse, $requestUrl, $data);
        return $response;
    }

    public function currentConnectedUser($token)
    {
        $requestUrl = $this->url . '/api/v1/user/profile';
        $payPack =  $this->getClient()->withToken($token['value'])->get($requestUrl);
        $response = $this->handleResponse($payPack, $requestUrl);
        return $response['data'];
    }

    /**
     * Get profile data of the currently logged-in user
     *
     * @param string $token
     * @return array
     */
    public function getCurrentUser($token): array
    {
        $requestUrl = $this->url . "/api/v1/user/profile";
        $response = $this->getClient()->withToken($token['value'])->get($requestUrl);
        $user = $this->handleResponse($response, $requestUrl)['data'];
        return $user;
    }

    /**
     * @param array $user
     * @param integer $id
     * @param string $token
     * @return void
     */
    public function updateCurrentUser($dataUser, $id, $token)
    {
        $requestUrl = $this->url . '/api/v1/update/authUser/';
        $reponse =  $this->getClient()->withToken($token['value'])->patch($requestUrl, $dataUser);
        return $this->handleResponse($reponse, $requestUrl, $dataUser);
    }

    /**
     * @param array $passord
     * @param integer $id
     * @param string $token
     * @return void
     */
    public function resetPasswordForget($passord, $id, $token)
    {
        $requestUrl = $this->url . '/api/v1/reset/passwordUser/' . $id;
        $user = $this->getClient()->withToken($token['value'])->patch($requestUrl);
        $response = $this->handleResponse($user, $requestUrl);
        return $response;
    }

    /**
     * @param integer $id
     * @param string $token
     * @return void
     */
    public function destroyUser($id, $token)
    {
        $requestUrl = $this->url . '/api/v1/delete/user/' . $id;
        $user = $this->getClient()->withToken($token['value'])->get($requestUrl);
        $response = $this->handleResponse($user, $requestUrl);
        return $response;
    }

    /**
     * @param array $newUser
     * @return array
     */
    public function createUser($newUser): array
    {
        $requestUrl = $this->url . "/api/v1/user/register";
        $userCreated = $this->getClient()->post($requestUrl, $newUser);
        $response = $this->handleResponse($userCreated, $requestUrl);
        return $response;
    }

    /**
     * Get the profile data of a user
     *
     * @param string $cip
     * @param string $token
     * @return array
     */
    public function getUser($cip, $token): array
    {
        $requestUrl = $this->url . "/api/v1/user/$cip/profile";
        $response = $this->getClient()->withToken($token['value'])->get($requestUrl);
        $user = $this->handleResponse($response, $requestUrl)['data'];
        return $user;
    }

    /**
     * @param array $token
     * @return void
     */
    public function ensureTokenIsValid($token)
    {
        $requestUrl = $this->url . '/api/v1/user/is/connect';
        $response = $this->getClient()->withToken($token['value'])->get($requestUrl);
        $this->handleResponse($response, $requestUrl);
        return 0;
    }

    /**
     * @param array $data
     * @return array
     */
    public function resetPassword($data): array
    {
        $requestUrl = $this->url . '/api/v1/user/reset-password';
        $status = $this->getClient()->post($requestUrl, $data);
        $response = $this->handleResponse($status, $requestUrl, $data);
        return $response;
    }

    /**
     * @param array $data
     * @param array $token
     * @return void
     */
    public function activeAccount($data, $token)
    {
        $requestUrl = $this->url . '/api/v1/user/activate-account';
        $pin = $this->getClient()->withToken($token['value'])->post($requestUrl, $data);
        $response = $this->handleResponse($pin, $requestUrl, $data);
        return $response["data"]["message"];
    }

    /**
     * @param array $data
     * @param array $token
     * @return void
     */
    public function validatedCode($data, $token)
    {
        $requestUrl = $this->url . '/api/v1/user/valide-code';
        $pin = $this->getClient()->withToken($token['value'])->post($requestUrl, $data);
        $response = $this->handleResponse($pin, $requestUrl, $data);
        return $response;
    }

    /**
     * @param array $token
     * @return void
     */
    public function showAllPackageToPay(array $token)
    {
        $requestUrl = $this->url . '/api/v1/customers/visible/all';
        $payPack = $this->getClient()->withToken($token['value'])->get($requestUrl);
        $response = $this->handleResponse($payPack, $requestUrl);
        return $response;
    }

    public function getSubscriptions(array $token, int $user, bool $onlySponsored = false)
    {
        $requestUrl = $this->url . '/api/v1/users/' . $user . '/subscriptions';
        if ($onlySponsored == true) {
            $requestUrl .= "?onlySponsored";
        }
        $response = $this->getClient()->withToken($token['value'])->get($requestUrl);
        return $this->handleResponse($response, $requestUrl);
    }

    /**
     * @param array $token
     * @return void
     */
    public function getPrice(array $token)
    {
        $requestUrl = $this->url . 'prices';
        $payPack = $this->getClient()->withToken($token['value'])->get($requestUrl);
        $response = $this->handleResponse($payPack, $requestUrl);
        return $response;
    }

    /**
     * @param array $data
     * @param array $token
     * @return void
     */
    public function createPrice(array $data, array $token)
    {
        $requestUrl = $this->url . 'prices';
        $status = $this->getClient()->post($requestUrl, $data);
        $response = $this->handleResponse($status, $requestUrl, $data);
        return $response;
    }

    /**
     * @param string $id
     * @param array $data
     * @param array $token
     * @return void
     */
    public function updatePrice(string $id, array $data, array $token)
    {
        $requestUrl = $this->url . 'prices'. $id;
        $status = $this->getClient()->post($requestUrl, $data);
        $response = $this->handleResponse($status, $requestUrl, $data);
        return $response;
    }

    public function deletePrice(string $id, array $token)
    {
        $requestUrl = $this->url . 'prices' . $id;
        $user = $this->getClient()->withToken($token['value'])->get($requestUrl);
        $response = $this->handleResponse($user, $requestUrl);
        return $response;
    }

    /**
     * @param Response $response
     * @param string $requestUrl
     * @return array
     * @throws \Exception
     */
    protected function handleResponse($response, $requestUrl, $payload = null): array
    {
        $data = $response->json();
        $status = $data['status'] ?? 'error';

        if ($response["status"] != "success" || $status === 'error') {
            $message = $data['message'] ?? $response->reason();

            $apiException = new ApiException(Lang::get($message));
            $apiException->setRequestUrl($requestUrl)->setResponse($response);
            if (isset($payload)) {
                $apiException->setRequestPayload($payload);
            }

            throw $apiException;
        }

        if ($response == null) {
            $message = $data['message'] ?? $response->reason();

            $apiException = new ApiException(Lang::get($message));
            $apiException->setRequestUrl($requestUrl)->setResponse($response);
            if (isset($payload)) {
                $apiException->setRequestPayload($payload);
            }

            throw $apiException;
        }

        return $data;
    }
}
