/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package examen;
import java.sql.*;
import java.util.ArrayList;
import java.util.logging.*;

public final class LlibreBD{
    private static String login, password, url;
    static Connection conn = null;
    
    public LlibreBD(){
        login = "root";
        password = "root";
        url = "jdbc:mysql://localhost:3306/Java-Examen";
        Open(login, password, url);
    }
    
    public void Open(String login, String password, String url){
        try{
            Class.forName("com.mysql.jdbc.Driver").newInstance();
            conn = DriverManager.getConnection(url,login,password);
            if (conn != null){
                System.out.println("Conexión a base de datos "+url+" ... Connected");
            }
        }catch(Exception ex){
            System.out.println(ex);
        }
    }
    public void tancar() throws SQLException{
        conn.close();
        System.out.println("Conexión a base de datos "+url+" ... Closed");
    }

    void afegirLlibre(Llibre llibre) throws SQLException {
        // El Insert mysql
        String query = " insert into llibres (isbn, editorial, autor, categoria, titol, ubicacio)"
          + " values (?, ?, ?, ?, ?, ?)";

        //Crea la Sequencia mysql
        PreparedStatement preparedStmt = conn.prepareStatement(query);
        preparedStmt.setString (1, llibre.getBn());
        preparedStmt.setString (2, llibre.getEditorial());
        preparedStmt.setString (3, llibre.getAutor());
        preparedStmt.setString (4, llibre.getCategoria());
        preparedStmt.setString (5, llibre.getTitol());
        preparedStmt.setString (6, llibre.getUbicacio());
        
        // executa el Insert
        preparedStmt.execute();
    }
    
    public static ArrayList getLlibres() throws SQLException{
      String query = "SELECT isbn, autor, titol FROM llibres";
      // create the java statement
      Statement st = conn.createStatement();
       
      // execute the query, and get a java resultset
      ResultSet rs = st.executeQuery(query);
       
      // iterate through the java resultset
      ArrayList returnLlibres = new ArrayList();
      while (rs.next()){
        String isbn = rs.getString("isbn");
        String autor = rs.getString("autor");
        String titol = rs.getString("titol");
        
        Llibre llibres = new Llibre (isbn,autor,titol);
        returnLlibres.add(llibres);
      }
      return returnLlibres;
    }
    
}
