<div class="mt-5 d-flex flex-column align-items-center text-center">

    <div class="section-box users-section mb-5">
        <h3>Utilisateurs</h3>
        <a href="<?php echo $racine_path.'./control/utilisateurs/utilisateurs.php';?>" class="btn btn-dark mt-3">
            Voir les utilisateurs
        </a>
    </div>
    
    <div class="section-box destinations-section mb-5">
        <h3>Destinations</h3>
        <a href="<?php echo $racine_path.'./control/destinations/destinations.php';?>" class="btn btn-dark mt-3 me-2">
            Voir les destinations
        </a>
        <a href="<?php echo $racine_path.'./control/destinations/creation_destination.php';?>" class="btn btn-outline-dark mt-3">
            Ajouter une destination
        </a>
    </div>
    
    <div class="section-box faq-section mb-5">
        <h3 class="mb-4">FAQ</h3>

        <div class="accordion" id="FAQ">

            <!-- Question 1 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-controls="collapseOne"> Question 1 : Qu'est-ce que ce site ?</button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#FAQ">
                    <div class="accordion-body"><p>Ce site est la partie back-office du site de <a href="<?php echo $racine_path.'/../.';?>" target=_blank>notre agence de voyage Let's go</a> : il permet aux administrateurs de gérer les destinations présentes dans le site en en ajoutant, en les modifiant ou en les supprimant. Il leur permet aussi de modifier ou supprimer les informations d'un utilisateur.</p></div>
                </div>
            </div>
            
            <!-- Question 2 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo"> Question 2 : Qui a le droit d'utiliser ce site ? </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#FAQ">
                    <div class="accordion-body">Ce site est réservé aux administrateurs de Let's Go!</div>
                </div>
            </div>
            
            <!-- Question 3 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree"> Question 3 : Quand l'accès à la base de données sera-t-il fait ? </button>
                </h2>
            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#FAQ">
                <div class="accordion-body"><p>Très bientôt. Il devrait être disponible pour le 03 avril prochain.</p></div>
            </div>
        </div>
        
        <!-- Question 4 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour"> Question 4 : Comment puis-je m'inscrire ?</button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#FAQ">
                <div class="accordion-body"><p>En cliquant sur la page <a href="<?php echo $racine_path."control/inscription.php";?>">s'inscrire</a>.</p></div>
            </div>
        </div>
        
        <!-- Question 5 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFive">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive"> Question 5 : Je ne retrouve pas mon mot de passe, comment faire ?</button>
            </h2>
            <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#FAQ">
                <div class="accordion-body"><p>En cliquant sur <a href="<?php echo $racine_path."control/mdp_oublie.php";?>">J'ai oublié mon mot de passe</a>, vous recevrez bientôt un e-mail pour le changer !</p></div>
            </div>
        </div>
        
        <!-- Question 6 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingSix">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix"> Question 6 : Puis-je ajouter un utilisateur ? </button>
            </h2>
            <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#FAQ">
                <div class="accordion-body"><p>Non, les utilisateurs doivent eux-mêmes créer leur compte.</p></div>
            </div>
        </div>
        
        <!-- Question 7 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingSeven">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven"> Question 7 : Comment ajouter une destination ?</button>
            </h2>
            <div id="collapseSeven" class="accordion-collapse collapse" data-bs-parent="#FAQ">
                <div class="accordion-body"><p>En cliquant sur le bouton <a href="<?php echo $racine_path."control/destinations/creation_destination.php";?>">Créer une destination</a> présent dans le tableau de bord ou dans la <a href="<?php echo $racine_path."control/destinations/destinations.php";?>">liste des destinations</a></p></div>
            </div>
        </div>
        
        <!-- Question 8 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingEight">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight"> Question 8 : Comment modifier une destination ou utilisateur ? </button>
            </h2>
            <div id="collapseEight" class="accordion-collapse collapse" data-bs-parent="#FAQ">
                <div class="accordion-body"><p>Vous pourrez trouver les boutons modifier dans chacune des pages de liste des données. Pensez à bien sauvegarder vos modifications en cliquant sur Enregistrer les modifications</p></div>
            </div>
        </div>
        
        <!-- Question 9 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingNine">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine"> Question 9 : J'ai malencontreusement modifié ou supprimé la mauvaise donnée, puis-je faire un retour en arrière ? </button>
            </h2>
            <div id="collapseNine" class="accordion-collapse collapse" data-bs-parent="#FAQ">
                <div class="accordion-body"><p>Non. Il n'existe pas d'historique des données pour pouvoir les récupérer si besoin, c'est pour cela que nous vous demandons de faire vos manipulations rigoureusement.</p></div>
            </div>
        </div>
    </div>
</div>