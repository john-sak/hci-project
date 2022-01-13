const form = document.getElementById('sign-up-form');
const name = document.getElementById('name');
const lname = document.getElementById('lname');
const address = document.getElementById('address');
const email = document.getElementById('email');
const phone = document.getElementById('phone');
const bday = document.getElementById('bday');
const gender = document.getElementById('gender');
const username = document.getElementById('username');
const password = document.getElementById('password');
const password2 = document.getElementById('password2');

form.addEventListener('submit', e => {
	e.preventDefault();

	checkInputs();
});

function checkInputs() {
	// trim to remove the whitespaces
	const nameValue = name.value.trim();
	const lnameValue = lname.value.trim();
	const addressValue = address.value.trim();
	const emailValue = email.value.trim();
	const phoneValue = phone.value.trim();
	const bdayValue = bday.value.trim();
	const genderValue = gender.value.trim();
	const usernameValue = username.value.trim();
	const passwordValue = password.value.trim();
	const password2Value = password2.value.trim();

	if (nameValue.length < 5 || nameValue.length > 20) {
		setErrorFor(name, '5 έως 20 χαρακτήρες!');
	} else {
		setSuccessFor(name);
	}

	if (lnameValue.length < 5 || lnameValue.length > 20) {
		setErrorFor(lname, '5 έως 20 χαρακτήρες!');
	} else {
		setSuccessFor(lname);
	}

	if (addressValue.length < 5 || addressValue.length > 20) {
		setErrorFor(address, '10 έως 50 χαρακτήρες!');
	} else {
		setSuccessFor(address);
	}

	if (emailValue === '') {
		setErrorFor(email, 'Το email δεν μπορεί να είναι κενό!');
	} else if (!isEmail(emailValue)) {
		setErrorFor(email, 'Μη έγκυρη διεύθυνση email!');
	} else {
		setSuccessFor(email);
	}

	if (phoneValue === '') {
		setErrorFor(phone, 'Το τηλέφωνο δεν μπορεί να είναι κενό!');
	} else if (!isPhone(phoneValue)) {
		setErrorFor(phone, 'Μη έγκυρος αριθμός τηλεφώνου!');
	} else {
		setSuccessFor(phone);
	}

	setSuccessFor(bday); // todo

	if (genderValue === 'none') {
		setErrorFor(gender, 'Επιλέξτε φύλο')
	} else {
		setSuccessFor(gender);
	}

	if (usernameValue.length < 5 || usernameValue.length > 20) {
		setErrorFor(username, '5 έως 20 χαρακτήρες!');
	} else {
		setSuccessFor(username);
	}

	if (passwordValue.length < 5 || passwordValue.length > 20) {
		setErrorFor(password, '5 έως 20 χαρακτήρες!');
	} else {
		setSuccessFor(password);
	}

	if (password2Value === '') {
		setErrorFor(password2, 'Το πεδίο δεν μπορεί να είναι κενό');
	} else if(passwordValue !== password2Value) {
		setErrorFor(password2, 'Οι κωδικοί πρόσβασης δεν ταιριάζουν!');
	} else{
		setSuccessFor(password2);
	}

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

function isEmail(email) {
	return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}

function isPhone(phone) {
	return /[0-9]{10}/.test(phone);
}
