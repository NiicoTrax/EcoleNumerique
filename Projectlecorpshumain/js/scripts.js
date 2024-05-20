        /// AJOUT DE LA FONCTION CLIQUABLE SUR LES CERCLES ///

$(document).ready(function() {
    $('.cercle').on('click', function(event) {
        event.preventDefault();
        var cercleId = $(this).attr('id');
        var infoText = '';

        /// AJOUT DE LA CASE ACTIVE OU NON ACTIVE ///

        $('.cercle').removeClass('active');
        $(this).addClass('active');


        /// INFORMATION SUR CHAQUE CERCLE EN CAS DE CLIQUAGE ///

        switch(cercleId) {
            case 'cercle1':
                infoText = 'Épaule :<br><br> La région morphologique de l\'épaule (nom féminin) permet la jonction du tronc avec le membre supérieur au niveau du bras. Elle comporte plusieurs articulations qui concourent à en faire l\'articulation la plus mobile du corps humain. Elle permet d\'orienter le membre supérieur dans l\'espace, permettant en particulier à son extrémité effectrice, la main, d\'assurer ses rôles de préhension et de communication avec l\'environnement situé à sa portée.';
                break;
            case 'cercle2':
                infoText = 'Coude :<br><br> Le coude est le segment du membre supérieur situé entre le bras et l\'avant-bras. c\'est la zone de flexion - extension de l\'avant-bras sur le bras. Le terme coude peut désigner la région cubitale anatomique en tant que telle ou désigner le système articulaire du coude. La région est divisée en deux parties : <br><br> - Une région cubitale postérieure. <br> - Une région cubitale antérieure formant le pli du coude ou fosse cubitale.';
                break;
            case 'cercle3':
                infoText = 'Poignet :<br><br> Le poignet est une région du membre supérieur située entre la main et l\'avant-bras et contenant le carpe. Elément-clé pour le fonctionnement de la main, il permet les mouvements de la main par rapport à l\'avant-bras, transmet les forces appliquées de la main à l\'avant-bras, permet d\'adapter la capacité de flexion-extension maximale des doigts et de la préhension.';
                break;
            case 'cercle4':
                infoText = 'Hanche :<br><br> La hanche est la partie du corps située à la jonction entre le membre inférieur au niveau de la cuisse et le tronc au niveau du bassin. <br> La hanche est centrée sur l\'articulation coxale entre l\'os coxal et le fémur. <br> Ses limites sont : <br><br> - en haut et en arrière de la crête iliaque. <br> - en haut et en avant l\'aine. <br> - en bas et en arrière le silon glutéal. <br> - en bas et en avant la ligne passant par les extrémités latérales des sillons glutéaux.';
                break;
            case 'cercle5':
                infoText = 'Genou :<br><br> Le Genou est le segment du membre inférieur situés entre la cuisse et la jambe. il enforme l\'articulation du genou. Sa partie antérieure est occupée par la patella palpablé sous la peau. Sa partie postérieure correspond à la fosse poplitée.';
                break;
            case 'cercle6':
                infoText = 'Cheville : <br><br> La cheville est le segment du membre inférieur qui relie la jambe et le pied. En Anatomie, on la nomme la région talo-crurale et elle contient l\'articulation talo-crurale.';
                break;
            default:
                infoText = 'Cliquez sur un cercle pour afficher les informations.';
        }


        /// AJOUTE LE TEXTE DANS LA DIV INFO BOX (A COTER DE L IMAGE) POUR LE CLERCLE CLIQUER ///


        $('#info-box').html('<p>' + infoText + '</p>');
    });
});
