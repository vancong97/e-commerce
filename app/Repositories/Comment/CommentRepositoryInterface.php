<?php
namespace App\Repositories\Comment;

interface CommentRepositoryInterface
{
    public function getWithUser($id);
}
?>
