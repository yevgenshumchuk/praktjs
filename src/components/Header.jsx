import { useContext } from "react";
import {
  StudentContext
} from "../context/StudentContext";

function Header() {
  const { title } =
    useContext(StudentContext);

  return <h1>{title}</h1>;
}

export default Header;