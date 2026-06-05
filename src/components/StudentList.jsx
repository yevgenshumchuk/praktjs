import { useEffect, useState } from "react";
import StudentCard from "./StudentCard";

function StudentList() {
  const [students, setStudents] = useState([]);

  useEffect(() => {
    fetch("http://localhost:3001/students")
      .then((response) => response.json())
      .then((data) => setStudents(data));
  }, []);

  return (
    <>
      {students.map((student) => (
        <StudentCard
          key={student.id}
          student={student}
        />
      ))}
    </>
  );
}

export default StudentList;