<?php

namespace App\Admin\Repositories;

use App\Models\Mail as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Mail extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
