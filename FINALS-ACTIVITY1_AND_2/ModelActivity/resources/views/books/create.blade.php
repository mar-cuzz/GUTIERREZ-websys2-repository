<h1>Add New Book</h1>
<form action="{{ route('books.store') }}" method="POST">
    @csrf
    <label for="title">Title:</label>
    <input type="text" name="title" id="title" required>
    <br>
    <label for="author">Author:</label>
    <input type="text" name="author" id="author" required>
    <br>
    <label for="published_date">Published Date:</label>
    <input type="text" name="published_date" id="published_date" required>
    <br>
    <button type="submit">Save</button>
</form>