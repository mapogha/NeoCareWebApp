   <!-- build:js assets/vendor/js/core.js -->
   <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <!-- registration form scripts -->
    <script>
        // Function to handle role changes (show/hide fields and set required attributes)
        function handleRoleChange() {
            const roleSelect = document.getElementById('role');
            const healthcareFields = document.getElementById('healthcareFields');
            const licenseInput = document.getElementById('license_number');
            // const facilityInput = document.getElementById('facility'); // Only if you add facility input

            // Check if roleSelect exists before accessing its value
            if (!roleSelect) return;

            if (roleSelect.value === 'doctor' || roleSelect.value === 'nurse' || roleSelect.value === 'admin') {
                if (healthcareFields) healthcareFields.style.display = 'block';
                if (licenseInput) {
                    licenseInput.required = true;
                }
                // if (facilityInput) { // Only if you add facility input
                //     facilityInput.required = true;
                // }
            } else {
                if (healthcareFields) healthcareFields.style.display = 'none';
                if (licenseInput) {
                    licenseInput.required = false;
                }
                // if (facilityInput) { // Only if you add facility input
                //     facilityInput.required = false;
                // }
            }
        }

        // Initial setup and event listener for role change
        document.addEventListener('DOMContentLoaded', function() {
            const roleSelect = document.getElementById('role');
            if(roleSelect) {
                // Call once on load in case of pre-filled forms or errors
                handleRoleChange();
                // Add listener for changes
                roleSelect.addEventListener('change', handleRoleChange);
            }

            // --- Validation Script Starts Here ---
            // Get the form based on the current page (could be registration or login)
            const form = document.getElementById('formAuthentication'); // Assuming both forms have this ID
            if (!form) {
                console.warn("Validation setup: Form with ID 'formAuthentication' not found on this page.");
                return; // Exit if form not found
            }


            // Define inputs to validate based on the form's action (or presence of fields)
            // This makes the script more adaptable if used on multiple pages (like login.php)
            let inputsToValidate = [];
            if (document.getElementById('full_name')) { // Likely the registration form
                inputsToValidate = [
                    'full_name', 'email', 'phone',
                    'password', 'role', 'license_number'
                    // REMOVED 'username' from here
                ];
            } else if (document.getElementById('email') && document.getElementById('password') && !document.getElementById('full_name')) { // Likely the login form
                inputsToValidate = ['email', 'password']; // Adjust if login uses different IDs
            } else {
                console.warn("Validation setup: Could not determine which form fields to validate.");
            }


            inputsToValidate.forEach(inputId => {
                const input = document.getElementById(inputId);
                if (input) {
                    // Ensure error element doesn't already exist
                    let errorElement = input.parentNode.querySelector('.invalid-feedback');
                    if (!errorElement) {
                        errorElement = document.createElement('div');
                        errorElement.className = 'invalid-feedback';
                        errorElement.style.display = 'none';
                        // Insert after the input/select itself, or adjust as needed for layout
                        // Handle input groups correctly
                        let insertAfter = input;
                        if (input.parentNode.classList.contains('input-group') || input.parentNode.classList.contains('input-group-merge')) {
                            insertAfter = input.parentNode;
                        }
                        insertAfter.parentNode.insertBefore(errorElement, insertAfter.nextSibling);
                    }

                    // Add real-time validation listener
                    input.addEventListener('input', function() {
                        validateField(this);
                    });
                    // Also validate on change for select elements
                    if (input.tagName === 'SELECT') {
                        input.addEventListener('change', function() {
                            validateField(this);
                        });
                    }
                } else {
                    // This warning is now less critical if we dynamically determine fields,
                    // but good for debugging if a field *should* exist but doesn't.
                    console.warn(`Validation setup: Element with ID "${inputId}" not found.`);
                }
            });

            // REMOVED the redundant role change handler from here

            // Form submission handler
            form.addEventListener('submit', function(e) {
                console.log("Submit event triggered"); // Debugging
                // Find *all* potentially validatable fields within *this specific form*
                const fieldsInThisForm = form.querySelectorAll('input:not([type="hidden"]), select');
                let isFormValid = true;

                fieldsInThisForm.forEach(input => {
                    // Only validate fields that are part of our intended list for this form
                    // AND are visible or required
                    if (inputsToValidate.includes(input.id)) {
                        if (input.offsetParent !== null || input.required) { // Check if visible or required
                            const fieldIsValid = validateField(input);
                            console.log(`Validating ${input.id || input.name}: ${fieldIsValid}`); // Debugging
                            if (!fieldIsValid) {
                                isFormValid = false;
                            }
                        } else {
                            console.log(`Skipping validation for hidden/non-required field: ${input.id || input.name}`);
                        }
                    }
                });


                console.log(`Overall form validity: ${isFormValid}`); // Debugging
                if (!isFormValid) {
                    e.preventDefault(); // Prevent submission ONLY if invalid
                    console.log("Form is invalid, submission prevented."); // Debugging
                    // Optionally focus the first invalid field
                    const firstInvalid = form.querySelector('.is-invalid');
                    if (firstInvalid) {
                        firstInvalid.focus();
                    }
                } else {
                    console.log("Form is valid, allowing default submission..."); // Debugging
                    // Disable button to prevent double submission
                    const submitButton = form.querySelector('input[type="submit"], button[type="submit"]');
                    if(submitButton) submitButton.disabled = true;
                    // No need to call form.submit() if we don't preventDefault
                }
            });

            // Field validation function
            function validateField(field) {
                // Find the sibling error element more reliably, checking parent node too
                let errorElement = field.nextElementSibling;
                if (!errorElement || !errorElement.classList.contains('invalid-feedback')) {
                    // Check if it's inside an input-group
                    if (field.parentNode.classList.contains('input-group') || field.parentNode.classList.contains('input-group-merge')) {
                        errorElement = field.parentNode.nextElementSibling;
                    }
                }
                // Final check if found
                if (!errorElement || !errorElement.classList.contains('invalid-feedback')) {
                    console.warn(`No valid error element found for field: ${field.id || field.name}`);
                    errorElement = null; // Ensure it's null if not found correctly
                }


                // Clear previous error
                field.classList.remove('is-invalid');
                // Also remove from parent if it's an input group
                if (field.parentNode.classList.contains('input-group') || field.parentNode.classList.contains('input-group-merge')) {
                    field.parentNode.classList.remove('is-invalid'); // Might not be needed depending on CSS
                }
                if (errorElement) errorElement.style.display = 'none';

                // Skip validation for hidden fields *unless* they are required
                if (field.offsetParent === null && !field.required) {
                    // console.log(`Skipping validation for hidden, non-required field: ${field.id || field.name}`);
                    return true;
                }


                // Field-specific validation
                let isValid = true;
                let errorMessage = '';

                // Use trim() for required checks on text inputs
                if (field.required && typeof field.value === 'string' && !field.value.trim()) {
                    isValid = false;
                    errorMessage = 'This field is required';
                } else if (field.required && field.tagName === 'SELECT' && !field.value) {
                    isValid = false;
                    errorMessage = 'Please select an option';
                }
                // Add other specific validations only if the field passes the basic required check or isn't required
                else if (field.id === 'full_name' && field.value.trim().length > 0 && field.value.trim().length < 3) {
                    isValid = false;
                    errorMessage = 'Full name must be at least 3 characters';
                }
                // REMOVED username validation block as it's not in the registration form
                // else if (field.id === 'username' && field.value.trim().length > 0) { ... }
                else if (field.id === 'email' && field.value && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(field.value)) {
                    // Email might be required or optional depending on the form, check required attribute
                    if(field.required || field.value.trim().length > 0) { // Validate if required OR if something is entered
                        isValid = false;
                        errorMessage = 'Please enter a valid email address';
                    }
                } else if (field.id === 'phone' && field.required && field.value.trim().length > 0 && !/^\+?\d{10,15}$/.test(field.value.replace(/\s/g, ''))) {
                    // Allow spaces but remove them for validation, check if not empty first (and required)
                    isValid = false;
                    errorMessage = 'Please enter a valid phone number (10-15 digits)';
                } else if (field.id === 'password' && field.required && field.value.length > 0 && field.value.length < 8) {
                    // Check required attribute
                    isValid = false;
                    errorMessage = 'Password must be at least 8 characters';
                } else if (field.id === 'license_number' && field.required && field.value.trim().length > 0) {
                    // Only validate license format if it's required and has a value
                    const roleSelect = document.getElementById('role'); // Get role select again
                    const role = roleSelect ? roleSelect.value : null;
                    if (role && !validateTanzaniaLicense(field.value, role)) {
                        isValid = false;
                        errorMessage = 'Invalid license number format';
                        if (role === 'doctor') {
                            errorMessage += ' (Expected format: MCT-XXXXX or MCT-XXXXXX)';
                        } else if (role === 'nurse') {
                            errorMessage += ' (Expected format: TNMC-XXXXX or RXXXX)';
                        }
                        // Add format for admin if needed
                    }
                }

                // Display error if invalid
                if (!isValid && errorElement) {
                    field.classList.add('is-invalid');
                    // Add to parent if input group
                    if (field.parentNode.classList.contains('input-group') || field.parentNode.classList.contains('input-group-merge')) {
                        field.parentNode.classList.add('is-invalid'); // Might not be needed depending on CSS
                    }
                    errorElement.textContent = errorMessage;
                    errorElement.style.display = 'block';
                }

                return isValid;
            }

            // Tanzania license validation function
            function validateTanzaniaLicense(licenseNumber, professionalType) {
                const patterns = {
                    'doctor': /^MCT-\d{5,6}$/i, // Added 'i' for case-insensitive
                    'nurse': /^(TNMC-\d{5}|R\d{4})$/i, // Added 'i' for case-insensitive
                    'admin': /.*/ // Example: Allow any format for admin, or define specific pattern
                };

                // Trim whitespace from license number before testing
                const trimmedLicense = licenseNumber.trim();

                // If the professional type isn't in our patterns, or if it's not required, consider it valid (or adjust logic)
                if (!patterns[professionalType]) return true;

                return patterns[professionalType].test(trimmedLicense);
            }
        }); // End DOMContentLoaded
   </script>
