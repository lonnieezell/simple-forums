<?php namespace App\Controllers;

use App\Domains\Forums\ForumManager;
use App\Domains\Forums\ThreadManager;
use App\Domains\Posts\PostModel;
use Config\Services;

class ForumController extends BaseController
{
	/**
	 * @var \App\Domains\Forums\ForumManager
	 */
	protected $forums;

	/**
	 * @var \App\Domains\Forums\ThreadManager
	 */
	protected $threads;

	public function __construct(...$params)
	{
		parent::__construct(...$params);

		$this->forums = new ForumManager();
		$this->threads = new ThreadManager();
	}

	/**
	 * Displays the forums in a block/category view.
	 */
	public function showCategories()
	{
		helper('typography');

		$categories = $this->forums
			->with('forums')
			->findCategories();

		echo $this->render('forums/categories', [
			'categories' => $categories,
			'formatter'  => Services::typography()
		]);
	}

	/**
	 * Displays the forums as recent discussions view.
	 */
	public function showRecent()
	{
		echo $this->render('forums/recent', [
			'threads'       => $this->threads->paginate(20),
			'pager'         => $this->threads->pager,
			'totalThreads'  => $this->threads->totalThreads(),
		]);
	}

	/**
	 * Displays the overview of a single forum.
	 *
	 * @param int $id
	 */
	public function showForum(string $slug)
	{
		$id = (int)$slug;
		$forum = $this->forums
			->with('threads')
			->find($id);

		echo $this->render('forums/show', [
			'forum'     => $forum,
			'threads'   => $forum->threads,
			'pager'     => $this->threads->pager,
		]);
	}

}
