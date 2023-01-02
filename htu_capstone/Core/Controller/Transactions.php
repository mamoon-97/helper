<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Base\View;
use Core\Helpers\Helper;
use Core\Helpers\Tests;
use Core\Model\Transaction;
use Core\Model\Tag;
use Core\Model\Item;

class Transactions extends Controller
{

    use Tests;

    public function render()
    {
        if (!empty($this->view))
            $this->view();
    }

    function __construct()
    {
        $this->auth();
        $this->admin_view(true);
    }

    /**
     * Gets all posts
     *
     * @return array
     */
    public function index()
    {
        $this->permissions(['post:read']);
        $this->view = 'transactions.index';
        $transaction = new Transaction; // new model transactions.
        $this->data['transactions'] = $transaction->get_all();
        $this->data['transactions_count'] = count($transaction->get_all());
        $item= new Item;
        $items=$item->get_all();
        $this->data['items']=$items;
        
    }

    public function single()
    {

        self::check_if_exists(isset($_GET['id']), "Please make sure the id is exists");

        $this->permissions(['post:read']);
        $this->view = 'transactions.single';
        $transaction = new Transaction();
        $this->data['transaction'] = $transaction->get_by_id($_GET['id']);
  
    }

    /**
     * Display the HTML form for post creation
     *
     * @return void
     */
    public function create()
    {
        $this->permissions(['post:create']);
        $this->view = 'transactions.create';
    }

    /**
     * Creates new post
     *
     * @return void
     */
    public function store()
    {
        $this->permissions(['post:create']);
        $transaction = new Transaction();
        //$_POST['user_id'] = $_SESSION['user']['user_id']; // this is the id of the current logged in user. Because the post creator would be the same logged in user.
        $transaction->create($_POST);
        Helper::redirect('/transactions');
    }

    /**
     * Display the HTML form for post update
     *
     * @return void
     */
    public function edit()
    {
        $this->permissions(['post:read', 'post:update']);
        $this->view = 'posts.edit';
        $post = new Post();
        $tag = new Tag();
        $selected_post = $post->get_by_id($_GET['id']);
        $selected_post->tags = $tag->get_all();
        $this->data['post'] = $selected_post;
    }

    /**
     * Updates the post
     *
     * @return void
     */
    public function update()
    {
        $this->permissions(['post:read', 'post:update']);
        $transaction = new Transaction();

        // Handle posts_tags relations
        $transaction_id = $_POST['id'];
        $related_tags = $_POST['tags'] ?? null;
        if (!empty($related_tags)) {
            foreach ($related_tags as $tag_id) {
                $sql = "INSERT INTO transactions_tags (transaction_id, tag_id) VALUES ($transaction_id, $tag_id)";
                $transaction->connection->query($sql);
            }
        }
        unset($_POST['tags']);

        $post->update($_POST);
        Helper::redirect('/transaction?id=' . $_POST['id']);
    }

    /**
     * Delete the post
     *
     * @return void
     */
    public function delete()
    {
        $this->permissions(['post:read', 'post:delete']);
        $transaction = new Transaction();
        $transaction->delete($_GET['id']);
        Helper::redirect('/transactions');
    }
}
