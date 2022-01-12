const form = document.getElementById('sign-in-form');
const username = document.getElementById('username');
const password = document.getElementById('password');

form.addEventListener('submit', e => {
	e.preventDefault();

	checkInputs();
});

function checkInputs() {
	// trim to remove the whitespaces
	const usernameValue = username.value.trim();
	const passwordValue = password.value.trim();

	if(usernameValue.length < 5 || usernameValue.length > 20) {
		setErrorFor(username, '5 έως 20 χαρακτήρες!');
	} else {
		setSuccessFor(username);
	}

	if(passwordValue.length < 5 || passwordValue.length > 20) {
		setErrorFor(password, '5 έως 20 χαρακτήρες!');
	} else {
		setSuccessFor(password);
	}

function setErrorFor(input, message) {
	const formControl = input.parentElement;
	const small = formControl.querySelector('small');
	formControl.className = 'form-control error';
	small.innerText = message;
}

function setSuccessFor(input) {
	const formControl = input.parentElement;
	formControl.className = 'form-control success';
}
