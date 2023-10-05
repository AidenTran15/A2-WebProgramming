document.addEventListener("DOMContentLoaded", () => {
    document.getElementById("date").min = new Date().toISOString().split("T")[0];

    document.getElementById("reason").addEventListener("change", function () {
        let adviceArea = document.getElementById("adviceArea");
        switch (this.value) {
            case "child_vaccine":
                adviceArea.textContent = "A disclaimer that multiple vaccines are normally administered...";
                break;
            // ... handle other options similarly
            default:
                adviceArea.textContent = "";
                break;

        }
    });
});


function convertToUppercase(input) {
    input.value = input.value.toUpperCase();
}

function validatePatientId(pid) {
    const errorElement = document.getElementById('pid-error');
    const regex = /^[A-Z]{2}\d+[A-Z]$/;

    if (!regex.test(pid)) {
        errorElement.textContent = 'Invalid format for Patient ID.';
        return false;
    }

    const digitsSum = Array.from(pid.match(/\d/g)).reduce((acc, curr) => acc + parseInt(curr, 10), 0);
    const checksumLetter = String.fromCharCode((digitsSum % 26) + 65); // 65 is ASCII code for 'A'

    if (pid.slice(-1) !== checksumLetter) {
        errorElement.textContent = 'Checksum letter is incorrect.';
        return false;
    }

    errorElement.textContent = '';  // Clear any previous error messages
    return true;  // valid PID format and checksum
}
let timeCheckboxes = document.querySelectorAll('.time-checkbox');

timeCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('change', function () {
        if (this.checked) {
            timeCheckboxes.forEach(otherCheckbox => {
                if (otherCheckbox !== this) {
                    otherCheckbox.checked = false;
                }
            });
        }
    });
});



