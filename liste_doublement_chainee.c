/*Ecrire un programme qui permet de:
1=> Créer une liste bidirectionnelle d'etudiants
2=> Ajouter un étudiant par ordre de décroissant des moyennes (L'étudiant qui a la plus grande moyenne au début et celui à la plus petite moyenne à la fin)
3=> Afficher la liste du premier au dernier
4=> Afficher la liste du dernier au premier
5=> Supprimer les etudiants qui ont une moyenne inférieure à 10.
*/
#include<stdio.h>
#include<stdlib.h>
#include<string.h>

typedef struct Etudiant
{
    char *nom;
    char *prenom;
    char *datenaiss;
    char sexe;
    float moyenne;
} Etudiant;

typedef struct Element
{
    Etudiant etu;
    struct Element *suiv;
    struct Element *prec;
    struct Element *tete;
    struct Element *queue;
} Element;


Element* newList(Etudiant* etudiant)
{
    Element* elem = (Element*) malloc(sizeof (Element));
  
    if(elem == NULL) {
        printf("Not enough memory !\n");
      	exit(EXIT_FAILURE);
    }
/*  	
  	Etudiant etudiant;
    etudiant.nom = nom;
    etudiant.prenom = prenom;
    etudiant.datenaiss = datenaiss;
  	etudiant.sexe = sexe;
    etudiant.moyenne = moyenne;
*/
  
  	(*elem).etu = *etudiant;
	(*elem).suiv = NULL;
  	(*elem).prec = NULL;
  	(*elem).tete = elem;
  	(*elem).queue = elem;
  	
    return elem;
}

/**
* Cette fonction permet d'ajouter un étudiant dans une liste de type Element*
*/
void addToList(Element* list, Etudiant* etudiant) {
	Element* current = (*list).tete; // Un curseur initialisé à la tete de la liste. Il nous permet de faire le parcours

	Element* elemToInsert = (Element*) malloc(sizeof(Element));

	elemToInsert->etu = *etudiant;
	// Tant que l'element suivant est different de NUll ç-à-d tant que l'on a pas encore atteint la fin de la liste
	// Et que l'element suivant a une moyenne plus grande, alors on avance le curseur
	while (current != NULL && current->etu.moyenne > etudiant->moyenne) {
		if (current->suiv == NULL) // Si current est le dernier element, ç-à-d la queue
		{
			list->queue = elemToInsert; // Le nouvel element devient la queue alors
			current->suiv = elemToInsert
			current = elemToInsert->suiv;
		}
		else {
			current = current->suiv;
		}
	}

	elemToInsert->suiv = current;
	elemToInsert->prec = current->prec;
	if (current->prec != NULL) // Tester si l'element a un précedant (ç-à-d s'il n'est pas la tête)
	{
		current->prec->suiv = elemToInsert;
	}
	else { // Si curent etait la tete
		list->tete = elemToInsert
	}
	current->prec = elemToInsert;
}


int main(int argc, char const *argv[])
{
	Etudiant* etudiant1 = (Etudiant*) malloc(sizeof(Etudiant));
    (*etudiant1).nom = "SEYE";
    (*etudiant1).prenom = "Amina";
    (*etudiant1).datenaiss = "12/05/1995";
  	(*etudiant1).sexe = 'F';
    (*etudiant1).moyenne = 18.5;
  	
  	Element* list = newList(etudiant1);

  	Etudiant* etudiant2 = (Etudiant*) malloc(sizeof(Etudiant));
    (*etudiant2).nom = "SEYE";
    (*etudiant2).prenom = "Hamza";
    (*etudiant2).datenaiss = "07/11/1998";
  	(*etudiant2).sexe = 'M';
    (*etudiant2).moyenne = 15;

    addToList(list, etudiant2);
  
  	Element* tete = (*list).tete;
  	Element* queue = list->queue;
  
  	printf("Prenom: %s\nNom: %s\nDate de naissance: %s\nSexe: %c\nMoyenne: %f\n", (*tete).etu.prenom, (*tete).etu.nom, (*tete).etu.datenaiss, (*tete).etu.sexe, (*tete).etu.moyenne);
	/* code */
	return 0;
}