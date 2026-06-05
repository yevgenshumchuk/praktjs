import { useState } from "react";

function StudentForm() {
  const [student, setStudent] = useState({
    firstName: "",
    lastName: "",
    group: "",
    age: ""
  });

  const handleChange = (e) => {
    setStudent({
      ...student,
      [e.target.name]: e.target.value
    });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();

    await fetch(
      "http://localhost:3001/students",
      {
        method: "POST",
        headers: {
          "Content-Type":
            "application/json"
        },
        body: JSON.stringify(student)
      }
    );

    setStudent({
      firstName: "",
      lastName: "",
      group: "",
      age: ""
    });
  };

  return (
    <form onSubmit={handleSubmit}>
      <input
        name="firstName"
        placeholder="Ім'я"
        value={student.firstName}
        onChange={handleChange}
      />

      <input
        name="lastName"
        placeholder="Прізвище"
        value={student.lastName}
        onChange={handleChange}
      />

      <input
        name="group"
        placeholder="Група"
        value={student.group}
        onChange={handleChange}
      />

      <input
        name="age"
        placeholder="Вік"
        value={student.age}
        onChange={handleChange}
      />

      <button>
        Додати
      </button>
    </form>
  );
}

export default StudentForm;