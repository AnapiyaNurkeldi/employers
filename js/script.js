// Открыть модальное окно при клике на кнопку "Изменить"
var editButtons = document.getElementsByClassName("edit-button");
var modal = document.getElementById("modal");
var close = document.getElementsByClassName("close")[0];
var editForm = document.getElementById("edit-form");
var employeeIdField = document.getElementById("employee_id");
var editNameField = document.getElementById("edit_name");
var editBirthdayField = document.getElementById("edit_birthday");
var editPhoneField = document.getElementById("edit_phone");
var editSalaryField = document.getElementById("edit_salary");

Array.from(editButtons).forEach(function (button) {
    button.addEventListener("click", function () {
        var employeeId = this.getAttribute("data-id");
        var employeeDetails = this.closest(".emp").getElementsByClassName("details")[0];
        var employeeName = employeeDetails.getElementsByTagName("p")[0].innerText;
        var employeeBirthday = employeeDetails.getElementsByTagName("p")[1].getElementsByTagName("span")[0].innerText;
        var employeePhone = employeeDetails.getElementsByTagName("p")[2].innerText;
        var employeeSalary = employeeDetails.getElementsByTagName("p")[3].innerText;

        employeeIdField.value = employeeId;
        editNameField.value = employeeName;
        editBirthdayField.value = employeeBirthday;
        editPhoneField.value = employeePhone;
        editSalaryField.value = employeeSalary;

        modal.style.display = "block";
    });
});

// Закрыть модальное окно при клике на кнопку "Закрыть"
close.addEventListener("click", function () {
    modal.style.display = "none";
});

// Закрыть модальное окно при клике вне области модального окна
window.addEventListener("click", function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
});
