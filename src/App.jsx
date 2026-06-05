import { useEffect, useState } from "react";
import Header from "./components/Header";
import BookForm from "./components/BookForm";
import BookList from "./components/BookList";
import Footer from "./components/Footer";
import "./App.css";

function App() {
  const [books, setBooks] = useState([]);
  const [search, setSearch] = useState("");
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState("");

  useEffect(() => {
    getBooks();
  }, []);

  async function getBooks() {
    try {
      setLoading(true);
      setError("");

      const response = await fetch("http://localhost:3001/books");

      if (!response.ok) {
        throw new Error("Помилка завантаження книг");
      }

      const data = await response.json();
      setBooks(data);
    } catch (err) {
      setError(err.message);
    } finally {
      setLoading(false);
    }
  }

  async function addBook(book) {
    try {
      const response = await fetch("http://localhost:3001/books", {
        method: "POST",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify(book)
      });

      const newBook = await response.json();
      setBooks([...books, newBook]);
    } catch {
      setError("Не вдалося додати книгу");
    }
  }

  async function deleteBook(id) {
    try {
      await fetch(`http://localhost:3001/books/${id}`, {
        method: "DELETE"
      });

      setBooks(books.filter((book) => book.id !== id));
    } catch {
      setError("Не вдалося видалити книгу");
    }
  }

  const filteredBooks = books.filter((book) =>
    book.title.toLowerCase().includes(search.toLowerCase())
  );

  return (
    <div className="app">
      <Header />

      <BookForm onAddBook={addBook} />

      <input
        type="text"
        placeholder="Пошук за назвою..."
        value={search}
        onChange={(e) => setSearch(e.target.value)}
      />

      {loading && <p>Завантаження...</p>}
      {error && <p className="error">{error}</p>}

      <BookList books={filteredBooks} onDeleteBook={deleteBook} />

      <Footer />
    </div>
  );
}

export default App;
