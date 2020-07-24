<?php

namespace App\DataFixtures;
use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $titre = "La presse écrite face au développement d’internet";
        $contenu = "De nos jours, les réseaux sociaux tiennent un rôle d’information important auprès des internautes notamment des jeunes, les personnes de plus de 60 ans restent globalement fidèles aux journaux papiers. La croissance d’internet et des réseaux sociaux laisse à penser que le journalisme tel que nous l’entendons en tant que profession soit menacé par ces nouvelles technologies. Grâce à internet, nous obtenons l’information rapidement et en grande quantité mais ne dit-on pas qu’être plus informé ne signifie pas forcément être mieux informé. Rechercher et trier les bonnes informations parmi toutes les données qui n’ont de cesse de s’accroître continuellement se révèle être particulièrement chronophage.

        Enquête réalisée par Seprem Etudes et Conseil pour le Syndicat de la presse sociale (SPS) entre le 25 avril et le 12 mai 2014, auprès d’une sélection de 1 165 individus.
        
        Les conséquences de l’arrivée d’internet par rapport à la presse écrite offre un moyen au monde journalistique d’évoluer et de viser un public plus large. Les nouveaux médias aillant la spécificité de proposer ce que d’autres proposent déjà, écrits, sons, images, vidéos en un seul support. Ce qui nécessite que le journalisme prenne en compte cette concurrence et puisse s’adapter rapidement. Ainsi, le rôle du journaliste a également connu une évolution lui permettant de gagner en complexité, pouvoir s’adapter avec un nouveau mode de fonctionnement de manière à concurrencer le numérique.
        
        Rechercher et trier les bonnes informations parmi toutes les données qui n’ont de cesse de s’accroître continuellement se révèle être particulièrement chronophage. Le « crowdsourcing », littéralement « approvisionnement par la foule » permettant à des communautés d’internautes de valoriser et partager leurs connaissances est une riche source pour obtenir l’information ou la vérifié, un changement en matière de journalisme puisqu’il est favorable de savoir exploiter ces outils.
        Être capable de se situer, différencier et vérifier les informations est d’une importance capitale.
        
        Le journaliste est devenu polyvalent, en effet, il ne s’agit plus de se servir d’un unique média, de nouveaux métiers ont vu le jour, a proprement nés de l’informatique tel que le journaliste web, le responsable éditorial, le responsable web analytic, le « data journalism » (journalisme de données) parmi bien d’autres exemples, afin de gérer et répondre aux nouveaux besoins.
        
        La visualisation des informations est par ailleurs un facteur de grande importance, elle doit être facilement accessible au lecteur et rédiger de façon adaptée au web. La création d’un site internet permet maintenant d’ajouter des vidéos, des sons, qui n’auraient pas pu être ajouté dans un journal papier, ce qui rend les journaux online très attractifs pour les internautes. En outre, le développement d’internet s’accompagne d’un accès à l’information gratuite qui s’oppose à la traditionnelle presse écrite, qui elle est payante.
        De nombreux journaux proposent aujourd’hui une double édition papier / numérique, d’autres ont cependant fait le choix de stopper leurs éditions papier pour se concentrer uniquement sur la version numérique.
        
        En conclusion, Internet reste un concurrent de la presse écrite, mais aussi un outil média supplémentaire et complémentaire pouvant apporter fonctionnalités et richesses de diversité à la presse traditionnelle.
        
        Source : https://influenceursduweb.org/la-presse-ecrite-face-au-developpement-dinternet/";

        $article = new Article();
        $article->setTitre($titre);
        $article->setContenu($contenu);
        $article->setPathImg("reseau-sociaux.jpg");

        $manager->persist($article);
        $manager->flush();
    }
}