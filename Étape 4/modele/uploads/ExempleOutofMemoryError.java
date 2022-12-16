/******************************************************************************


*******************************************************************************/

public class ExempleOutofMemoryError
{
	public static void main(String[] args) {
	    try {
    	    String[] nom = new String[1000000000];
    	    nom[0] = "Alice";
    	    System.out.println ("noms : "+ nom[0]);
	    } catch (OutOfMemoryError e){
	        System.out.println("Oups ! erreur : "+e);
	    }
	    
		System.out.println("Fin de Programme");
	}
}
