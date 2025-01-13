// import du module de creation de serveur http
import { createServer } from 'node:http';

// paramètres du serveur 
const hostname = '127.0.0.1';
const port = 3000;

// Démarrage du serveur
const server = createServer((req, res) => {
    res.writeHead(200, {'Content-Type': 'text/plain'});
    res.end("Hello World");
});

// Ecoute du serveur
server.listen(port, hostname, () => {
    console.log(`le serveur est lançé sur le port ${port}`);
})