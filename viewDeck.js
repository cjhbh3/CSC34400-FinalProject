import mysql from 'mysql'

var con = mysql.createConnection({
    host: "csc34400finalproject-db.cluster-ro-cctp5njo9gyq.us-east-2.rds.amazonaws.com",
    user: "admin",
    password: "NewShield19!"
});

con.connect(function(err) {
    if (err) throw err;
    console.log("Connected!");
    con.query("SELECT * FROM sys.card WHERE CardType = 'Creature'", function(err, result, fields) {
        if (err) throw err;
    });
    const cards = document.getElementById("cardsResults");
    cards.innerHTML = '';

    for (i=0; i<result.length;i++) {
        cards.appendChild(result[i]);
    }
});