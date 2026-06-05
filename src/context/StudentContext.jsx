import {
  createContext,
  useState
} from "react";

export const StudentContext =
  createContext();

export function StudentProvider({
  children
}) {
  const [title] = useState(
    "Student CRM"
  );

  return (
    <StudentContext.Provider
      value={{ title }}
    >
      {children}
    </StudentContext.Provider>
  );
}