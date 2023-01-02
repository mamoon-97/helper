<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Base\View;
use Core\Helpers\Helper;
use Core\Helpers\Tests;
use Core\Model\Item;
use Core\Model\Tag;
use Core\Model\Transaction;

class Items extends Controller
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
        $this->view = 'items.index';
        $item=new Item(); // new model post.
        $this->data['items'] = $item->get_all();
        $this->data['items_count'] = count($item->get_all());
    }

    public function single()
    {

        self::check_if_exists(isset($_GET['id']), "Please make sure the id is exists");

        $this->permissions(['post:read']);
        $this->view = 'items.single';
        $item = new Item();
        $this->data['item'] = $item->get_by_id($_GET['id']);
    }

    /**
     * Display the HTML form for post creation
     *
     * @return void
     */
    public function create()
    {
        $this->permissions(['post:create']);
        $this->view = 'items.create';
    }

    /**
     * Creates new post
     *
     * @return void
     */
    public function store()
    {
        $this->permissions(['post:create']);
        $item = new Item();
       // $_POST['user_id'] = $_SESSION['user']['user_id']; // this is the id of the current logged in user. Because the post creator would be the same logged in user.
        $item->create($_POST);
        Helper::redirect('/items');
    }

    /**
     * Display the HTML form for post update
     *
     * @return void
     */
    public function edit()
    {
        $this->permissions(['post:read', 'post:update']);
        $this->view = 'items.edit';
        $item = new Item();
        $transaction = new Transaction();
        $selected_item = $item->get_by_id($_GET['id']);
        $selected_item->transactions = $transaction->get_all();
        $this->data['item'] = $selected_item;
    }

    /**
     * Updates the post
     *
     * @return void
     */
    public function update()
    {
        $this->permissions(['post:read', 'post:update']);
        $item = new Item();

        // Handle posts_tags relations
        $item_id = $_POST['id'];
        $related_transactions = $_POST['transactions'] ?? null;
        if (!empty($related_transactions)) {
            foreach ($related_transactions as $transaction_id) {
                $sql = "INSERT INTO items_transactions (item_id, transaction_id) VALUES ($item_id, $transaction_id)";
                $item->connection->query($sql);
            }
        }
        unset($_POST['tags']);

        $item->update($_POST);
        Helper::redirect('/item?id=' . $_POST['id']);
    }

    /**
     * Delete the post
     *
     * @return void
     */
    public function delete()
    {
        $this->permissions(['post:read', 'post:delete']);
        $item = new Item();
        $item->delete($_GET['id']);
        Helper::redirect('/items');
    }
}