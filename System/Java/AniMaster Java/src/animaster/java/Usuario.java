/**
 *
 * @author alumne
 */
package animaster.java;

import java.math.*;
import java.security.*;

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
    public Usuario(String nickname, String pass ) {
        this.id_usuario = 0;
        this.nickname = nickname;
        this.password = pass;
        this.id_tipo = 0;
    }
    public Usuario(int id, String nickname ) {
        this.id_usuario = id;
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
    public String getPass() throws NoSuchAlgorithmException { 
        String result = password;
        MessageDigest md = MessageDigest.getInstance("MD5"); //or "SHA-1"
        md.update(password.getBytes());
        BigInteger hash = new BigInteger(1, md.digest());
        result = hash.toString(16);
        while(result.length() < 32) { //40 for SHA-1
            result = "0" + result;
        }
        return result; 
    }
    public int getTipo() { 
        return id_tipo; 
    }
    
    @Override
    public String toString() {
        return "| " + id_usuario + " | " + nickname;
    }
}
