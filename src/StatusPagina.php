<?php
namespace Cyndaron\Minecraft;

use Cyndaron\Page;
use function array_walk;

final class StatusPagina extends Page
{
    public function __construct()
    {
        parent::__construct('Status en landkaart');
        $this->addCss('/vendor/cyndaron/module-minecraft/src/css/statuspage.min.css');

        $servers = Server::fetchAll([], [], 'ORDER BY name');
        array_walk($servers, static function(Server $server)
        {
            $server->retrieveInfo();
        });

        $this->addTemplateVars([
            'servers' => $servers,
        ]);
    }
}
