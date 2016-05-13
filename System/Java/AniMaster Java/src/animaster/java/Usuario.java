/**
 *
 * @author alumne
 */
package animaster.java;
public class Usuario {
    private int id_usuario;
    private String nickname;
    private String password;
    private int id_tipo;
    
    public Usuario() {
        this.id_usuario = 0;
        this.nickname = "";
        this.password = "";
        this.id_tipo = 0;
    }
    public Usuario(int id_usuario, String nickname, String password, int id_tipo) {
        this.id_usuario = id_usuario;
        this.nickname = nickname;
        this.password = password;
        this.id_tipo = id_tipo;
    }
    public Usuario(int id_usuario, String nickname) {
        this.id_usuario = id_usuario;
        this.nickname = nickname;
        this.password = "";
        this.id_tipo = 0;
    }
    
    public int getId() { 
        return id_usuario; 
    }
    public String getNick() { 
        return nickname; 
    }
    public String getPass() { 
        return password; 
    }
    public int getTipo() { 
        return id_tipo; 
    }
    
    @Override
    public String toString() {
        return "| " + id_usuario + " | " + nickname;
    }
}
