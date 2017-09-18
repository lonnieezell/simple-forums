<?php namespace App\Domains\Forums;

use Myth\ORM\EntityManager;
use App\Domains\Posts\PostManager;
use App\Domains\Users\UserManager;

/**
 * ThreadModel Model
 *
 * Generated by Vulcan at 2017-06-27 16:23pm
 */
class ThreadManager extends EntityManager
{
	protected $table      = 'threads';
	protected $primaryKey = 'id';

	protected $returnType     = 'App\Domains\Forums\Thread';
	protected $useSoftDeletes = false;

	protected $allowedFields = ['user_id', 'forum_id', 'title', 'first_post', 'last_post', 'views', 'post_count', 'deleted_at'];

	protected $useTimestamps = true;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $dateFormat    = 'datetime';

	protected $validationRules    = [
		'id'         => 'integer|max_length[11]',
		'user_id'    => 'integer|max_length[11]',
		'forum_id'   => 'integer|max_length[5]',
		'title'      => 'alpha_numeric_spaces|max_length[255]',
		'first_post' => 'integer|max_length[11]',
		'views'      => 'integer|max_length[20]',
		'posts'      => 'integer|max_length[11]',
		'created_at' => '',
		'updated_at' => '',
		'deleted_at' => '',

	];
	protected $validationMessages = [];
	protected $skipValidation     = false;

	protected function initialize()
	{
		$this->hasMany(PostManager::class);
		$this->belongsTo(UserManager::class);
	}

	/**
	 * Returns the total number of non-deleted
	 * threads in the system.
	 *
	 * @return int
	 */
	public function totalThreads(): int
	{
		return $this->builder()->where('deleted_at IS NULL')->countAllResults();
	}

	/**
	 * Finds a paginated list of threads that belong to
	 * a single forum.
	 *
	 * @param int $forumID
	 *
	 * @return mixed
	 */
	public function findForForum(int $forumID)
	{
		return $this->where('forum_id', $forumID)
			->paginate(20);
	}

}
