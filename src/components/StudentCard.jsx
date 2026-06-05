import { Link } from "react-router-dom";

function StudentCard({ student }) {
  return (
    <div>
      <h3>
        {student.firstName} {student.lastName}
      </h3>

      <p>Група: {student.group}</p>

      <Link to={`/students/${student.id}`}>
        Детальніше
      </Link>
    </div>
  );
}

export default StudentCard;