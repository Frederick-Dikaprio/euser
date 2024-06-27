<?php

namespace App\Services\Contracts;

use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Lang;

interface WrapperJsonContract
{
    /**
     * @return array
     */
    public function getAllPackages(): array;

    /**
     * @param string $token
     * @param array $data
     * @return void
     */
    public function makeSubscriptionPayment(string $token, array $data);

    /**
     * @param array $userLoginInfo
     * @return array
     */
    public function openSession(array $userLoginInfo): array;

    /**
     * @param string $token
     * @return array
     */
    public function closeSession(string $token): array;

    /**
     * @param string $token
     */
    public function currentConnectedUser(string $token);

    /**
     * Get profile data of the currently logged-in user
     *
     * @param string $token
     * @return array
     */
    public function getCurrentUser(string $token): array;

    /**
     * @param array $user
     * @param integer $id
     * @param string $token
     * @return void
     */
    public function updateCurrentUser(array $dataUser, int $id, string $token);

    /**
     *
     * @param array $passord
     * @param integer $id
     * @param string $token
     * @return void
     */
    public function resetPasswordForget(array $passord, int $id, string $token);

    /**
     *
     * @param integer $id
     * @param string $token
     * @return void
     */
    public function destroyUser(int $id, string $token);

    /**
     *
     * @param array $user
     * @return array
     */
    public function createUser(array $user): array;

    /**
     * Get the profile data of a user
     *
     * @param string $cip
     * @param string $token
     * @return array
     */
    public function getUser(string $cip, string $token): array;

    /**
     *
     * @param array $token
     * @return void
     */
    public function ensureTokenIsValid(array $token);

    /**
     *
     * @param array $data
     * @return void
     */
    public function resetPassword(array $data): array;

    /**
     *
     * @param array $data
     * @param array $token
     * @return void
     */
    public function activeAccount(array $data, array $token);

    /**
     *
     * @param array $data
     * @param array $token
     * @return void
     */
    public function validatedCode(array $data, array $token);

    /**
     *
     * @param array $token
     * @return void
     */
    public function showAllPackageToPay(array $token);

    /**
     * @return array
     */
    public function getSubscriptions(array $token, int $user, bool $onlySponsored = false);

    /**
     *
     * @param array $token
     * @return void
     */
    public function getPrice(array $token);

    /**
     *
     * @param array $data
     * @param array $token
     * @return void
     */
    public function createPrice(array $data, array $token);

    /**
     *
     * @param string $id
     * @param array $data
     * @param array $token
     * @return void
     */
    public function updatePrice(string $id, array $data, array $token);

    /**
     *
     * @param string $id
     * @param array $token
     * @return void
     */
    public function deletePrice(string $id, array $token);
}
