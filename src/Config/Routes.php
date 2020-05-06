<?php


namespace App\Config;


use App\Model\Entity\Post;
use  Core\Router\AbstractRoutes;
use  Core\Router\Route;

class Routes extends AbstractRoutes
{
    /**
     * @return Route[] Liste des routes
     */
    public function getRoutes(): array
    {

        return[
          new Route('homepage', 'Post', 'homePage'),
            new Route('autobiographie', 'Default', 'autobio'),
            new Route('chapitres', 'Post',  'list'),
            new Route('chapitre','Post','show'),
            new Route('connection', 'Admin\\Security', 'connection'),
            new Route('administration', 'Default', 'adminHomepage'),
            new Route('messages', 'Contact', 'listMessages'),
            new Route('chapitresAdmin', 'Post', 'listAdmin'),
            new Route('editPost','Post','edit'),
            new Route('newPost','Post','newPost'),
            new Route('deletePost','Post','deletePost'),
            new Route('listComments', 'Comment','listComments'),
            new Route('deleteComment', 'Comment', 'deleteComment'),
            new Route('reportComment', 'Comment', 'reportComment'),
            new Route('deReportComment', 'Comment', 'deReportComment'),
            new Route('contact','Contact','sendMessage'),
            new Route('error404','Default','error404'),
            new Route('error504','Default','error504')
        ];
    }

}