<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer son sondage</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= MAIN_PATH ?>style/create-poll-view.css">
</head>
<body>
    <main class="container-fluid d-flex flex-column align-items-center">
        <h1>Créer son sondage</h1>
        <form action="<?=  MAIN_PATH ?>poll/creation" class="col-6 d-flex flex-column align-items-center" method="POST">
            <div class="poll-container-form--input-wrapper py-4">
                <label for="poll_name">Nom du sondage</label>
                <input type="text" id="poll_name" name="poll_name">
            </div>
            <div class="d-flex flex-column w-100 py-4">
                <label for="poll_description " class="text-center">Description du sondage</label>
                <textarea col="30" rows="10" id="poll_description" name="poll_description"></textarea>
            </div>
            <div class="w-100">
                <div class="poll-container-form--input-wrapper py-4 w-100">
                    <label for="poll_question">Question 1</label>
                    <input type="text" name="poll_questions[]" id="poll_question">
                </div>
                <div class="pl-3">
                    <div class="py-2">
                        <label for="response1">Réponse 1</label>
                        <input type="text" id="response1" placeholder="Réponse 1" name="poll_responses[0][]">
                    </div>
                    <div class="py-2">
                        <label for="response2">Réponse 2</label>
                        <input type="text" id="response2" placeholder="Réponse 2" name="poll_responses[0][]">
                    </div>
                    <div class="py-2">
                        <label for="response3">Réponse 3</label>
                        <input type="text" id="response3" placeholder="Réponse 3" name="poll_responses[0][]">
                    </div>
                    <div class="py-2">
                        <label for="response4">Réponse 4</label>
                        <input type="text" id="response4" placeholder="Réponse 4" name="poll_responses[0][]">
                    </div>
                </div>
                <div class="poll-container-form--input-wrapper py-4 w-100">
                    <label for="poll_question">Question 2</label>
                    <input type="text" name="poll_questions[]" id="poll_question">
                </div>
                <div class="pl-3">
                    <div class="py-2">
                        <label for="response1">Réponse 1</label>
                        <input type="text" id="response1" placeholder="Réponse 1" name="poll_responses[1][]">
                    </div>
                    <div class="py-2">
                        <label for="response2">Réponse 2</label>
                        <input type="text" id="response2" placeholder="Réponse 2" name="poll_responses[1][]">
                    </div>
                    <div class="py-2">
                        <label for="response3">Réponse 3</label>
                        <input type="text" id="response3" placeholder="Réponse 3" name="poll_responses[1][]">
                    </div>
                    <div class="py-2">
                        <label for="response4">Réponse 4</label>
                        <input type="text" id="response4" placeholder="Réponse 4" name="poll_responses[1][]">
                    </div>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">
                Valider
            </button>
        </form> 
    </main>
    
</body>
</html>