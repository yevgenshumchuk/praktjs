import BookItem from "./BookItem";

function BookList({ books, onDeleteBook }) {
  return (
    <div>
      {books.map((book) => (
        <BookItem
          key={book.id}
          book={book}
          onDeleteBook={onDeleteBook}
        />
      ))}
    </div>
  );
}

export default BookList;