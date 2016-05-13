package examen;
import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;

public class Main {
    LlibreBD llibreBD;
    BufferedReader entrada;    
    
    public Main() throws Exception{
        llibreBD = new LlibreBD();
        entrada = new BufferedReader(new InputStreamReader(System.in));
    }
    
    public static void main(String[] args) throws Exception {
        Main gbd = new Main();
        gbd.start();
    }
        
    public void start() throws Exception {
        afegirLlibre();
        llibreBD.tancar();
    }
    
    private String entrarDades(String pregunta) throws IOException {
        mostrarDades(pregunta);
        return entrarDades();
    }

    private String entrarDades() throws IOException {
        String linia = entrada.readLine();
        if ("".equals(linia)) return null;
        return linia;
    }

    private void mostrarDades(String dades) throws IOException {
        System.out.print(dades);
    }

    public void afegirLlibre() throws Exception {
        mostrarDades("Introdueix les seguents dades del nou llibre (deixa en blanc per sortir).\n");
        String isbn = entrarDades("Isbn: "); if (null == isbn) return;
        String editorial = entrarDades("Editorial: "); if (null == editorial) return;
        String autor = entrarDades("Autor: "); if (null == autor) return;
        String categoria = entrarDades("Categoria: "); if (null == categoria) return;
        String titol = entrarDades("Títol: "); if (null == titol) return;
        String ubicacio = entrarDades("Ubicacio: "); if (null == ubicacio) return;
        llibreBD.afegirLlibre(new Llibre (isbn,editorial,autor,categoria,titol,ubicacio));                
        mostrarDades("Operació completada satisfactòriament.\n");
    }
}
