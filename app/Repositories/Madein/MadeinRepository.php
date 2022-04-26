<?php
namespace App\Repositories\Madein;

use App\Repositories\EloquentRepository;

class MadeinRepository extends EloquentRepository implements MadeinRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Madein::class;
    }

}
?>
