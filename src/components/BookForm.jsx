import { useState } from "react";

function BookForm({ onAddBook }) {
  const [title, setTitle] = useState("");
  const [author, setAuthor] = useState("");
  const [year, setYear] = useState("");

  function handleSubmit(e) {
    e.preventDefault();

    if (!title || !author || !year) {
      alert("Усі поля повинні бути заповнені");
      return;
    }

    onAddBook({ title, author, year });

    setTitle("");
    setAuthor("");
    setYear("");
  }

  return (
    <form onSubmit={handleSubmit}>
      <input
        type="text"
        placeholder="Назва книги"
        value={title}
        onChange={(e) => setTitle(e.target.value)}
      />

      <input
        type="text"
        placeholder="Автор"
        value={author}
        onChange={(e) => setAuthor(e.target.value)}
      />

      <input
        type="number"
        placeholder="Рік"
        value={year}
        onChange={(e) => setYear(e.target.value)}
      />

      <button type="submit">Додати книгу</button>
    </form>
  );
}

export default BookForm;