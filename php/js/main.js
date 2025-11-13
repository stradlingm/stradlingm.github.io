function searchStudentId() {
    let studentId = document.querySelector("#studentId").value;
    location.href = `/fall2025/grades.php?student_id=${studentId}`;

}

document.querySelector("#btnSearch").addEventListener("click", searchStudentId)