<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission as ModelsPermission;
use App\Traits\UuidTrait;

class Permission extends ModelsPermission
{
    use UuidTrait;
}
