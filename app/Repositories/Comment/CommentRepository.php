<?php
namespace App\Repositories\Comment;

use App\Repositories\EloquentRepository;
use DB;

class CommentRepository extends EloquentRepository implements CommentRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Comment::class;
    }

    public function getWithUser($id)
    {
        return $this->model->with('user')->where('product_id', $id)->get();
    }
}
?>
