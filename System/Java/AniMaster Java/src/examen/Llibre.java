
package examen;
class Llibre {
    private String bn;
    private String editorial;
    private String autor;
    private String categoria;
    private String titol;
    private String ubicacio;
    
    public Llibre(String bn, String editorial, String autor, String categoria, String titol, String ubicacio) {
        this.bn = bn;
        this.editorial = editorial;
        this.autor = autor;
        this.categoria = categoria;
        this.titol = titol;
        this.ubicacio = ubicacio;
    }
    Llibre(String bn, String autor, String titol) {
        this.bn = bn;
        this.editorial = "";
        this.autor = autor;
        this.categoria = "";
        this.titol = titol;
        this.ubicacio = "";
    }
    public String getBn() { 
        return bn; 
    }
    public String getEditorial() { 
        return editorial; 
    }
    public String getAutor() { 
        return autor; 
    }
    public String getCategoria() { 
        return categoria; 
    }
    public String getTitol() { 
        return titol; 
    }
    public String getUbicacio() { 
        return ubicacio; 
    }
    
    @Override
    public String toString() {
        return "| " + bn + " | " + autor + " | " + titol+ " |";
    }
}
