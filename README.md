# CMS_eval

Coucou, readme post-évaluation (je sais, c'est un peu tard, mais on sait jamais).

J'ai donc repris le projet de base partagé (merci à toi Morgan), j'ai importé jQuery, Bulma css et Wysiwyg.

J'ai perdu du temps à essayer de cacher le Logout si on était pas connecté (1h, mais ça m'agaçait de pouvoir cliquer dessus
même sur le login ... Au final j'ai pas réussi, parce que je voulais le laisser où il était, et je me suis embrouillé dans une fonction ajax ...).

Ensuite j'ai eu un peu de mal avec le replace des %%ELEMENT%%, surtout quand j'ai dû refaire une fonction pour ne retourner 
qu'une partie de la page.

Sinon, mis à part une mis en forme un peu moche, le seul problème a été la requête pour enregistrer le nouveau contenu de page,
à cause des arguments, la query plantait et ça ne fonctionnait pas.

Je l'ai réglé sur la branche post-eval (qui ai donc la branche après évaluation), en déplaçant les arguments dans le execute().

La branche master a été dernièrement commitée à 12:30 normalement, mais l'update (bien que la commande est juste) ne fonctionne
pas. La fonction delete de pages ne fonctionne pas (pas implémentée), mais on peut toujours laisser des pages vides :p . Je me
suis beaucoup embrouillé, écrire du code, repenser la chose, effaçer le code pour l'optimiser, tomber sur une erreur, la débug
etc ... Mais ça fonctionne (après la correction malheureusement).

Voila, en espérant que tu puisses peut être le lire.
