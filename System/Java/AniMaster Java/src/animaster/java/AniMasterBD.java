/**
 * 
 * 
 * @author Daark
 */
package animaster.java;
import java.sql.*;


public class AniMasterBD {
    private static String login, password, url;
    static Connection conn = null;
    
    public AniMasterBD(){
        login = "root";
        password = "root";
        url = "jdbc:mysql://localhost:3306/animaster";
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
    public static void main(String[] args) throws SQLException {
        AniMasterBD AnimasterBD = new AniMasterBD();
        AnimasterBD.tancar();
        
    }
    
}
