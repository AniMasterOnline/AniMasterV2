/**
 *
 * @author Daark
 */
package animaster.java;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.*;
import javax.swing.border.*;


public class MainFinestra extends JFrame implements  ActionListener{
    private final JFrame frame; // Finestra
    private final JPanel paneltotal;  // Panell Contenidor
    private JPanel p_crearAdmin, p_showAdmin;
    private JTextField usuario, contrasenya;
    private JTextArea lista;
    private JButton crear, del;
    
    public MainFinestra(){
        frame = new JFrame("Mostrar Llibres");
        frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        paneltotal = (JPanel)frame.getContentPane();
        paneltotal.setLayout(new GridLayout(1, 2));
        frame.setSize(600,400);
        frame.setVisible(true);
        
    }
    public void crearAdmin() {
        try{
            p_crearAdmin = new JPanel();
            p_crearAdmin.setLayout(new GridLayout(6,2,1,0));
            paneltotal.add(p_crearAdmin);

            TitledBorder title;
            title = BorderFactory.createTitledBorder("crear Admin");
            p_crearAdmin.setBorder(title);
            
            usuario = new JTextField();
            contrasenya = new JTextField();
            crear =new JButton("Crear!");
            crear.setActionCommand("crear");
            crear.setBackground(new java.awt.Color(110, 110, 110));
            crear.addActionListener(this);
            
            p_crearAdmin.add(usuario);
            p_crearAdmin.add(contrasenya);
            p_crearAdmin.add(crear);
        }catch(Exception e){
            System.out.println("Error 1");
        }
    }
    public void showAdmin() {
        try{
            p_showAdmin = new JPanel();
            p_showAdmin.setLayout(new GridLayout(1, 1));
            paneltotal.add(p_showAdmin);

            TitledBorder title;
            title = BorderFactory.createTitledBorder("Mostrar Admins");
            p_showAdmin.setBorder(title);
            
            lista = new JTextArea();
            p_showAdmin.add(lista);
            //p_showAdmin.add(del);
        }catch(Exception e){
            System.out.println("Error 2");
        }
    }
    @Override
    public void actionPerformed(ActionEvent e) {
        String action = e.getActionCommand();
        if (action.equals("crear")) {
            try {
                String user = usuario.getText();
                String pass = contrasenya.getText();
                if(user != null && !user.isEmpty() && pass != null && !pass.isEmpty()){
                    AniMasterBD animasterbd = new AniMasterBD();
                    Usuario usuari = new Usuario(user, pass);
                    animasterbd.afegirAdmin(usuari);
                    animasterbd.tancar();
                }else{
                    System.out.println("No Data!");
                }
                
                
            } catch (Exception ex) {
                Logger.getLogger(MainFinestra.class.getName()).log(Level.SEVERE, null, ex);
            }
        }

    }
    public void carregarDades() throws Exception{
        AniMasterBD animasterbd = new AniMasterBD();
        ArrayList returnAdmins = AniMasterBD.getAdmins();
        int max = returnAdmins.size();
        String res = "| ID | Nickname \n#########################################################################################################################################################################################\n";
        for (int i = 0; i < max; i++){
            res = res + returnAdmins.get(i).toString()+ "\n";
        }
        animasterbd.tancar();
        lista.setText(res);
    }
    
    public static void main(String[] args) {
        try{
            MainFinestra e = new MainFinestra();
            e.crearAdmin();
            e.showAdmin();
            int i = 0;
            while(true) {
                i++;
                System.out.println(i);
                e.carregarDades();
                Thread.sleep(10000);
            }
            
        }catch(Exception e){
            System.out.println(e);
        } 
    }
}
