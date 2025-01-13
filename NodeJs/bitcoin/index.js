import axios from "axios"

async function main() {
    const response = await axios.get("https://api.coindesk.com/v1/bpi/currentprice.json")
    const date = response.data.time.updated;
    
    // process permet de récupérer les arguments passés en ligne de commande à partir de l'index 2
    console.log(process.argv);

    const param = process.argv[2];

    const valeur = response.data.bpi[param].rate_float;

    console.log("mise à jour le ", date, "valeur", valeur, param);
};
main();