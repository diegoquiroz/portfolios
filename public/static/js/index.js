document.getElementById('contact__form__input--button').onclick = () => {
	const data = {
		'name': document.getElementById('name').value,
		'email': document.getElementById('email').value,
		'message': document.getElementById('message').value
	}

	console.log(data);
	fetch('/api/messages', {
		method: 'POST',
		headers: { 'Content-Type': 'application/json' },
		body: JSON.stringify(data)
	})
		.then(res => {
			console.log(res.text());
			const message = `Tu mensaje '${data.message}' se ha enviado ${data.name}`;
			document.getElementById('contact__response').innerHTML = message;
		});
}
