

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" href="style.css"/>
        <title> comChien&Chat </title>
    </head>
    <body>
        <?php include("structure/header.php") ?>
        <div id="tarif">
            <div class="description">
                <table>
                    <caption> Tarif par jour et par type d'occupant </caption>
                    <thead>
                        <tr>
                            <th> Animal </th>
                            <th> Place isolée </th>
                            <th> Place partagée </th>
                            <th> Promenade journalière <br/> <em> chien uniquement </em> </th>
                        </tr>
                        </thaed>
                    <tbody>
                        <tr>
                            <td> Chien </td>
                            <td> 40e </td>
                            <td> 35e </td>
                            <td> 5e </td>
                        </tr>
                        <tr>
                            <td> Chat </td>
                            <td> 30e </td>
                            <td> 25e </td>
                            <td rowspan="2"> Non-concerné </td>
                        </tr>
                        <tr>
                            <td> Rongeur </td>
                            <td> 15e </td>
                            <td> 10e </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="description">
                <div id="slidechien">
                    <div id="slidien">
                        <div id="chi1"><img src="images/tarif/chien.jpg" alt="logochien" height="150" width="150"/>
                        </div>
                        <div id="chi2"><img src="images/tarif/chien2.jpg" alt="chienbox" height="150" width="150"/>
                        </div>
                        <div id="chi3"><img src="images/tarif/chien3.jpg" alt="chienbox" height="150" width="150"/>
                        </div>
                    </div>
                </div>
                <h1> Conditions des chiens </h1>
                <p>
                    30 chiens en communauté - 10 isolés <br/><br/>
                    Les chiens en communauté ont un espace de vie et de jeu où se situe leurs boxs de repos. Ce box est de 4m sur 4m avec un toit. En cas de mauvaises conditions météorologiques ils sont assignés à dormir dans une salle commune. </br>
                    Quant aux chiens isolés, ils ont un box plus grand en 2 parties: une partie extérieure ainsi qu'un cabanon afin d'assurer des conditions de repos adéquates. 
                </p>
            </div>
            <div class="description">
                <div id="slidechat">
                    <div id="slidat">
                        <div id="cha1"><img src="images/tarif/chat.jpg" alt="logochat" height="150" width="150"/>
                        </div>
                        <div id="cha2"><img src="images/tarif/chat2.jpg" alt="chatbox" height="150" width="150"/>
                        </div>
                        <div id="cha3"><img src="images/tarif/chat3.jpg" alt="chatbox" height="150" width="150"/>
                        </div>
                    </div>
                </div>
                <h1> Conditions des chats </h1>
                <p>
                    42 chats en communauté - 10 isolés <br/><br/>
                    Les chats sont dans une salle commune divisée en 14 parties. Ils ont un espace pour dormir ainsi que plusieurs aires de jeux.</br>
                    Les isolés ont les mêmes conditions de vie sauf que leurs parties sont plus petites et, evidemment, isolées.
                </p>
            </div>
            <div class="description">
                <div id="slidegeur">
                    <div id="slideur">
                        <div id="lap1"><img src="images/tarif/lapin.jpg" alt="logorongeur" height="150" width="150"/>
                        </div>
                        <div id="lap2"><img src="images/tarif/lapin2.jpg" alt="rongeurbox" height="150" width="150"/>
                        </div>
                        <div id="lap3"><img src="images/tarif/lapin3.jpg" alt="rongeurbox" height="150" width="150"/>
                        </div>
                    </div>
                </div>
                <h1> Conditions des rongeurs </h1>
                <p>
                    18 rongeurs en communauté - 5 isolés <br/><br/>
                    Les rongeurs ont des cages spécifiques selon leur espèce. Ainsi, ils ont tous une cage en extérieur avec un espace en bois où dormir.
                    </br>
                    Les rongeurs isolés sont, comme pour les chats, dans des conditions similaires mais avec des cages plus petites.
                </p>
            </div>
        </div>
        <?php include("structure/footer.php") ?>
    </body>
</html>


