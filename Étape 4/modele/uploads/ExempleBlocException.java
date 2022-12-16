import java.util.Scanner;
import java.util.InputMismatchException;
public class ExempleBlocException {
    public static void main(String[] args){
        Scanner scn = new Scanner(System.in);

		try {
		    System.out.println("SVP, entrez un entier pour la variable r");	//Entrez 10
    		int r = scn.nextInt();
		    System.out.println("SVP, entrez un entier pour la variable d");	//Entrez 0
    		int d = scn.nextInt(); 
    		System.out.println("division de r par d : "+ r / d);
        
        }catch (InputMismatchException | ArithmeticException e){
            System.out.println("Oups ! Une erreur est survenue : " + e);
        }

        System.out.println("Fin du programme");

    }
}
