<?php

namespace Core\Service\Util;


use App\Entity\User;
use App\Repository\UserRepository;

abstract class AuthenticationUtil
{
    static public function connectUser(User $user)
    {
        SessionUtil::getInstance()->set('userConnectedId', $user->getId());
    }

    static public function disconnectUser()
    {
        SessionUtil::getInstance()->remove('userConnectedId');
    }

    static public function isUserConnected(): bool
    {
        if (empty(SessionUtil::getInstance()->get('userConnectedId'))) {
            return false;
        } else {
            return true;
        }
    }

    static public function getUsetConnected(): ?User
    {
        $userConnectedId = SessionUtil::getInstance()->get('userConnectedId');

        $userRepository = new UserRepository();
        $userConnected = $userRepository->findUserById($userConnectedId);

        return $userConnected;
    }
}