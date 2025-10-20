import './style.css';
import { renderHome } from './pages/home.js';
import { renderList } from './modules/ui/renderList.js';
import { config } from './modules/apiClient.js';

const app = document.getElementById('app')
app.appendChild(renderHome())

document.getElementById('dynamicBtn').addEventListener('click', async () => {
  const { getPosts } = await import('./modules/apiClient.js')
  const posts = await getPosts();
  const postsList = posts.map(p => [p.title, p.body])
  app.appendChild(renderList(postsList))
})

document.getElementById('tlaBtn').addEventListener('click', async () => {
  const mod = await import('./modules/apiClient.js');
  console.log('Mock config: ', mod.config);
})