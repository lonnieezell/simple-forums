<?php namespace App\Domains\Posts\Types;

use App\Domains\Posts\Post;

/**
 * Class Discussion
 *
 * A general-purpose post type used for general discussions.
 *
 * @package App\Domains\Posts
 */
class DiscussionPost extends Post
{
	/**
	 * Icon type used to determine icon displayed
	 * on the post in a post list, to quickly show it's type.
	 *
	 * @var string
	 */
	protected $iconClass = 'post-discussion-icon';

	/**
	 * The name of the post type stored with each post in the db.
	 *
	 * @var string
	 */
	protected $typeSlug = 'discussion';

	/**
	 * The "namespaced" view that should be displayed
	 * for the form.
	 *
	 * @var string
	 */
	protected $formView = 'posts/discussion_form';

	/**
	 * The name of the view used to display the initial post in a thread.
	 *
	 * @var string
	 */
	protected $displayView = 'post/discussion_view';
}
