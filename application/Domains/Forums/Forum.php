<?php namespace App\Domains\Forums;

use CodeIgniter\Entity;

/**
 * A Forum is the top level organizational entity
 * and contains many threads.
 *
 * A group of forums can be further organized by
 * a "category", which is simply another forum
 * with "is_category" set to 1.
 *
 * Generated by Vulcan at 2017-06-27 16:47:pm
 */
class Forum extends Entity
{
	protected $id;
	protected $forum_id;
	protected $name;
	protected $description;
	protected $is_category;
	protected $thread_count;
	protected $post_count;
	protected $last_post;
	protected $created_at;
	protected $updated_at;
	protected $deleted_at;

	/**
	 * Holds any child forums that
	 * were populated by the Manager class.
	 *
	 * @var array
	 */
	public $forums = [];

	/**
	 * Holds any child threads that
	 * were populated by the Manager class.
	 *
	 * @var array
	 */
	public $threads = [];

	/**
	 * Maps names used in sets and gets against unique
	 * names within the class, allowing independence from
	 * database column names.
	 *
	 * Example:
	 *  $datamap = [
	 *      'db_name' => 'class_name'
	 *  ];
	 *
	 * @var array
	 */
	protected $datamap = [];

	/**
	 * Is the forum a category that would hold other forums?
	 *
	 * @return bool
	 */
	public function isCategory()
	{
		return (bool)$this->is_category;
	}

	/**
	 * Returns a full URL to the forum's main page.
	 */
	public function link()
	{
		return route_to('forumLink', $this->id);
	}


}