<?php
namespace App\Repositories\Suggest;

use App\Repositories\EloquentRepository;

class SuggestRepository extends EloquentRepository implements SuggestRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Suggest::class;
    }
}
?>
