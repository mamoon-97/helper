<h1>Create Item</h1>

<form action="/items/store" method="POST" class="w-50">
    <div class="mb-3">
        <label for="post-title" class="form-label">Item </label>
        <input type="text" class="form-control" id="post-title" name="item_name">
    </div>
    <div class="form-floating">
        <textarea class="form-control" placeholder="Your post content.." id="post-content" style="height: 100px" name="cost"></textarea>
        <label for="post-content">Cost</label>
    </div>
    <div class="mb-3">
        <label for="post-title" class="form-label">Price </label>
        <input type="text" class="form-control" id="post-title" name="price">
    </div>
    <div class="mb-3">
        <label for="post-quantity" class="form-label">quantity </label>
        <input type="text" class="form-control" id="post-quantity" name="quantity">
    </div>

    <button type="submit" class="btn btn-success mt-4">Create</button>
</form>