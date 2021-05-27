// Author: Diego Quiroz
let contents;

function fillContents(data) {
	document.getElementById('about--titulo').innerHTML = data['about--titulo'];
	document.getElementById('about--sub').innerHTML = data['about--sub'];
	document.getElementById('mision--titulo').innerHTML = data['mision--titulo'];
	document.getElementById('mision--cont').innerHTML = data['mision--cont'];
	document.getElementById('vision--titulo').innerHTML = data['vision--titulo'];
	document.getElementById('vision--cont').innerHTML = data['vision--cont'];
	document.getElementById('servicios--titulo').innerHTML = data['servicios--titulo'];
	document.getElementById('servicios--sub').innerHTML = data['servicios--sub'];
	document.getElementById('imagenes--titulo').innerHTML = data['imagenes--titulo'];
	document.getElementById('imagenes--sub').innerHTML = data['imagenes--sub'];
	document.getElementById('contacto--titulo').innerHTML = data['contacto--titulo'];
	document.getElementById('estilos--titulo').innerHTML = data['estilos--titulo'];
	document.getElementById('estilos--sub').innerHTML = data['estilos--sub'];
}

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

document.getElementById('styles__toggle').onclick = () => {
	document.getElementsByTagName('body')[0].style.backgroundColor = '#595E66';
	document.getElementsByTagName('*')[0].style.color = 'white';
}

fetch('/api/contents')
	.then(res => res.json())
	.then(data => {
		contents = {};
		data.forEach(attr => (contents[attr.attribute] = attr.value));
		console.log(contents);
		fillContents(contents);
	})
