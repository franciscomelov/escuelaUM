import javax.swing.JOptionPane;


public class examen_abierto {
    public static void main(String[] args) {
        boolean menuLoop = true;

        int[] matriculas = {101510, 101516, 101519, 101520, 101545, 101512, 101508};
        String[] nombres = {"Juan Reyes", "Susana González", "Evelin Prado", "César García", "Ricardo Reyes", "Berenice Díaz", "Cynthia López"};
        double[] calificaciones = {8.7, 7.2, 9.3, 7.8, 8.4, 9.3, 9.7};

        while (menuLoop) {
            String lectura = JOptionPane.showInputDialog(null,
                    "Elije una opcion: " +
                            "\n[1] - ver tabla de alumnos " +
                            "\n[2] - ver calificaciones ordenadas de mayor a menor " +
                            "\n[3] - buscar calificaciones por matrícula " +
                            "\n[0] - Salir");

            switch (lectura) {
                case "1":
                    verTabla(matriculas, nombres, calificaciones);
                    break;
                case "2":
                    calOrden(matriculas, nombres, calificaciones);
                    break;
                case "3":
                    buscar(matriculas, nombres, calificaciones);
                    break;
                case "0":
                    menuLoop = false;
                    break;
                default:
                    JOptionPane.showMessageDialog(null, "ERROR");
            }

        }

    }


    public static void verTabla(int[] matriculas, String[] nombres, double[] calificaciones) {
        StringBuilder tabla = new StringBuilder();
        //concatena todos los datos y al final solo los imprime
        for (int i = 0; i < matriculas.length; i++) {
            tabla.append(matriculas[i]).append("  ").append(nombres[i]).append("  ").append(calificaciones[i]).append("\n");
            tabla.append("________________________\n");
        }
        JOptionPane.showMessageDialog(null, tabla.toString(), "ver tabla de alumnos", JOptionPane.INFORMATION_MESSAGE);
    }


    public static void buscar(int[] matriculas, String[] nombres, double[] calificaciones) {

        int lectura = Integer.parseInt(JOptionPane.showInputDialog(null, "Igresa la matricula : "));
        //found funciona como un else para el ciclo found si no encuentra la matricula lanza un error
        found:
        {
            for (int i = 0; i < matriculas.length; i++)
                if (lectura == matriculas[i]) {
                    JOptionPane.showMessageDialog(null, matriculas[i] + "  " + nombres[i] + "  " + calificaciones[i], "Buscador", JOptionPane.INFORMATION_MESSAGE);
                    break found;
                }
            JOptionPane.showMessageDialog(null, "La matricula no existe", "Error", JOptionPane.INFORMATION_MESSAGE);
        }
    }


    public static void calOrden(int[] matriculas, String[] nombres, double[] calificaciones) {
        double currentCali;
        int currentMatricula;
        String currentNombre;

        // Funciona igual que Insetion Sort, solo se agrega el array nombres y calificacion
        // en la seccion de swap, para tambien cambiar su poscicion
        for (int i = 1; i < calificaciones.length; i++) {
            currentCali = calificaciones[i]; // inici en el index 1 aumentado y comparando hacia atras
            currentMatricula = matriculas[i];
            currentNombre = nombres[i];

            for (int j = i; j > 0; j--) {
                if (currentCali > calificaciones[j - 1]) { // los numeros se recoren y currenNumber se inserta
                    calificaciones[j] = calificaciones[j - 1];
                    calificaciones[j - 1] = currentCali;
                    //Nombre
                    nombres[j] = nombres[j - 1];
                    nombres[j - 1] = currentNombre;
                    //matricula
                    matriculas[j] = matriculas[j - 1];
                    matriculas[j - 1] = currentMatricula;
                }
            }
        }

        // verTabla se puede reusar para imprimir
        verTabla(matriculas, nombres, calificaciones);
    }


}
