<?php 
require_once $racine_path.'cookies.php';
if (!consentementDonne()) : ?>

<div id="bandeau-cookies" class="fixed-bottom bg-dark text-white p-3">
    <div class="container">

        <p class="mb-2">
            🍪 Ce site utilise des cookies. Choisissez ceux que vous acceptez :
        </p>

        <form method="POST" action="<?php echo $racine_path ?>control/cookie.php">

            <div class="d-flex flex-column flex-md-row gap-3 mb-3">

                <!-- Préférences -->
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="preferences" value="1" id="cb-preferences">
                    <label class="form-check-label" for="cb-preferences">
                        Préférences
                    </label>
                </div>

                <!-- Statistiques -->
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="statistiques" value="1" id="cb-statistiques">
                    <label class="form-check-label" for="cb-statistiques">
                        Statistiques
                    </label>
                </div>

            </div>

            <div class="d-flex gap-2">
                <!-- Valider les choix des cases cochées -->
                <button type="submit" name="action" value="choisir" class="btn btn-warning">
                    Valider mes choix
                </button>
                <!-- Tout accepter d'un coup -->
                <button type="submit" name="action" value="tout_accepter" class="btn btn-outline-light">
                    Tout accepter
                </button>
                <!-- Tout refuser -->
                <button type="submit" name="action" value="tout_refuser" class="btn btn-outline-secondary">
                    Tout refuser
                </button>
            </div>

        </form>
    </div>
</div>

<?php endif; ?>