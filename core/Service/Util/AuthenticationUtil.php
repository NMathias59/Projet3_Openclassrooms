<?php

namespace Core\Service\Util;


use App\Model\Entity\Admin;
use App\Model\Manager\LoginManager;

abstract class AuthenticationUtil
{
    static public function connectAdmin(Admin $admin)
    {
        SessionUtil::getInstance()->set('adminConnectedId', $admin->getId());
    }

    static public function disconnectAdmin()
    {
        SessionUtil::getInstance()->remove('adminConnectedId');
    }

    static public function isAdminConnected(): bool
    {
        if (empty(SessionUtil::getInstance()->get('adminConnectedId'))) {
            return false;
        } else {
            return true;
        }
    }

    static public function getAdminConnected(): ?Admin
    {
        $adminConnectedId = SessionUtil::getInstance()->get('adminConnectedId');

        $adminRepository = new LoginManager();
        $adminConnected = $adminRepository->findAdminById($adminConnectedId);

        return $adminConnected;
    }
}