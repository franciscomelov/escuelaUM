import java.util.Scanner;

public class Actividad_2 {
    public static void main(String[] args) {
        Scanner ask = new Scanner(System.in);
        int[] numbers = arrayNumbers(); // Se crea el array con n numeros
        boolean menu = true;


        //Menu
        while(menu){
            System.out.println("Elije un tipo de ordenaiento: ");
            System.out.println("[1] -> Bubble Sort");
            System.out.println("[2] -> insertion Sort");
            System.out.println("[0] -> Salir");
            System.out.print("Escribe el numero de la opcion [1 - 2 - 0]: ");
            int opcion = ask.nextInt();

            switch (opcion){
                case 1:
                    System.out.println("*******");
                    System.out.println("Elejiste Bubble sort");
                    bubbleSort(numbers);
                    System.out.println("*******");
                    break;
                case 2:
                    System.out.println("*******");
                    System.out.println("Elejiste insertion Sort");
                    insertionSort(numbers);
                    System.out.println("*******");
                    break;
                case 0:
                    menu = false;
                    System.out.println("Adios...");
                    break;
                default:
                    System.out.println("!!Error¡¡");

            }
        }

    }

    /**
     * pregunta por un n numero y crea
     * un array de n numeros
     * @return array de n numeros
     */
    public static int[] arrayNumbers() {
        Scanner ask = new Scanner(System.in);
        int[] numbers;

        //Tamaño del array
        System.out.print("Cuantos numeros quieres ingresar?: ");
        int n = ask.nextInt();

        //Creando array e insertando numeros
        numbers = new int[n];
        for (int i = 0; i < n; i++) {
            System.out.print("[" + (i + 1) + "]" + " Ingresa un numero: ");
            numbers[i] = ask.nextInt();
        }
        return numbers;
    }


    /**
     *Metodo de ordenamiento Bubble Sort
     * @param numbers
     * @return array
     */
    public static  int[] bubbleSort(int[] numbers){
        boolean isSorted = false;

        while (!isSorted){ // si no esta en orden hace una iteracion
            int currentNumber = numbers[0]; // numero en indice cero
            isSorted = true; // valor por defecto sera true a menos que aun no este en orden
            //printArray(numbers);    // Quitar diagonales para ver como se van acomodando en cada iteracion
            //System.out.println("----");

            // ciclo for que acomodara un numero en cada iteracion
            for (int i = 0; i < numbers.length -1; i++) {
                if (currentNumber > numbers[i+1] ){  // si number[i] > number[number] se intercambian sus valores
                    numbers[i] = numbers[i+1];
                    numbers[i+1] = currentNumber;
                    isSorted = false; // si a echo un cambio aun no estan todos los numeros en orden
                } else {
                    currentNumber = numbers[i+1];
                }
            }

        }
        // numbers[] ahora ya esta ordenado
        System.out.println("----");
        printArray(numbers);
        System.out.println("----");
        return numbers;
    }

    /**
     *metodo de ordenamienro cocktail sort
     * @param numbers
     * @return array
     */
    public static int[] insertionSort(int[] numbers){
        int currentNumber;

        for (int i = 1; i < numbers.length; i++) {
            currentNumber = numbers[i]; // inici en el index 1 aumentado y comparando hacia atras
            // printArray(numbers);    // Quitar diagonales para ver como se van acomodando en cada iteracion
            // System.out.println("----");
            for (int j = i; j > 0; j--) {

                if (currentNumber < numbers[j-1]){ // los numeros se recoren y currenNumber se inserta
                    numbers[j] = numbers[j-1];
                    numbers[j-1] = currentNumber;
                }
            }
        }

        // numbers[] ahora ya esta ordenado
        System.out.println("----");
        printArray(numbers);
        System.out.println("----");
        return  numbers;
    }


    /**
     * imprime los numeros de un array
     * @param numbers
     */
    public static void printArray(int[] numbers){
        for (int number: numbers ) {
            System.out.print(number + ", ");

        }
        System.out.println(" ");
    }
}
