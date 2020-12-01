<?php 

function ModalDisponibilityDate (string $pollId) {

    echo '
        <form method="POST" action="'. MAIN_PATH . POLL_OPEN . "/" . $pollId .'" class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Définir les nouvelles dates de disponibilité</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <div>
                                <label for="available-date">Disponible le</label>
                                <input type="datetime-local" name="availableAt" id="available-date"/>
                            </div>
                            <div>
                                <label for="unavailable-date">Indisponbile dès</label>
                                <input type="datetime-local" name="unAvailableAt" id="unavailable-date"/>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Sauvegarder</button>
                    </div>
                </div>
            </div>
        </form>
    ';

}