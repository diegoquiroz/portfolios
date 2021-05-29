// Author: Diego Quiroz
let articles;
let tag;
let method;

function edit(id) {
	document.getElementById('articles--create').style.display = 'block';
	console.log(`${method} ${id}`);

	document.getElementById('articles__form--button').onclick = () => {
		const data = {
            'id': id,
			'name': document.getElementById('name').value,
			'description': document.getElementById('description').value,
			'image': document.getElementById('image').value
		}


		fetch(`/api/articles/`, {
			method: 'PUT',
			headers: { 'Content-Type': 'application/json' },
			body: JSON.stringify(data)
		}).then((res) => {
			res.text();
			//location.reload();
		}).then(dat => {console.log(dat)});
	}
}

fetch('/api/articles')
	.then(res => res.json())
	.then(data => {
		articles = data;
		articles.forEach(article => {
			tag = `<article>
				       <img width="400px" src="${article.image}" />
				       <h2> ${article.name}</h2>
				       <h3> ${article.description}</h3>
				       <button class="articles__form--button" id="button__edit" onclick="edit(${article.id})" type="button">Editar</button>
				   </article>`;
			document.getElementById('articles').insertAdjacentHTML("beforeend", tag);
		})
	});


document.getElementById('button--create').onclick = () => {
	document.getElementById('articles--create').style.display = 'block';
	method = 'POST'

	document.getElementById('articles__form--button').onclick = () => {
		const data = {
			'name': document.getElementById('name').value,
			'description': document.getElementById('description').value,
			'image': document.getElementById('image').value
		}

		console.log(method);

		fetch('/api/articles', {
			method: method,
			headers: { 'Content-Type': 'application/json' },
			body: JSON.stringify(data)
		}).then(() => {
			location.reload();
		});
	}
}

