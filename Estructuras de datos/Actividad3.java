import java.util.Scanner;

public class Actividad_3 {
    public static void main(String[] args) {
        Scanner ask = new Scanner(System.in);
        int counter = 0; // contador de parentesis
        String cadena;

        System.out.print("Ingresa parejas de parentesis-> (()): ");
        cadena = ask.nextLine();


        // validando si es la misma cantidad de ( y )
        // ( sumara 1    ) restara 1   un par () sera igual a 0
        for (int i = 0; i < cadena.length(); i++) {
            if (cadena.charAt(i) == '(') counter++;
            if (cadena.charAt(i) == ')') counter--;
        }

        // Si es la misma cantidad counter =0 y es valida
        // si counter en mayor o menor a cero la cadena es invalida
        if (counter == 0) {
            System.out.println("Cadena valida");
        } else {
            System.out.println("Cadena NO valida");
        }


    }
}
