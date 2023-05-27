<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Pager extends BaseConfig
{
    /**
     * --------------------------------------------------------------------------
     * Templates
     * --------------------------------------------------------------------------
     *
     * Pagination links are rendered out using views to configure their
     * appearance. This array contains aliases and the view names to
     * use when rendering the links.
     *
     * Within each view, the Pager object will be available as $pager,
     * and the desired group as $pagerGroup;
     *
     * @var array<string, string>
     */
    public array $templates = [
        'default_full'   => 'CodeIgniter\Pager\Views\default_full',
        'default_simple' => 'CodeIgniter\Pager\Views\default_simple',
        'default_head'   => 'CodeIgniter\Pager\Views\default_head',
        'pager_instansi'   => 'App\Views\Pager\pager_instansi',
        'pager_user'   => 'App\Views\Pager\pager_user',
        'pager_infopublik'   => 'App\Views\Pager\pager_infopublik',
        'pager_sop'   => 'App\Views\Pager\pager_sop',
        'pager_regulasidata'   => 'App\Views\Pager\pager_regulasidata',
        'pager_laporandata'   => 'App\Views\Pager\pager_laporandata',
        'pager_permohonandata'   => 'App\Views\Pager\pager_permohonandata',
    ];

    /**
     * --------------------------------------------------------------------------
     * Items Per Page
     * --------------------------------------------------------------------------
     *
     * The default number of results shown in a single page.
     */
    public int $perPage = 20;
}
