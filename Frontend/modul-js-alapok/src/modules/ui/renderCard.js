export default function renderCard({title, body}) {
    const element = document.createElement('article');

    element.className = 'card';
    element.innerHTML = `<h3>${title}</h3><p>${body}</p>`;

    return element;
}