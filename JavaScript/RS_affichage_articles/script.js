const container = document.querySelector(".container")

/* async function logPosts() {
    const response = await fetch("https://jsonplaceholder.typicode.com/posts");
    const posts = await response.json();
    console.log(posts);
    posts.forEach(post => {
        const div = document.createElement("div")
        div.id = post.id
        div.classList.add('item')
        const title = document.createElement('h2')
        title.textContent = post.title
        const author = document.createElement('p')
        author.textContent = post.userId
        const content = document.createElement('p')
        content.textContent = post.body
        div.append(title, author, content)
        container.appendChild(div)
    });
}
logPosts() */


async function getArticles(){
    let posts;
    try {
        const response = await fetch("https://jsonplaceholder.typicode.com/posts");
        if(!response.ok) throw new Error(`Erreur ${response.status}`)
        posts = await response.json()
        console.log(posts);
    } catch (error) {
        const p = document.createElement('p')
        p.textContent = error.message
        container.appendChild('p')
    }

    if(posts){
        displayedPosts(posts)
    }
}

getArticles()

function displayedPosts(posts){
    posts.forEach(post => {
        const div = document.createElement("div")
        div.id = post.id
        div.classList.add('item')
        const title = document.createElement('h2')
        title.textContent = post.title
        const author = document.createElement('p')
        author.textContent = post.userId
        const content = document.createElement('p')
        content.textContent = post.body
        const link = document.createElement('a')
        link.href = `#`
        link.textContent = `Lire l'article`
        div.append(title, author, content, link)
        container.appendChild(div)
    });
}