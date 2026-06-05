function BookItem({ book, onDeleteBook }) {
  return (
    <div className="book">
      <h3>{book.title}</h3>
      <p>Автор: {book.author}</p>
      <p>Рік: {book.year}</p>
      <button onClick={() => onDeleteBook(book.id)}>Видалити</button>
    </div>
  );
}

export default BookItem;