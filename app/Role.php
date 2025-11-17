<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as ModelsRole;
use App\Traits\UuidTrait;

class Role extends ModelsRole
{
    use UuidTrait;
}
