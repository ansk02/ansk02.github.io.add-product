<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajouter produit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">

    <style>
        *,
        ::before,
        ::after {
            margin: 0;
            padding: 0;
            outline: none;
            box-sizing: border-box;
        }

        body {
            background-color: red;
        }

        .box {
            background-color: #ddd;
            width: 60%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .type-radio {
            margin-top: 5px;
            margin-bottom: 5px;
            margin-left: 0;
        }

        .is-rounded {
            margin-top: 10px;
            margin-bottom: 10px;
            margin-left: 0;
        }

        .button {
            margin: 10px auto;
        }

        .price:valid {
            border: greenyellow;
        }

        .price:invalid {
            border: crimson;
        }

        form {
            overflow: hidden;
        }

        .mes-boutons {
            display: flex;
            flex-shrink: 0;
            justify-content: center;
            align-items: center;
        }

        @media screen and (max-width: 500px) {
            .type-radio {
                display: flex;
                justify-content: space-around;
                align-items: center;
            }

            .monlabel,
            .monprix {
                display: none;
            }

            .box {
                width: 90%;
            }

            .mon-conteneur {
                width: 100%;
            }

            .montitre {
                font-size: 120%;
            }
        }

        h1 {
            display: inline;
            position: absolute;
            top: 5%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>

</head>

<body>

    <div class="mon-conteneur">
        <div class="ajout">
            <h1 class="title montitre">Ajouter produit</h1>
        </div>

        <form class="box">
            <div class="field">
                <label class="label monlabel">Désignation</label>
                <div class="control">
                    <input class="input" type="text" placeholder="Désignation" required>
                </div>
            </div>

            <div class="field">
                <label class="label monprix">Prix</label>
                <div class="control">
                    <input class="input price" type="text" maxlength="6" required pattern="^[0-9]+$" placeholder="Prix de l'article">
                </div>
            </div>

            <div class="file has-name">
                <label class="file-label">
                    <input class="file-input" type="file" name="resume">
                    <span class="file-cta">
                        <span class="file-icon">
                            <i class="fas fa-upload"></i>
                        </span>
                        <span class="file-label">
                            Charger l'image
                        </span>
                    </span>
                    <span class="file-name">
                        Screen-Shot.png
                    </span>
                </label>
            </div>

            <div class="control type-radio">
                <label class="radio">
                    <input type="radio" name="type-produit">
                    Poids
                </label>
                <label class="radio">
                    <input type="radio" name="type-produit">
                    Litre
                </label>
                <label class="radio">
                    <input type="radio" name="type-produit">
                    Unité
                </label>
            </div>

            <div class="select is-rounded">
                <select>
                    <option>Choisissez votre catégorie</option>
                    <?php

                    require 'db_config.php';

                    $myconnection = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

                    $query = "SELECT * FROM categorie";

                    $query_result = mysqli_query($myconnection, $query);
                    while ($result_row = mysqli_fetch_array($query_result))

                        echo "<option value=$result_row[0]>$result_row[1]</option>";

                    ?>
                </select>
            </div>

            <!-- <textarea name="hello" id="" cols="30" rows="10"></textarea> -->
            <textarea class="textarea is-info" placeholder="Description du produit" name="description-produit"></textarea>


            <div class="mes-boutons">
                <input type="submit" class="button is-primary is-normal" value="Valider">
                <input type="reset" class="button is-danger is-normal" value="Effacer">
            </div>
        </form>

    </div>

    <!-- <div class="columns">
        <div class="column">
            <p class="bd-notification is-info">First column</p>
            <div class="columns is-mobile">
                <div class="column">
                    <p class="bd-notification is-info">First nested column</p>
                </div>
                <div class="column">
                    <p class="bd-notification is-info">Second nested column</p>
                </div>
            </div>
        </div>
        <div class="column">
            <p class="bd-notification is-danger">Second column</p>
            <div class="columns is-mobile">
                <div class="column is-half">
                    <p class="bd-notification is-danger">50%</p>
                </div>
                <div class="column">
                    <p class="bd-notification is-danger">Auto</p>
                </div>
                <div class="column">
                    <p class="bd-notification is-danger">Auto</p>
                </div>
            </div>
        </div>
    </div> -->
    <!-- <div class="columns is-mobile">
        <div class="column is-half is-offset-one-quarter"></div>
    </div>

    <div class="columns is-mobile">
        <div class="column is-three-fifths is-offset-one-fifth"></div>
    </div>

    <div class="columns is-mobile">
        <div class="column is-4 is-offset-8"></div>
    </div>

    <div class="columns is-mobile">
        <div class="column is-11 is-offset-1"></div>
    </div> -->



    <!-- <div class="columns">
        <div class="column">
            First column
        </div>
        <div class="column">
            Second column
        </div>
        <div class="column">
            Third column
        </div>
        <div class="column">
            Fourth column
        </div>
    </div> -->
    <!-- <a href="#" class="button is-info is-medium is-loading">Button</a>
    <a href="#" class="button is-primary is-large">Button</a>
    <a href="#" class="button is-success is-small">Button</a>
    <a href="#" class="button is-warning is-outlined">Button</a>
    <a href="#" class="button is-danger is-inverted">Button</a>

    <button disabled="disabled"></button>

    <br>
    <button type="button" class="button is-primary">Valider</button>

    <br>
    <button class="button is-danger is-medium" type="button">Valider</button>

    <br>
    <button type="button" class="button is-success is-outlined">Valider</button> -->

</body>

</html>

<!-- $mysqli_close($myconnection); -->