const delay = (ms = 400) => new Promise((r) => setTimeout(r, ms))

const products = [
  { id: 1, name: 'Sneaker Alpha', category: 'shoes', price: 19990, description: 'Kényelmes utcai cipő.' },
  { id: 2, name: 'Trail Runner', category: 'shoes', price: 29990, description: 'Terepfutáshoz.' },
  { id: 3, name: 'T-Shirt Vue', category: 'apparel', price: 7990, description: '100% pamut.' },
  { id: 4, name: 'Backpack Pro', category: 'accessories', price: 15990, description: 'Mindennapi használatra.' },
]

const blogPosts = [
  { slug: 'vue-router-basics', title: 'Vue Router alapok', tag: 'vue', excerpt: 'Nested route-ok, guardok, meta...' },
  { slug: 'query-sync-filters', title: 'Query szinkron szűrők', tag: 'router', excerpt: 'URL mint állapot...' },
  { slug: 'lazy-loading-views', title: 'Lazy loading view-k', tag: 'performance', excerpt: 'Chunkolás és import...' },
]

const adminUsers = [
  { id: 10, name: 'Admin Anna', role: 'admin', email: 'anna@example.com' },
  { id: 11, name: 'Béla User', role: 'user', email: 'bela@example.com' },
  { id: 12, name: 'Csilla Manager', role: 'admin', email: 'csilla@example.com' },
]

export async function fetchProductById(id) {
  await delay()
  return products.find(p => p.id === Number(id)) || null
}

export async function fetchProducts({ category, sort, page, pageSize = 6 }) {
  await delay(200)
  let list = [...products]
  if (category) list = list.filter(p => p.category === category)
  if (sort === 'price_asc') list.sort((a,b)=>a.price-b.price)
  if (sort === 'price_desc') list.sort((a,b)=>b.price-a.price)
  const total = list.length
  const p = Math.max(1, Number(page || 1))
  const start = (p-1)*pageSize
  const items = list.slice(start, start+pageSize)
  return { items, total, page: p, pageSize }
}

export async function fetchBlogPosts({ tag, search }) {
  await delay(200)
  let list = [...blogPosts]
  if (tag) list = list.filter(p => p.tag === tag)
  if (search) {
    const s = String(search).toLowerCase()
    list = list.filter(p => p.title.toLowerCase().includes(s) || p.excerpt.toLowerCase().includes(s))
  }
  return list
}

export async function fetchBlogPostBySlug(slug) {
  await delay()
  return blogPosts.find(p => p.slug === slug) || null
}

export async function fetchAdminUsers() {
  await delay(250)
  return [...adminUsers]
}

export async function fetchAdminUserById(userId) {
  await delay()
  return adminUsers.find(u => u.id === Number(userId)) || null
}
