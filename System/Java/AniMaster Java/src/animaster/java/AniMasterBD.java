/**
 * 
 * 
 * @author Daark
 */
package animaster.java;
import java.security.NoSuchAlgorithmException;
import java.sql.*;
import java.util.ArrayList;


public class AniMasterBD {
    private static String login, password, url;
    static Connection conn = null;
    
    public AniMasterBD(){
        login = "root";
        password = "root";
        url = "jdbc:mysql://localhost:3306/Animaster";
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
        try{
            conn.close();
            System.out.println("Conexión a base de datos "+url+" ... Closed");
        }catch(Exception ex){
            System.out.println(ex);
        }
        
    }
    public static ArrayList getAdmins() throws SQLException{
      String query = "SELECT id_usuario, nickname FROM Usuario WHERE id_tipo = 0 ORDER by id_usuario";
      // create the java statement
      Statement st = conn.createStatement();
       
      // execute the query, and get a java resultset
      ResultSet rs = st.executeQuery(query);
       
      // iterate through the java resultset
      ArrayList returnAdmins = new ArrayList();
      while (rs.next()){
        int id_usuario = rs.getInt("id_usuario");
        String nickname = rs.getString("nickname");
        
        Usuario usuario = new Usuario (id_usuario, nickname);
        returnAdmins.add(usuario);
      }
      return returnAdmins;
    }
    void afegirAdmin(Usuario usuari) throws SQLException, NoSuchAlgorithmException {
        // El Insert mysql
        String query = " insert into Usuario (nickname, password, id_tipo)"
          + " values (?, ?, ?)";

        //Crea la Sequencia mysql
        PreparedStatement preparedStmt = conn.prepareStatement(query);
        preparedStmt.setString (1, usuari.getNick());
        preparedStmt.setString (2, usuari.getPass());
        preparedStmt.setString (3, "0");
        
        // executa el Insert
        preparedStmt.execute();
    }
    
    public static void main(String[] args) throws SQLException {
        AniMasterBD AnimasterBD = new AniMasterBD();
        AnimasterBD.tancar();
        
    }
    
}
