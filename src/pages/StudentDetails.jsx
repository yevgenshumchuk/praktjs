import { useParams } from "react-router-dom";
import { useEffect, useState } from "react";

function StudentDetails() {
  const { id } = useParams();

  const [student, setStudent] = useState(null);

  useEffect(() => {
    fetch(`http://localhost:3001/students/${id}`)
      .then((res) => res.json())
      .then((data) => setStudent(data));
  }, [id]);

  const deleteStudent = async () => {
    await fetch(`http://localhost:3001/students/${id}`, {
      method: "DELETE",
    });

    window.location.href = "/students";
  };

  if (!student) {
    return <h2>Завантаження...</h2>;
  }

  return (
    <div>
      <h1>
        {student.firstName} {student.lastName}
      </h1>

      <p>Група: {student.group}</p>
      <p>Вік: {student.age}</p>

      <button onClick={deleteStudent}>
        Видалити
      </button>
    </div>
  );
}

export default StudentDetails;